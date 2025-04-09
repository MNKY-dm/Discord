<?php
class Admin {

    public function __construct (int $member_id, $member_role)
    {
        $this->id = $member_id;  
        $this->role = $member_role;
    }

}