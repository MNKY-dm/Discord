<?php
$servername = "localhost";
$dbname = "discord_bdd";
$dbusername = "root";
$dbpassword = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Permet de définir le mode de traitement des erreurs sur une Exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ // Permet de définir le mode de Fetch par défaut de la PDO sur 'OBJET'
    ]);
}catch (PDOException $e){
    echo "Erreur: " . $e->getMessage();
}

?>