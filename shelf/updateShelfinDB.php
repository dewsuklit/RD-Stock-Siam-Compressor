
<?php
// เชื่อมต่อกับฐานข้อมูล
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siamcomp_db";

$conn = new mysqli($servername, $username, $password, $dbname);
// $conn2 = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจาก AJAX


$partcode = $_POST['partcode'];
$NewsubShelf = $_POST['NewsubShelf'];
$NewsubShelf = strtoupper($NewsubShelf);
$reqno = $_POST['reqNo'];





// บันทึกข้อมูลลงในฐานข้อมูล
// $sql = "INSERT INTO tbl_transactions(doc_input_partcode, quantity_out, user_id_out, date_out, balance, partname, request_no, subshelf_name)
// VALUE('$partcode', '$qtyOut', '$user_id_out', NOW(), '$total', '$partname', '$reqno', '$subShelf')";
$sql = "UPDATE  tbl_report_details  SET subshelf_name = '$NewsubShelf' WHERE doc_input_partcode LIKE '{$partcode}%' AND id = (SELECT MAX(id) FROM tbl_report_details)";
if ($conn->query($sql) === true) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
