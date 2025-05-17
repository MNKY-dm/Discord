<?php
if (!isset($_SESSION)) {
    session_start();
}
// Ce fichier permet d'intercepter ce qui a été envoyé en POST depuis le fichier server-bar.php, puis de le rendre utilisable pour channels-bar.php
$rawData = trim(file_get_contents('php://input')); // Lire les informations de la requête de manière brute
$data = json_decode($rawData, true); // Transformer les données crues en tableau associatif (true)
$_SESSION['channels'] = $data; // Stocker les données dans la session