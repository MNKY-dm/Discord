<?php
$host = 'localhost';
$db = 'pain';
$user = 'root';
$pass = ''; // or your MySQL password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
