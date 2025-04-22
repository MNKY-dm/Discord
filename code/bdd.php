<?php
$servername = "localhost";
$dbname = "discord_bdd";
$dbusername = "root";
$dbpassword = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "Erreur: " . $e ->getMessage();
}

?>