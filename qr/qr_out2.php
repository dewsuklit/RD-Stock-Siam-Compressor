<?php 

    session_start();
    
    if ($_SESSION['id'] == ""){
        header("location: ../php/login.php");
    }elseif ($_POST['prodID'] == ""){
        header("location: ../qr/qr_out.php");
    }else{            


// Retrieve the search query from the form submission
$searchQuery = $_POST['prodID'];
$searchQuery2 = $_POST['prodName'];

// Perform the database search (replace with your own database connection code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Construct the SQL query using the search query
$sql = "SELECT * FROM tbl_report_details WHERE product_name = '$searchQuery2' AND product_id = '$searchQuery' AND id = (SELECT MAX(id) FROM tbl_report_details)";


$result = $conn->query($sql);



// Fetch the first matching result (you can modify this as per your requirements)
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $prodID = $row['product_id'];
    $prodName = $row['product_name'];
    $subshelf =  $row['subshelf_name'];
    $dateResult = $row['date_in'];
    $quantityResult = $row['quantity'];
    $balance = $row['balance'];
    $numofdays = $row['num_days_stock'];
     // Replace 'column_name' with the actual column from the database
    } elseif($result->num_rows <= 0) {
        $regNo = $searchQuery;    
        $partcodeResult = "No result found.";
        $projName = "No result found.";
        $partName = "No result found.";
        $subshelf = "No result found.";
        $dateResult = "No result found.";
        $quantityResult = 0;
        $balance = 0;
        $dateResult = "No result found.";
        $numofdays = "0";
    }else{
        header("location: ../php/index.php");
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
  <link rel="stylesheet" href="../css/style-manual.css" />
  <style>
    .popup2{
            width: 400px;
            background: #fff;
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }
        .open-popup{
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .popup2 img{
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            
        }
        .popup2 h2{
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }
        .popup2 button{
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background: #6fd649;
            color: #fff;
            border: 0;
            outline: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0,0,0,0.2);
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

            <!-- ========= Part Details list ========= -->
            <div class="details">
                <div class="manualForm">
                    <div class="row my-4">
                            <div class="col-lg-10 mx-auto">
                                <div class="card shadow">
                                    <div class="card-body p-4">
                                        <div id="show_alert"></div>
                                        <form action="../print/printJR-OUT.php" method="POST" id="add_form" >
                                            <div class="card-header">
                                                <h4>Request Details</h4>
                                                <div class="row">
                                                    <div class="column">
                                                      <label>Product ID</label>
                                                      <input type="text" id="prodID" name="prodID"  value="<?php echo $prodID; ?>" readonly>
                                                    </div>
                                                    <div class="column">
                                                      <label>Subshelf</label>
                                                      <input type="text" id="subshelfDtl" name="subshelfDtl" value="<?php echo $subshelf; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>                                      
                                            <div id="show_item">
                                                <div class="row">
                                                    <div class="col-md-4 mb-3 mt-3">
                                                        <label>Date In :</label>
                                                        <input type="text" id="dateResult" value="<?php echo $dateResult; ?>" readonly>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-4 mb-3 mt-3">
                                                        <label>Number of days :</label>
                                                        <input type="text" id="dateResult" value="<?php echo $numofdays." days"; ?>" readonly>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-4 mb-3 mt-3">
                                                        <label>Product Name :</label>
                                                        <input type="text" id="prodName" name="prodName" value="<?php echo $prodName; ?>" readonly>
                                                    </div>
                                                </div> 
                                                
                                                <!-- <div class="row">
                                                    <div class="col-md-2 mb-3 mt-3">
                                                        <label>Quantity In :</label>
                                                        <input type="number" id="quantityResult" value="<?php echo $quantityResult; ?>" readonly>
                                                    </div>
                                                </div>   -->
                                                <div class="row">
                                                    <div class="col-md-2 mb-3 mt-3">
                                                        <label>Balance :</label>
                                                        <input type="number" id="balance" name="balance" value="<?php echo $balance; ?>" readonly>
                                                    </div>
                                                </div>  
                                                <div class="row">
                                                    <div class="col-md-2 mb-3 mt-3">
                                                        <label>Quantity Out :</label>
                                                        <input type="number" id="qtyOut" name="qtyOut"  name="qtyOut" required>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div>
                                                <button type="submit" class="stockOutBtn" id="btn" name="submit" value="submit" onclick="saveData()">submit</button>
                                            </div>
                                        </form>
                                        <button type="submit" class="backBtn" id="btn" onclick="clearbtnOut()">back</button>
                                        <div class="popup2" id="popup2">
                                            <h2>Thank You</h2>
                                            <p>Your details has been successfully submitted.</p>
                                            <button type="submit" onclick="closePopup()">OK</button>
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
    <script src="../js/jquery-3.7.0.min.js"></script>
    

    <script>
        function saveData() {
            let popup = document.getElementById("popup2");
            function openPopup(){
                popup.classList.add("open-popup");
            }
            function closePopup(){
                popup.classList.remove("open-popup");
            }
            var prodID = document.getElementById("prodID").value;
            var prodName = document.getElementById('prodName').value;
            var subShelf = document.getElementById("subshelfDtl").value;
            var qtyOut = document.getElementById("qtyOut").value;
            var qtyOutInt = parseInt(qtyOut);
            var balance = document.getElementById("balance").value;
            var balanceInt = parseInt(balance);
            if (qtyOut != ""){
                if(qtyOutInt <= balanceInt){
                    $.ajax({
                        type: "POST",
                        url: "stockOut.php",
                        data: {
                            prodID: prodID, 
                            prodName: prodName,
                            qtyOutInt: qtyOutInt,
                            balanceInt: balanceInt,
                            subShelf: subShelf,
                        },
                        success: function(response) {
                        },
                        error: function(xhr, status, error) {
                            alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล: " + error);
                        }
                    }); 
                }else if(qtyOutInt > balanceInt){
                    alert("จำนวนคงเหลือไม่เพียงพอสำหรับการเบิก");  
                }
            }
        }
    </script>
    
    
</body>
</html>



<?php

    }
?>
                       