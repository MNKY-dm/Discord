<?php
require_once 'Server.php';
require_once '../bdd.php';

$server1 = new Server($conn, 'serveur 1', 1);

var_dump($server1->member_list) ;