<?php
require_once 'Server.php';
require_once '../bdd.php';

$server1 = Server::getServer($conn, 1);

$server1->addMember(19);

var_dump($server1->member_list) ;