<?php
// ตรวจสอบว่ามีการส่งข้อมูลรูปภาพมาหรือไม่
if(isset($_FILES['image'])) {
    $targetDirectory = 'imgTag/'; // กำหนดโฟลเดอร์ที่ต้องการเก็บรูปภาพ

    // ตรวจสอบว่าโฟลเดอร์มีอยู่หรือไม่ หากไม่มีให้สร้างโฟลเดอร์
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $targetFile = $targetDirectory . basename($_FILES['image']['name']); // กำหนด path ของไฟล์ที่ต้องการบันทึก

    // บันทึกไฟล์รูปภาพ
    if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo 'บันทึกรูปภาพเรียบร้อยแล้ว';
    } else {
        echo 'เกิดข้อผิดพลาดในการบันทึกรูปภาพ';
    }
}
?>
