<?php
require_once 'class/Server.php';
require_once '../bdd.php';

if (!isset($_SESSION)) {
    session_start();
}


$server = Server::getServer($conn, $_SESSION[]);