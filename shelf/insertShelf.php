<?php
session_start();


    require_once('../php/config.php');

    if (isset($_POST['shelfName'])) {
        $shelfName = $_POST['shelfName'];

        // ดำเนินการ Insert ข้อมูลลงในฐานข้อมูล โดยใช้ $shelfName

        // เช่น
        $query = "INSERT INTO tbl_shelf(shelf_name) VALUES ('$shelfName')";
        $result = mysqli_query($con, $query);

        // ตรวจสอบผลลัพธ์การ Insert และดำเนินการต่อไปตามที่คุณต้องการ
        if ($conn->query($sql) === TRUE) {
            // Insert สำเร็จ
            echo "Shelf inserted successfully!";
        } else {
            // Insert ไม่สำเร็จ
            echo "Error inserting shelf: " . mysqli_error($con);
        }
    }

?>
