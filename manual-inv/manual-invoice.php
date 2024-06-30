<?php 

    session_start();
    
    if ($_SESSION['id'] == ""){
        header("location: ../php/login.php");
    }else{
        $user_id_in = $_SESSION['name'];
        

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SAPRE PART</title>
    <script src="../js/jquery.min.js"></script>
    
    <!-- QR หากขะใช้งานแบบไม่มีอินเทอร์เน็ตให้ใช้ลิ้ง script ในคอมเม้น-->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script><!------  ../js/instascan.min.js ------>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script><!------  ../js/vue.min.js ------>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script><!------  ../js/adapter.min.js ------>
    <link rel="stylesheet" href="../css/style-manual.css">
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

                        <span class="title">SPARE PART </span>
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
                    <a href="manual-invoice.php">
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

            
            <div class="details">
                <div class="manualForm">
                    <div class="row my-4">
                            <div class="col-lg-10 mx-auto">
                                <div class="card shadow">
                                    <div class="card-body p-4">
                                        <div id="show_alert"></div>
                                        <form action="#" method="POST" id="add_form">
                                            <div class="card-header">
                                                <h4>Manual Stock In</h4>
                                                <!-- <div class="col-md-4 mb-3">
                                                    <input type="text" name="invNo" id="invNo" class="form-control"
                                                    placeholder="Invoice No." onblur="checkInvNo(this.value)" required>
                                                    <span id="invNoavailable"></span>
                                                </div>  -->
                                            </div>
                                            <br><br>                                        
                                            <div id="show_item">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3 mt-3">
                                                    <input type="text" name="partCode[]" id="partCode[]" class="partCode"
                                                        placeholder="Product ID" required>
                                                    </div>
                                                    <div class="col-md-4 mb-3 mt-3">
                                                        <input type="text" name="partName[]" id="partName[]" class="partName"
                                                        placeholder="Product Name" required>
                                                    </div>

                                                    <div class="col-md-2 mb-3 mt-3">
                                                        <input type="number" name="quantity[]" id="quantity[]" class="form-control"
                                                        placeholder="Quantity" required>
                                                    </div>

                                                    <div class="col-md-3 mb-3 mt-3">
                                                        <div class="inputShelfArea">
                                                            <input type="text" name="subshelf[]" id="subshelf[]" class="scanner-data" placeholder="Shelf Name" required>
                                                            <button class="Scanbtn" type="button" onclick="openPopup(this)" data-id="subshelf[]"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 448h56a56 56 0 0056-56v-56M448 176v-56a56 56 0 00-56-56h-56M176 448h-56a56 56 0 01-56-56v-56M64 176v-56a56 56 0 0156-56h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2 mb-3 mt-3 d-grid">
                                                        <button class="addMorebtn">Add More</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="submit" value="submit" class="submitbtn" id="add_btn">
                                            </div>
                                        </form>
                                        <div class="popupScan" id="popupScan">
                                            <div class="video-container" id="video-container"  >
                                                <div class="vdo">
                                                    <video id="preview" style="width: 100%;" ></video>
                                                </div>
                                            </div>
                                            <button type="submit" class="closeScan" onclick="closePopup()">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="upload">
                            <div class="wrapper">
                                <header>Invoice File Upload</header>
                                <form action="#" class="formUpload" id="formUpload" name="formUpload">
                                    <input type="file" class="file-input" name="file" hidden>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 640 512"><style>svg{fill:#6990f2}</style><path d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zM393.4 288H328v112c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V288h-65.4c-14.3 0-21.4-17.2-11.3-27.3l105.4-105.4c6.2-6.2 16.4-6.2 22.6 0l105.4 105.4c10.1 10.1 2.9 27.3-11.3 27.3z"/></svg>
                                    <p>Browse File to Upload</p>
                                </form>
                                <section class="progress-area"></section>
                                <section class="uploaded-area"></section>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- ========= Scripts ========= -->
    <script src="../js/main.js"></script>
    <script src="../js/jquery-3.7.0.min.js"></script>


    <script>
    function checkInvNo(val) {
        let invNo = document.getElementById('invNo');
        if(invNo != ""){
            $.ajax({
                type: 'POST',
                url: 'checkinv_no.php',
                data: 'invNo=' + val,
                success: function(data) {
                    $('#invNoavailable').html(data);
                }
            });
        }
        
    }
    </script>
     
    <script>
        $(document).ready(function() {
        $(".addMorebtn").click(function(e) {
            e.preventDefault();
            
            
                $("#show_item").append(`<div class="row append_item">
                                                        <div class="col-md-4 mb-3 mt-3">
                                                        <input type="text" name="partCode[]" id="partCode[]"  class="partCode"
                                                                placeholder="Product ID"  required>
                                                        </div>
                                                        <div class="col-md-4 mb-3 mt-3">
                                                            <input type="text" name="partName[]" id="partName[]"   class="partName"
                                                            placeholder="Product Name" required>
                                                        </div>

                                                        <div class="col-md-2 mb-3 mt-3">
                                                            <input type="number" name="quantity[]" id="quantity[]" class="form-control"
                                                            placeholder="Quantity" required>
                                                        </div>

                                                        <div class="col-md-3 mb-3 mt-3">
                                                            <div class="inputShelfArea">
                                                                <input type="text" name="subshelf[]" id="subshelf[]" class="scanner-data" placeholder="Shelf Name" required>
                                                                <button class="Scanbtn" type="button" onclick="openPopup(this)" data-id="subshelf[]"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 448h56a56 56 0 0056-56v-56M448 176v-56a56 56 0 00-56-56h-56M176 448h-56a56 56 0 01-56-56v-56M64 176v-56a56 56 0 0156-56h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg></button>
                                                            </div>
                                                        </div>
                                        
                                        <div class="col-md-2 mb-3 mt-3 d-grid">
                                            <button class="removebtn">Remove</button>
                                        </div>
                                    </div>`);
            
            
        });

        $(document).on('click', '.removebtn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

        //ajax request to insert all form data
        $(document).ready(function() {
            $('#add_form').submit(function(e) {
                e.preventDefault();
                var isValid = true;

                // เช็คค่าว่างใน input ทุกช่อง
                $('#add_form input').each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false; // หยุดการทำงานของ loop ถ้ามีค่าว่าง
                }
                });

                if (isValid) {
                    $("#add_btn").val('Adding...');
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $(this).serialize(),
                        success: function(response) {
                            $("#add_btn").val('submit');
                            $("#add_form")[0].reset();
                            $(".append_item").remove();
                            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
                            
                        }
                    });
                } else {
                    $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
                }
            });
            });
        });
    </script>
    
    <script>
        let subshelfInputs  = document.getElementsByClassName('scanner-data');
        let scanner;
        let popup = document.getElementById("popupScan");
        
        //let row = button.closest('.row');
        function openPopup(button) {
            let subshelfInput = button.previousElementSibling;

            popup.classList.add("open-popup");

            scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

            scanner.addListener('scan', function(content) {
                subshelfInput.value = content;
                closePopup();
            });

            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        }


        function closePopup(){
            popup.classList.remove("open-popup");
            scanner.stop();
            
        }
    </script>


    

    <!-- <script>

        $("#show_item").on("keyup", ".partCode", function(event) {
            var inputIndex = $(this).index(".partCode");
            var inputVal = $(this).val();
            var partNameElement = $(this).parent().next().find(".partName");

            if (inputVal !== "") {
                $.ajax({
                    type: "POST",
                    url: "invname.php",
                    data: { partCode: inputVal, index: inputIndex },
                    success: function(response) {
                        partNameElement.val(response);
                    }
                });
            } else {
                partNameElement.val("");
            }
        });
    </script> -->

    </body>
</html>


<?php
    }
?>
