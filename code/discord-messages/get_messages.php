<?php
require_once '../bdd.php';
$channel_id = $_GET['channel_id'];

$stmt = $conn->prepare("SELECT message_content FROM channel_messages WHERE channel_id = :channel_id ORDER BY timestamp DESC");
$stmt->bindParam(":channel_id", $channel_id);
$stmt->execute();
$rows = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode(array_reverse($rows)); // oldest first
?>
