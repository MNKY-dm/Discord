<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msg = trim($_POST['message'] ?? '');

    if (!empty($msg)) {
        $stmt = $conn->prepare("INSERT INTO messages (content) VALUES (?)");
        $stmt->bind_param("s", $msg);
        $stmt->execute();
        $stmt->close();
    }
}
?>
