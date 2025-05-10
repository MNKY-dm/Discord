<?php
// Ce fichier permet d'intercepter ce qui a été envoyé en POST depuis le fichier server-bar.php, puis de le rendre utilisable pour channels-bar.php
$rawData = file_get_contents('php://input'); // Lire les informations de la requête de manière brute
file_put_contents('test.log', $rawData);
$data = json_decode($rawData, true); // Transformer les données crues en tableau associatif (true)
var_dump($rawData);