<?php 
require "create_server_form.php";
require "class" . DIRECTORY_SEPARATOR . "Server.php";
require ".." . DIRECTORY_SEPARATOR . "bdd.php";

// Lance la session si une session n'est pas déjà lancée
if (!isset($_SESSION)) {
    session_start();
}

$server_name = htmlentities($_POST['server_name']) ?? null;
// $creator_id = 1; // À automatiser via la session utilisateur

if ($server_name) {
    $new_server = Server::createServer($conn, $server_name, $_SESSION['user_id']); // Crée un serveur et ajoute l'utilisateur connecté au serveur avec son id collecté dans la session
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




