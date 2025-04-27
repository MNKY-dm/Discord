<?php

class Server 
{

    private PDO $pdo; // Premier paramètre de la classe, qui permettra de faire le lien entre la bdd et la classe via le fichier 'bdd.php'
    public $id;
    public $name;
    public $creator_id;
    public array $member_list = [];

    public function __construct (PDO $pdo, string $server_name, int $creator_id) {
        $this->pdo = $pdo;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
     
        // Ajouter le créateur dans la liste des membres du serveur
        $this->addMember($creator_id);
    }

    public function safeQuery(string $sql, array $params = [], bool $single = false) {
        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            $stmt->execute();

            if (stripos($sql, 'SELECT') === 0) {
                return $single ? $stmt->fetch() : $stmt->fetchAll();
            }

            return true;
        } catch (PDOException $e) {
            error_log("Erreur PDO dans safeQuery : " . $e->getMessage());
            return null;
        }
    }

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
            $id = (int)$infos_server[0]->server_id;
            $server_name = (string)$infos_server[0]->server_name;
            $creator_id = (int)$infos_server[0]->creator_id;
            
            // Crée une instance de la classe Serveur avec les infos priochées sur la BDD
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
    


    // Méthode qui permet d'ajouter un membre dans le serveur via son id
    public function addMember(int $member_id) {
        if (!in_array($member_id, $this->member_list)) {

            $this->member_list[] = $member_id;
            
            $result = $this->safeQuery(
                "INSERT INTO member (server_id, user_id) VALUES (:id, :member_id)",
                [
                    ':id' => $this->id,
                    ':member_id' => $member_id
                ]
            );

            if ($result) {
                return true;
            } else {
                return "Impossible d'ajouter l'utilisateur sur le serveur.";
            }

        } else {

            return "L'utilisateur est déjà présent sur le serveur.";

        }
    }    

    public function getMembers () {

        return $this->safeQuery(
            "SELECT * FROM member INNER JOIN server ON member.server_id = server.server_id"
        );

    }

}