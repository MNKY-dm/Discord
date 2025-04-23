<?php
require_once '../bdd.php';

class Server 
{

    private PDO $pdo;
    public $id;
    public $name;
    public $creator_id;
    public array $member_list;

    public function __construct (PDO $pdo, string $server_name, int $creator_id) 
    {
        $this->id = $id;
        $this->pdo = $pdo;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
        $this->addMember($creator_id);
    }

    public function addMember (int $member_id) {
        if (!in_array($member_id)) {
            $this->member_list[] = $member_id;
            $stmt = $this->pdo->prepare("INSERT INTO members (server_id, user_id) VALUES (:id, :member_id)");
            $stmt -> bindParam(':id', $this->id);
            $stmt -> bindParam(':member_id', $member_id);
            $stmt -> execute();
        }
        else {
            return "L'utilisateur eest déjà présent dans le serveur."
        }
    }

    public function getMembers () {
        return $this->member_list;
    }

}