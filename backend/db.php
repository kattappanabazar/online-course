<?php
$conn = new mysqli('localhost', 'root', '', 'elearning');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>