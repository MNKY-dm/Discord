<?php
require_once 'Server.php';
require_once '../bdd.php';

$server1 = new Server($conn, 'serveur 1', 1);

$server1->addMember(999);
$server1->addMember(999);

var_dump($server1->member_list) ;