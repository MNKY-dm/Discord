<?php
require '../bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');

    if (!empty($msg)) {
        $stmt = $conn->prepare(
            "INSERT INTO channel_messages (sender_id, channel_id, timestamp, message_content)
             VALUES (:sender, :channel, NOW(), :msg)"
        );
        $stmt->execute([
            'sender' => 1,    // Use a valid user_id from your users/member table
            'channel' => 1,   // Use a valid channel_id from your channels table
            'msg' => $msg
        ]);
    }
}
?>
