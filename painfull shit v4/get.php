<?php
require 'config.php';

$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 20");
$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode(array_reverse($messages)); // show oldest first
?>
