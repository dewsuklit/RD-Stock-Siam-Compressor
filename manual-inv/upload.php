<?php
session_start();

$file_name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$invno = $_SESSION['invno'];

// สร้างชื่อไฟล์ใหม่โดยใช้ค่าจาก $_SESSION['inv']
$file_up_name = $invno . '_' . $file_name;
$_SESSION['filename'] = $file_up_name;
move_uploaded_file($tmp_name, "files/" . $file_up_name);
?>
