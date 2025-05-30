<?php
class Server 
{

    private PDO $pdo; // Premier paramètre de la classe, qui permettra de faire le lien entre la bdd et la classe via le fichier 'bdd.php'
    public $id;
    public $name;
    public $creator_id;

    public function __construct (PDO $pdo, string $server_name, int $creator_id) {
        $this->pdo = $pdo;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
     
    }
    
    public function safeQuery(string $sql, array $params = [], bool $single = false) {
        try {
            // Prépare une requête sql
            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $key => $value) {
                // Pour chaque paramètre passé dans le tableau '$params', la clé est remplacée par la variable voulue
                try {
                    $stmt->bindValue($key, $value);
                } catch (PDOException $e) {
                    error_log("Erreur dans BindValue : " . $e->getMessage());
                }
            }
            // Exécute la requête
            $stmt->execute();
            
            // S'il s'agit d'une sélection, on récupère le résultat dans un tableau associatif (voir configuration du fetchAll dans 'bdd.php'), ou sur une seule ligne
            if (stripos($sql, 'SELECT') === 0) {
                return $single ? $stmt->fetch() : $stmt->fetchAll();
            }
            
            // Sinon, il return true
            return true;
            
            // Si une erreur survient, attrape une erreur de PDO et retourne un message d'erreur
        } catch (PDOException $e) {
            error_log("Erreur PDO dans safeQuery : " . $e->getMessage());
            throw $e;
        }
    }
    
    // Impossible d'utiliser safeQuery dans cette fonction car elle est statique
    public static function createServer(PDO $pdo, string $server_name, int $creator_id){
        
        try {
            // Insérer un nouveau serveur dans la table server
            $stmt = $pdo->prepare("INSERT INTO server (server_name, creator_id, admin_id) VALUES (:name, :creator_id, :admin_id)");
            $stmt -> bindParam(':name', $server_name);
            $stmt -> bindParam(':creator_id', $creator_id);
            $stmt -> bindParam(':admin_id', $creator_id);
            $stmt -> execute();
            
            // Définir la variable 'id' du serveur sur l'id auto-incrémenté via la commmande SQL ci-dessus
            $id = $pdo->lastInsertId();
            
            if ($id === null) {
                throw new Exception("Erreur de création du serveur");
            }
            
            $serveur = new Server($pdo, $server_name, $creator_id);
            $serveur->id = $id;
            // Ajouter le créateur dans la liste des membres du serveur
            $serveur->addMember($creator_id, $serveur->id);
            return $serveur;
        }
        catch (PDOException $e){
            error_log("Erreur PDO dans createServer : " . $e->getMessage());
            return null;
        }
        catch (Exception $e){
            error_log("Erreur dans createServer : " . $e->getMessage());
            return null;
        }

    }

// Impossible d'utiliser safeQuery dans cette fonction car elle est statique
// Cette fonction renvoie une instance d'un serveur précis
    public static function getServer(PDO $pdo, int $server_id) {

        try {
            // Sélectionne le serveur du serveur via une commande SQL, en passant par son ID
            $stmt = $pdo->prepare("SELECT * FROM server WHERE server_id = :server_id");
            $stmt->bindParam(':server_id', $server_id);
            $stmt->execute();
            
            // Récupère le résultat dans un objet (voir 'bdd.php')
            $infos_server = $stmt->fetchAll();
            
            if (empty($infos_server)) {
                throw new Exception("Aucun serveur trouvé avec cet ID.");
            }
            
            // Définit les variables sur les infos repêchées dans les infos server
            $id = (int)$infos_server[0]['server_id'];
            $server_name = (string)$infos_server[0]['server_name'];
            $creator_id = (int)$infos_server[0]['creator_id'];
            
            // Crée une instance de la classe Serveur avec les infos piochées sur la BDD
            $serveur = new Server($pdo, $server_name, $creator_id);
            $serveur->id = $id;
    
            return $serveur;
    
        } catch (PDOException $e) {
            error_log("Erreur PDO dans getServer: " . $e->getMessage());
            return null; // ou tu lances une autre exception
        } catch (Exception $e) {
            error_log("Erreur dans getServer: " . $e->getMessage());
            return null;
        }
    }

    public static function getServerbyMember(PDO $pdo, int $member_id) { // Méthode qui renvoie un tableau associatif contennat la liste des serveurs don tle membre renseigné est membre
        try {
            $stmt = $pdo->prepare("SELECT server.* FROM server INNER JOIN member ON server.server_id = member.server_id WHERE member.user_id = :member_id");
            $stmt->bindParam(':member_id', $member_id);
            $stmt->execute();
    
            $servers = $stmt->fetchAll();
            return $servers;

        } catch(PDOException $e) {
            error_log('Erreur PDO dans getServerbyMember : ' . $e->getMessage());
            return null;
        }
        
    }
    


    // Méthode qui permet d'ajouter un membre dans le serveur via son id
    public function addMember(int $member_id, int $server_id) {

        // D'abord récupérer la liste des id des membres 
        $members1 = $this->getMembers();
        $members = [];
        foreach ($members1 as $member) { // Boucle qui permet de réunir tous les tableaux renvoyés par getMembers() en un seul tableau pour plus de maniabilité
            $members[] = $member['user_id']; // (pour chaque member dans le tableau de tableau members1, on ajoute member_id dans le tableau initialsement vide 'members')
        }

        // Si l'utilisateur cible est déjà dans le serveur, on ne l'ajoute pas
        if (!in_array($member_id, $members)) {

            try {
                $this->safeQuery(
                    "INSERT INTO member (server_id, user_id) VALUES (:id, :member_id)",
                    [
                        ':id' => $server_id,
                        ':member_id' => $member_id
                    ]
                );
                
                return true;
            }
            
            catch (PDOException $e) {
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    return "L'utilisateur est déjà présent dans le server.";
                }

                error_log("Erreur lors de l'ajout d'un membre: " . $e->getMessage());
                return "Impossible d'ajouter l'utilisateur dans le serveur : une erreur est survenue.";
            }

        } else {
            return "L'utilisateur est déjà présent sur le serveur.";
        }
    }    

    public function getMembers () {

        return $this->safeQuery(
            "SELECT member.* FROM member INNER JOIN server ON member.server_id = server.server_id WHERE member.server_id = :server_id",
            [':server_id' => $this->id]
        );

    }

}