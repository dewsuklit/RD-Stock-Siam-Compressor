<?php
session_start();
$filename = $_SESSION['filename'];
$conn = new PDO('mysql:host=localhost;dbname=siamcomp_db', 'root', '');
if($_POST['partCode'] != ""){
    foreach($_POST['partCode'] as $key => $value){
        $sql = 'INSERT INTO tbl_report_details(request_no, subshelf_name, doc_input_partcode, quantity, unit, user_id_in, balance, partname, project_name) VALUES (:invNo,:subshelf,:partCode, :quantity, :unit, :Id, :quantity, :partName, :projName)';
        $stmt = $conn->prepare($sql);
        $stmt -> execute([
            'invNo' => $_POST['invNo'],
            'projName' => $_POST['projName'],
            'partCode' => $value,
            'partName' => $_POST['partName'][$key],
            'subshelf' => strtoupper($_POST['subshelf'][$key]),
            'quantity' => $_POST['quantity'][$key],
            'unit' => 'PC',
            'Id' => $_SESSION['name'],
        ]);
    }
}
if($filename != ""){
    $sourceFile = '../manual-inv/files/' . $filename;
    $destinationFolder = '../../invoice_upload/';

    // ตรวจสอบว่าโฟลเดอร์ปลายทางมีอยู่หรือไม่ ถ้าไม่มีให้สร้างโฟลเดอร์
    if (!file_exists($destinationFolder)) {
        mkdir($destinationFolder, 0777, true);
    }

    // ใช้ฟังก์ชัน rename() เพื่อย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง
    if (rename($sourceFile, $destinationFolder . basename($sourceFile))) {
        
    } else {
        echo 'เกิดข้อผิดพลาดในการย้ายไฟล์';
    }
}




echo "<script>window.location.href='../print/printM-inv.php';</script>";

?>