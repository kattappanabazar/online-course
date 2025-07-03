<?php
include 'db.php';
session_start();
$uid = $_SESSION['user_id'];
$q = $conn->query("SELECT v.title, v.video_path FROM videos v
  JOIN enrollments e ON v.course_id = e.course_id WHERE e.student_id = $uid");
$out = [];
while ($row = $q->fetch_assoc()) {
    $out[] = $row;
}
echo json_encode($out);
?>