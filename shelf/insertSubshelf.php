<?php
session_start();

require_once('../php/config.php');

if (isset($_POST['subshelfName'])) {
    $subshelfName = $_POST['subshelfName'];
    $subshelfName = strtoupper($subshelfName);
    $trimmedName = preg_replace('/\d+$/', '', $subshelfName);
    

    // เช็คค่าในตารางอื่น โดยใช้ $trimmedName เป็นเงื่อนไข
    $query = "SELECT shelf_id FROM tbl_shelf WHERE shelf_name = '$trimmedName'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // พบข้อมูลที่ตรงกันในตารางอื่น
            $row = mysqli_fetch_assoc($result);
            $id = $row['shelf_id'];
            echo "Found matching ID: " . $id;
        } else {
            // ไม่พบข้อมูลที่ตรงกันในตารางอื่น
            echo "No matching ID found.";
        }
    } else {
        // เกิดข้อผิดพลาดในการสอบถามฐานข้อมูล
        echo "Error: " . mysqli_error($con);
    }

    //ดำเนินการ Insert ข้อมูลลงในฐานข้อมูล โดยใช้ $subshelfName และ $id

    $query = "INSERT INTO tbl_subshelf(subshelf_name, shelf_id) VALUES ('$subshelfName','$id')";
    $result = mysqli_query($con, $query);

    // ตรวจสอบผลลัพธ์การ Insert และดำเนินการต่อไปตามที่คุณต้องการ
    if ($result) {
        // Insert สำเร็จ
        echo "Sub shelf inserted successfully!";
    } else {
        // Insert ไม่สำเร็จ
        echo "Error inserting sub shelf: " . mysqli_error($con);
    }
}
?>
