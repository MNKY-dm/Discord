<?php 
require "create_server_form.php";
require "class" . DIRECTORY_SEPARATOR . "Server.php";
require ".." . DIRECTORY_SEPARATOR . "bdd.php";

$server_name = htmlentities($_POST['server_name']) ?? null;
$creator_id = 1; // À automatiser via la session utilisateur

if ($server_name) {
    $new_server = Server::createServer($conn, $server_name, $creator_id) ;
    if ($new_server) {
        header('Location: success.php');
        exit;
    } else {
        header('Location: error.php');
        exit;
    }
} else {
    header('Location: error.php');
    exit;
}




