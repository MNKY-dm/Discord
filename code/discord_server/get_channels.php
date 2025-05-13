<?php 
require_once("../bdd.php");

if (isset($_GET["server_id"])) {
    try {
        $serverId = $_GET['server_id'];
        $stmt = $conn->prepare("SELECT * FROM channels WHERE server_id = :server_id");
        $stmt->execute([":server_id" => $serverId]);
        $channels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        $json = json_encode($channels);
        echo $json; 
    } catch (PDOException $e) {
        error_log("Erreur de PDO" . $e->getMessage());
        http_response_code(500);
    }
} else {
    echo json_encode(['error' => 'Aucun server_id fourni']);
    http_response_code(500);
}