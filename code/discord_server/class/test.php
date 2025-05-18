<?php
include 'Server.php';
include '../../bdd.php';

$server = Server::getServer($conn, 15);
echo '<pre>';
var_dump($server->addMember(1005, $server->id));
var_dump($server->getMembers());
// var_dump($server->addMember(1005, $server->id));
echo '</pre>';
