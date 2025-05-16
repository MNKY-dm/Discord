<?php
require_once 'class/Server.php';
require_once '../bdd.php';

$server1 = Server::getServer($conn, 1);

$server1->addMember(19, 1);

var_dump($server1->member_list) ;