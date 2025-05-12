<?php
$host = 'localhost';
$db = 'pain';
$user = 'root';
$pass = 'root'; // or your MySQL password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
