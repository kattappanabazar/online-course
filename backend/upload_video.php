<?php
include 'db.php';
session_start();
if ($_SESSION['role'] !== 'teacher') { die("Unauthorized access."); }
$title = $_POST['title'];
$course_id = $_POST['course_id'];
$target = "../uploads/" . basename($_FILES["video"]["name"]);
move_uploaded_file($_FILES["video"]["tmp_name"], $target);
$path = "uploads/" . basename($_FILES["video"]["name"]);
$uid = $_SESSION['user_id'];
$stmt = $conn->prepare("INSERT INTO videos (course_id, title, video_path, uploaded_by) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $course_id, $title, $path, $uid);
$stmt->execute();
echo "Video uploaded.";
?>