<?php
class Server 
{

    public $id;
    public $name;
    public $creator_id;
    public $member_list;

    public function __construct (int $server_id, string $server_name, int $creator_id) 
    {
        $this->id = $server_id;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
        $this->member_list = [];
    }

    public function addMember (int $member_id) {

    }

}