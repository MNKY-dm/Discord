<?php
require_once 'class/Server.php';
require_once '../bdd.php';

$server1 = Server::getServer($conn, 1);

$server1->addMember(19, 1);

