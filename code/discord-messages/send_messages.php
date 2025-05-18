<?php
require '../bdd.php';
if (!isset($_SESSION)) {
    session_start();
}
$user_id = $_SESSION['user_id'];
$channel_id = $_GET['channel_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');

    if (!empty($msg)) {
        $stmt = $conn->prepare(
            "INSERT INTO channel_messages (sender_id, channel_id, timestamp, message_content)
             VALUES (:sender, :channel, NOW(), :msg)"
        );
        $stmt->execute([
            'sender' => $user_id,    
            'channel' => $channel_id,  // ici on utilisait des valeurs par défaut avant de mettre $channel_id et $user_id
            'msg' => $msg
        ]);
    }
}
?>