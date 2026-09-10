<?php
$servername = "localhost";
$username = "u537730031_ai_house_db";
$password = "Ag@2026.com";
$dbname = "u537730031_ai_house_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
