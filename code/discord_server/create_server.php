<?php 
require "create_server_form.php";
require "class" . DIRECTORY_SEPARATOR . "Server.php";
require ".." . DIRECTORY_SEPARATOR . "bdd.php";

if ($_POST['server_name'] !== "") {
    $server_name = htmlentities($_POST['server_name']);
    if (Server::createServer($conn, $server_name, 1) !== null) {
        header('Location: success.php');
    } else {
        header('Location: error.php');
    }
} else {
    echo "Le nom du serveur ne peut pas être vide. Veuillez réessayer.";
}




