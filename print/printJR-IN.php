<?php 

session_start();


require_once'phpqrcode/qrlib.php';


if ($_SESSION['id'] == ""){
    header("location: ../php/login.php");
}elseif(isset($_POST['clearbtnOut'])){
  header("location: ../qr/qr.php");
}else{
    

    $prodID = $_POST['prodID'];
    $subshelf = $_POST['subshelfDtl'];
    $prodName = $_POST['prodName'];
    $qty = $_POST['quantityResult'];
    $user_id_in = $_SESSION['name'];
    $qrInput = $prodID.",".$prodName;
    //generator Qr Code
    $path = 'imgQr/';
    $qrcode = $path.time().".png";
    QRcode :: png($qrInput, $qrcode, 'H', 4, 4);
   


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stock_db";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
    }
    if ($prodID != "" ) {
        $dateIn = date('Y-m-d');
        $unit = 'PC';
    } else {
        echo"<script>window.location.href='qr.php';</script>";
    }
    

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Details</title>
  <link rel="stylesheet" href="../css/style-print.css" />
    <script src="../js/jquery-3.7.0.min.js"></script>
    <script src="html2canvas.js"></script>
    <style>
    .qr-code {
        width: 80px;
    }
    .title2{
        text-align: left;
    }
    
  </style>
</head>
<body>
    <div class="container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" d="M179.9 388l-76.16-132 76.16 132zM179.9 388h152.21l76.15-132-76.15-132H179.9l-76.16 132 76.16 132zM103.74 256l76.16-132-76.16 132z"/><path d="M496 256L376 48H239.74l-43.84 76h136.21l76.15 132-76.15 132H195.9l43.84 76H376l120-208z"/><path d="M179.9 388l-76.16-132 76.16-132 43.84-76H136L16 256l120 208h87.74l-43.84-76z"/></svg>
                        </span>

                        <span class="title">SIAM COMPRESSOR </span>
                    </a>
                </li>

                <li>
                    <a href="../php/index.php">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 448h56a56 56 0 0056-56v-56M448 176v-56a56 56 0 00-56-56h-56M176 448h-56a56 56 0 01-56-56v-56M64 176v-56a56 56 0 0156-56h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                        </span>

                        <span class="title">Scan</span>
                    </a>
                </li>
                <li class="hovered">
                    <a href="../manual-inv/manual-invoice.php">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M368 415.86V72a24.07 24.07 0 00-24-24H72a24.07 24.07 0 00-24 24v352a40.12 40.12 0 0040 40h328" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M416 464h0a48 48 0 01-48-48V128h72a24 24 0 0124 24v264a48 48 0 01-48 48z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M240 128h64M240 192h64M112 256h192M112 320h192M112 384h192"/><path d="M176 208h-64a16 16 0 01-16-16v-64a16 16 0 0116-16h64a16 16 0 0116 16v64a16 16 0 01-16 16z"/></svg>
                        </span>
                        <span class="title">Manual Invoice</span>
                    </a>
                </li>

                <li>
                    <a href="../shelf/shelf.php">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M48 336v96a48.14 48.14 0 0048 48h320a48.14 48.14 0 0048-48v-96" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 336h144M320 336h144M192 336a64 64 0 00128 0"/><path d="M384 32H128c-26 0-43 14-48 40L48 192v96a48.14 48.14 0 0048 48h320a48.14 48.14 0 0048-48v-96L432 72c-5-27-23-40-48-40z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 192h144M320 192h144M192 192a64 64 0 00128 0"/></svg>
                        </span>
                        <span class="title">Shelf</span>
                    </a>
                </li>

                <li>
                    <a href="../shelf/moveItem.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256"/><path d="M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                    </span>
                    <span class="title">Chang Shelf</span>
                    </a>
                </li>
                <li>
                    <a href="../php/viewStockOut.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M80 152v256a40.12 40.12 0 0040 40h272a40.12 40.12 0 0040-40V152" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="48" y="64" width="416" height="80" rx="28" ry="28" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M320 304l-64 64-64-64M256 345.89V224"/></svg>
                    </span>
                    <span class="title">View Stock Out</span>
                    </a>
                </li>

                <li>
                    <a href="../php/logout.php">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                </div>


                <div class="user">
                    
                </div>
            </div>

            <input type="text" id="qrInput" value="<?php echo $reqNo."_".$partcode ?>" hidden>

            <!-- ========= Part Details list ========= -->
            <div class="details">
                <div class="manualForm">
                    
                    <a id="save_to_image">
                        <table cellpadding="0" cellspacing="0">
                                    <tr class="top">
                                        <td colspan="2"></td>
                                    </tr>
                                <tr class="title">
                                    <tr>
                                        <td>Stock-IN Details</td>
                                    </tr>
                                    <td class="image-cell">
                                        <div class="qr-code" >
                                            <img  src="<?php echo $qrcode ?>" id="qrImg" alt="qr-code">
                                        </div>
                                    </td>
                                    <td>
                                    <div class="table-containner" id="table-containner">
                                        <table>
                                            <tr class="item">
                                                <td class="title2">Product ID:</td>
                                                <td><?php echo $prodID ?></td>
                                            </tr>
                                            <tr class="item">
                                                <td class="title2">Product Name :</td>
                                                <td><?php echo $prodName ?></td>
                                            </tr>
                                            <tr class="item">
                                                <td class="title2">Date In :</td>
                                                <td><?php echo $dateIn ?></td>
                                            </tr>
                                            <tr class="item">
                                                <td class="title2">Sub Shelf:</td>
                                                <td><?php echo $subshelf ?></td>
                                            </tr>
                                            <tr class="item">
                                                <td class="title2">Quantity In:</td>
                                                <td><?php echo $qty ?></td>
                                            </tr>
                                            
                                            
                                        </table>
                                    </div>
                                </div>
                        </table>
                    </a>
                    <button type="submit" class="print" id="printSr" name="printSr" onclick="saveAsImage()"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- ========= Scripts ========= -->
    <script src="../js/main.js"></script>
    <script>
      function backBtn(){
        window.location.href='../qr/qr.php';
      }
    </script>
    <script>
        function saveAsImage() {
                html2canvas(document.getElementById('save_to_image')).then(function(canvas) {
                    const resizedCanvas = document.createElement('canvas');
                    const resizedContext = resizedCanvas.getContext('2d');
                    resizedCanvas.width = 570;
                    resizedCanvas.height = 360;
                    resizedContext.drawImage(canvas, 0, 0, 570, 360);

                    // Create a new FormData object
                    var formData = new FormData();

                    // Convert the resized canvas to a blob
                    resizedCanvas.toBlob(function(blob) {
                    // Create a file from the blob
                        var file = new File([blob], 'image.png');
                        var qrInput = document.getElementById('qrInput').value;

                        // Append the file to the FormData object
                        var filename =  `${qrInput}_in`;
                        // Append the file to the FormData object
                        formData.append('image', file, `${qrInput}_in.png`);

                        // Send the FormData to the server using AJAX
                        $.ajax({
                            url: 'saveImages.php',
                            method: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                console.log('Image saved successfully.');
                                window.location.href = `../rongta.php?qrInput=${filename}`;
                            },
                            error: function() {
                                console.log('Error occurred while saving the image.');
                                
                            }
                        });
                    });
                });
            }   
    </script>
</body>
</html>







<?php

    }
?>
                       