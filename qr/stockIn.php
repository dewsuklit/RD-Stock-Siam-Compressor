<?php
// เชื่อมต่อกับฐานข้อมูล
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจาก AJAX
$prodID = $_POST['prodID'];
$subshelf = $_POST['subshelf'];
$prodName = $_POST['prodName'];
$qty = $_POST['qty'];
$user_id_in = $_SESSION['id'];
$subshelf = strtoupper($subshelf);


// บันทึกข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO tbl_report_details(product_id, subshelf_name, product_name, quantity, unit, user_id_in, balance)
VALUE('$prodID', '$subshelf', '$prodName', '$qty', 'PC', '$user_id_in', '$qty')";

if ($conn->query($sql) === TRUE) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
