<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Server.php';

$server1 = new Server(1, 'Serveur 1');
$server2 = new Server(2, 'Serveur 2');

var_dump($server1, $server2);