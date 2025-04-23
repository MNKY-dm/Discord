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
        $this->name = $server_name;
        $this->creator_id = $creator_id;
        $this->member_list[] = $creator_id;
    }

    public function addMember (int $member_id) {
        $this->member_list[] = $member_id;
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    }

    public function getMembers () {
        return $this->member_list;
    }

}