<?php

    session_start();
    
    if ($_SESSION['id'] == ""){
        header("location: ../php/login.php");
    }else{
        $user_id_in = $_SESSION['name'];
        $config = array(
            "trace"      => 1,          // เปิดใช้งาน trace เพื่อดูข้อมูลว่าเกิดอะไรขึ้น
            "exceptions" => 0,          // ปิดการใช้งาน exceptions
            "cache_wsdl" => 0
        );
        if (isset($_POST['reqNo'])) {
            $reqno = $_POST['reqNo'];
            $_SESSION['reqNo'] = $reqno;
            $reqno = $_POST['reqNo'];
            $parts = explode("$", $reqno);
            $sr_no = $parts[0];
            $sr_id = $parts[1];
    
        // กำหนดค่าพารามิเตอร์
            $param['sr_no'] = $sr_no;
            $param['sr_id'] = $sr_id;
            $client = new SoapClient("http://172.31.23.7:80/TechnicService/Services/rdstock_service.asmx?wsdl", $config);
            $result = $client->get_srticket($param)->get_srticketResult;
            $result = json_decode($result,1);
      

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Web</title>
    <link rel="stylesheet" href="../css/style-searchSR.css" />
    <!-- QR หากขะใช้งานแบบไม่มีอินเทอร์เน็ตให้ใช้ลิ้ง script ในคอมเม้น-->
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> <!------  ../js/instascan.min.js ------>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script><!------  ../js/vue.min.js ------>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script><!------  ../js/adapter.min.js ------>
    

</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="logo-web-component"></ion-icon>
                        </span>

                        <span class="title">SIAM COMPRESSOR </span>
                    </a>
                </li>

                <li>
                    <a href="../php/index.php">
                        <span class="icon">
                            <ion-icon name="scan-outline"></ion-icon>
                        </span>

                        <span class="title">Scan</span>
                    </a>
                </li>
                <li class="hovered">
                    <a href="../manual-inv/manual-invoice.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">Manual Invoice</span>
                    </a>
                </li>

                <li>
                    <a href="../shelf/shelf.php">
                        <span class="icon">
                            <ion-icon name="file-tray-stacked-outline"></ion-icon>
                        </span>
                        <span class="title">Shelf</span>
                    </a>
                </li>

                <li>
                    <a href="../shelf/moveItem.php">
                    <span class="icon">
                        <ion-icon name="shuffle-outline"></ion-icon>
                    </span>
                    <span class="title">Chang Shelf</span>
                    </a>
                </li>
                <li>
                    <a href="../php/viewStockOut.php">
                    <span class="icon">
                        <ion-icon name="archive-outline"></ion-icon>
                    </span>
                    <span class="title">View Stock Out</span>
                    </a>
                </li>

                <li>
                    <a href="../php/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
                <div class="user">
                    <img src="../imgs/user.png" alt="" />
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
                                                <h4>SR</h4>
                                            </div>
                                            <form  method="post" class="table-bordered">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>SR ID.</th>
                                                            <th>SR No.</th>
                                                            <th>Part Code</th>
                                                            <th>Quantity</th>
                                                            <th>Part Name</th>
                                                            <th>Project Name</th>
                                                            <th>Shelf</th>
                                                            <th></th>
                                                            <!-- เพิ่มหัวตารางอื่น ๆ ตามต้องการ -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($result as $row) { ?>
                                                            <tr>
                                                                <?php foreach ($row as $value) { ?>
                                                                    <td><?php echo $value; ?></td>
                                                                <?php } ?>
                                                                
                                                                <td class="inputProjArea">
                                                                    <input type="text" id="project_name[]" name="project_name[]"  style="margin-bottom:5px;"  required>
                                                        
                                                                </td>
                                                                <td class="inputShelfArea">
                                                                    <input type="text" id="subshelf_name[]" name="subshelf_name[]" class="scanner-data" style="margin-bottom:5px;"  required>
                                                                    <button class="Scanbtn" type="button" onclick="openPopup(this)">
                                                                        <ion-icon name="scan-outline" style="font-size: 22px;">
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="selected_rows[]" style="display:none;" value="<?php echo implode(',', $row); ?>">
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="addbtn" id="submitBtn">Submit</button>
                                            </form>
                                            
                                        </form>
                                        <button type="submit" class="clearbtnOut" id="clearbtnOut" name="clearbtnOut" onclick="clearbtn()">back</button>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========= Scripts ========= -->
    <script src="../js/main.js"></script>

    <!-- ========= ionicons ========= -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'></script>
     <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                $('input[type="checkbox"]').prop('checked', true);
                $('#add_form').submit(); // Submit the form after selecting all checkboxes
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
</body>

</html>
<?php
} 

// เมื่อกด submit
// ...

if (isset($_POST['selected_rows'])) {
    $selectedRows = $_POST['selected_rows'];

    // เชื่อมต่อฐานข้อมูล (ใช้ข้อมูลการเชื่อมต่อฐานข้อมูลของคุณ)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "siamcomp_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $subshelfNames = $_POST['subshelf_name'];
    $projNames = $_POST['project_name'];

    foreach ($selectedRows as $index => $selectedRow) {
        $selectedData = explode(',', $selectedRow);

        // แสดงข้อมูลในแถวที่ถูกเลือก
        if (count($selectedData) > 6) {
            $srNo = $selectedData[1] . '$' . $selectedData[0];
            $partCode = $selectedData[4];
            $quantity = $selectedData[5];
            $partName = $selectedData[6];
        } else {
            // เพิ่มข้อมูลลงในฐานข้อมูล
            $srNo = $selectedData[1] . '$' . $selectedData[0];
            $partCode = $selectedData[3];
            $quantity = $selectedData[4];
            $partName = $selectedData[5];
        }

        // Get the corresponding subshelf name for the current row
        $subshelfName = strtoupper($subshelfNames[$index]);
        $projName = $projNames[$index];
        // สร้างคำสั่ง SQL เพื่อเพิ่มข้อมูล
        $sql = "INSERT INTO tbl_report_details (request_no, doc_input_partcode, quantity, unit, user_id_in, balance, subshelf_name, partname, project_name) VALUES ('$srNo', '$partCode', '$quantity', 'PC', '$user_id_in', '$quantity', '$subshelfName', '$partName', '$projName')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='../print/printSR.php';</script>";
        } else {
            echo "การเพิ่มข้อมูลลงในฐานข้อมูลล้มเหลว: " . $conn->error;
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}

// ...

?>
<?php

    }
?>