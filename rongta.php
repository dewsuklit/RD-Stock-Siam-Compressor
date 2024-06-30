<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/RD2/escpos-php/vendor/autoload.php');
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;


// Check if qrInput is present in the query parameters
if (isset($_GET['qrInput'])) {
    // Get the value of qrInput
    $filename = $_GET['qrInput'];
    // เรียกใช้โค้ดที่คุณต้องการเมื่อปุ่มถูกคลิก
        
    // ตั้งค่าการเชื่อมต่อกับเครื่องพิมพ์
    $printer_ip = "172.31.199.57"; // แทนที่ด้วย IP address ของเครื่องพิมพ์
    $printer_port = 9100; // พอร์ตเริ่มต้นสำหรับเครื่องพิมพ์ Bluetooth

    // เชื่อมต่อกับเครื่องพิมพ์
    $connector = new NetworkPrintConnector($printer_ip, $printer_port);
    $printer = new Printer($connector);
    $image_path = "print/imgTag/".$filename.".png";
    $escpos_image = EscposImage::load($image_path);
    //$printer->text('ttt');
    $printer->bitImage($escpos_image);

    // ตัดกระดาษ
    $printer->cut();

    // ปิดการเชื่อมต่อกับเครื่องพิมพ์
    $printer->close();
    // Use the qrInput value as needed
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previousPage = $_SERVER['HTTP_REFERER'];
        $previousFile = basename($_SERVER['HTTP_REFERER']);
        if ($previousFile == 'printJR-IN.php') {
            header("Location: ../RD2/qr/qr.php");
        }else if ($previousFile == 'printJR-OUT.php') {
            header("Location: ../RD2/qr/qr_out.php");
        }else if ($previousFile == 'printMoveItem.php') {
            header("Location: ../RD2/shelf/moveItem.php");
        }else{
            header("Location: $previousPage");
            exit();
        }
        
    }
} else {
    // qrInput parameter is missing
    echo "qrInput parameter is missing.";
}


        
        
    
    
?>

