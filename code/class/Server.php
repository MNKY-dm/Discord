<?php
class Server {

    public function __construct (int $server_id, string $server_name, int $creator_id) 
    {
        $this->id = $server_id;
        $this->name = $server_name;
        $this->creator_id = $creator_id;
    }

    public function create_channel (int $channel_id, string $channel_name) 
    {
        $new_channel = new Channel($channel_id, $channel_name)
    } 

    public function adminise (int $member_id, string $member_role)
    {
        $admin = new Admin($member_id, $member_role)
    }

}