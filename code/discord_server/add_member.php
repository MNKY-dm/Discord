<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'class/Server.php';
require_once '../bdd.php';

$server_id = (int)$_GET['server_id']; // Récupère l'id du serveur courant passé en GET
$friend_name = (string)$_POST['username']; // Récupère le nom d'utilisateur rentré en POST dans le formulaire

$server = Server::getServer($conn, $server_id); // Crée une instance de Server correspondant au serveur courant à partir de son id

// Tout d'abord, il faut récupérer la liste de tous les comptes utilisateurs existants.
$stmt = $conn->query("SELECT username FROM users"); // Récupère tous les noms d'utilisateurs des utilisateurs présents dans la base de données...
$usernames1 = $stmt->fetchAll(); // ... dans un tableau de tableaux

$usernames = [];

foreach ($usernames1 as $username) { // Boucle qui permet de réunir tous les tableaux en un seul tableau pour plus de maniabilité
    $usernames[] = $username['username']; // (pour chaque username dans le tableau de tableau usernames1, on ajoute username dans le tableau initialsement vide 'usernames')
}


if (in_array($friend_name, $usernames)) { // Si le nom d'utilisateur rentré est présent dans la liste des utilisateurs
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = :username"); // On récupère l'id correspondant
    $stmt->bindParam(":username", $friend_name);
    $stmt->execute();
    $friend_result = $stmt->fetch(); 
    $friend_id = $friend_result['user_id'];

    // Si l'utilisateur est déjà dans le serveur, on ne l'ajoute pas, sinon on l'y ajoute
    if ($server->addMember($friend_id, $server->id) === "L'utilisateur est déjà présent sur le serveur.") {
        echo "L'utilisateur est déjà présent dans ce serveur.";
    } 
    else {
        $server->addMember($friend_id, $server_id);
        echo "utilisateur ajouté au serveur avec succès";
    }
} else {
    echo "Aucun utilisateur trouvé avec ce pseudo";
}


