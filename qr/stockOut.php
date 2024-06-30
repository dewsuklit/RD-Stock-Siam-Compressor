
<?php
// เชื่อมต่อกับฐานข้อมูล
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_db";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
// $conn3 = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจาก AJAX

$user_id_out = $_SESSION['name'];
$prodID = $_POST['prodID'];
$prodName = $_POST['prodName'];
$qtyOut = $_POST['qtyOutInt'];
$subShelf = $_POST['subShelf'];
$subShelf = strtoupper($subShelf);
$balance = $_POST['balanceInt'];
$total = $balance - $qtyOut;




// บันทึกข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO tbl_transactions(product_id, quantity_out, user_id_out, date_out, balance, product_name, subshelf_name)
VALUE('$prodID', '$qtyOut', '$user_id_out', NOW(), '$total', '$prodName', '$subShelf')";
$sql2 = "UPDATE  tbl_report_details  SET balance = '$total' WHERE product_id LIKE '{$prodID}%' AND product_name LIKE '{$prodName}%' AND id = (SELECT MAX(id) FROM tbl_report_details)";
// $sql3 = "UPDATE  tbl_report_details  SET project_name = '$projName' WHERE product_id LIKE '{$prodID}%' AND product_name LIKE '{$prodName}%' AND id = (SELECT MAX(id) FROM tbl_report_details)";
if ($conn->query($sql) === true) {
    $conn2->query($sql2);
    // $conn3->query($sql3);
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
