<?php
require '../bdd.php';

$stmt = $conn->prepare("SELECT message_content FROM channel_messages ORDER BY timestamp DESC LIMIT 20");
$stmt->execute();
$rows = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode(array_reverse($rows)); // oldest first
?>
