<?php

class Server 
{

    private PDO $pdo; // Premier paramètre de la classe, qui permettra de faire le lien entre la bdd et la classe via le fichier 'bdd.php'
    public $id;
    public $name;
    public $creator_id;
    public array $member_list = [];

    public function __construct (PDO $pdo, string $server_name, int $creator_id) 
    {
        $this->pdo = $pdo;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
        
        // Insérer un nouveau serveur dans la table server
        $stmt = $this->pdo->prepare("INSERT INTO server (server_name, creator_id, admin_id) VALUES (:name, :creator_id, :admin_id)");
        $stmt -> bindParam(':name', $this->name);
        $stmt -> bindParam(':creator_id', $this->creator_id);
        $stmt -> bindParam(':admin_id', $this->creator_id);
        $stmt -> execute();

        // Définir la variable 'id' du serveur sur l'id auto-incrémenté via la commmande SQL ci-dessus
        $this->id = $this->pdo->lastInsertId();
     
        // Ajouter le créateur dans la liste des membres du serveur
        $this->addMember($creator_id);
    }

    // Méthode qui permet d'ajouter un membre dans le serveur via son id
    public function addMember(int $member_id) {
        if (!in_array($member_id, $this->member_list)) {
            $this->member_list[] = $member_id;
            
            try {
                $stmt = $this->pdo->prepare("INSERT INTO member (server_id, user_id) VALUES (:id, :member_id)");
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':member_id', $member_id);
                $stmt->execute();
                return true; // Succès de l'ajout
            } catch (PDOException $e) {
                // Gestion d'erreurs spécifiques
                if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    return "L'utilisateur est déjà présent dans la base de données.";
                }
                
                // Journalisation de l'erreur
                error_log("Erreur lors de l'ajout d'un membre: " . $e->getMessage());
                
                // Message pour l'utilisateur
                return "Impossible d'ajouter l'utilisateur au serveur: une erreur est survenue.";
            }
        } else {
            return "L'utilisateur est déjà présent sur le serveur.";
        }
    }    

    public function getMembers () {
        
        return $this->member_list;
    }

}