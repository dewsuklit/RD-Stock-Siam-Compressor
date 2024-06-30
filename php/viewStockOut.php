<?php 

    session_start();
    
    if ($_SESSION['id'] == ""){
        header("location: login.php");
    }else{
        require_once('config.php');
        $query = "SELECT * FROM tbl_transactions ORDER BY id DESC";
        
        $result = mysqli_query($con, $query);
        $query2 = "SELECT * FROM tbl_report_details ORDER BY id DESC";
        
        $result2 = mysqli_query($con, $query2);
        
        $query3 = "UPDATE tbl_report_details
        SET num_days_stock = DATEDIFF(CURDATE(), date_in)";
        $result3 = mysqli_query($con, $query3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <script src="../js/jquery-3.7.0.min.js"></script>
    <link rel="stylesheet" href="../css/style-viewStockOut.css">
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

              <span class="title">SPARE PART</span>
            </a>
          </li>

          <li class="hovered">
            <a href="index.php">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M336 448h56a56 56 0 0056-56v-56M448 176v-56a56 56 0 00-56-56h-56M176 448h-56a56 56 0 01-56-56v-56M64 176v-56a56 56 0 0156-56h56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
              </span>

              <span class="title">Scan</span>
            </a>
          </li>
          <li>
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
            <a href="logout.php">
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

          <div class="search" id="searchIn" style="display: none;">
            <label for="">
              <input type="text" id="liveSearchIn" placeholder="Search here" />
              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
            </label>
          </div>
          <div class="search" id="searchOut" style="display: block;">
            <label for="">
              <input type="text" id="liveSearchOut" placeholder="Search here" />
              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
            </label>
          </div>

          <div class="user">
            
          </div>
        </div>

        
        
        
        <!-- ========= Part Details list ========= -->
        <div class="details" id="dtlStockOut" style="display: block;">
          
          <div class="recentPart">
            <div class="cardHeader">
              <h2>Recent Stock Out</h2>
              <!-- <a  class="btn" onclick="changeDisplay()">STOCK IN</a> -->
            </div>
            <table id="myTable">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Date Out</td>
                        <td>Subshelf</td>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>Quantity Out</td>
                        <td>Stock Out by</td>
                        <td>Balance</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                    <?php
                        
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['date_out']; ?></td>
                        <td><?php echo $row['subshelf_name']; ?></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity_out']; ?></td>
                        <td><?php echo $row['user_id_out']; ?></td>
                        <td><?php echo $row['balance']; ?></td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <div id="searchresult"></div>
              
            
          </div>
          
        </div>
        <div class="details">
          
          <div class="recentPart" id="dtlStockIn" style="display: none;">
            <div class="cardHeader">
              <h2>Recent Stock In</h2>
              <a  class="btn" onclick="changeDisplay()">Stock OUT</a>
            </div>
            
            <table id="myTable2">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Date In</td>
                        <td>Number of days</td>
                        <td>Subshelf</td>
                        <td>Product ID</td>
                        <td>Product Name</td>
                        <td>Quantity</td>
                        <td>Stock In by ID</td>
                        <td>Balance</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                    <?php
                        
                        while($row1 = mysqli_fetch_assoc($result2)){
                    ?>
                        
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['date_in']; ?></td>
                        <td><?php echo $row['num_days_stock']." d."; ?></td>
                        <td><?php echo $row['subshelf_name']; ?></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['user_id_in']; ?></td>
                        <td><?php echo $row['balance']; ?></td>

                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           
            <div id="searchresult2"></div>
              
            
          </div>
          
        </div>
      </div>
    </div>
    <!-- ========= Scripts ========= -->
    <script src="../js/main.js"></script>
    <!-- ========= Live Search ========= -->                 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#liveSearchOut").keyup(function(){
          var input = $(this).val();
          if(input != ""){
            $.ajax({
              url: "../php/livesearchStockOut.php",
              method: "POST",
              data: {input: input},
              success: function(data){
                $("#searchresult").html(data);
                $("#searchresult").css("display", "block");
                $("#myTable").css("display", "none");
                
              }
            });
          }else{
            $("#searchresult").css("display", "none");
            $("#myTable").css("display", "table");
          }
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#liveSearchIn").keyup(function(){
          var input = $(this).val();
          if(input != ""){
            $.ajax({
              url: "../php/livesearch.php",
              method: "POST",
              data: {input: input},
              success: function(data){
                $("#searchresult2").html(data);
                $("#searchresult2").css("display", "block");
                $("#myTable2").css("display", "none");
                
              }
            });
          }else{
            $("#searchresult2").css("display", "none");
            $("#myTable2").css("display", "table");
          }
        });
      });
    </script>
    
    <script>
      function changeDisplay() {
          let popupIN = document.getElementById('dtlStockIn');
          let popupOUT = document.getElementById('dtlStockOut');
          let searchIn = document.getElementById('searchIn');
          let searchOUT = document.getElementById('searchOut');

          if (popupIN.style.display === 'none') {
              popupIN.style.display = 'block';
              popupOUT.style.display = 'none';
              searchIn.style.display = 'block';
              searchOUT.style.display = 'none';
          }else{
              popupOUT.style.display = 'block';
              popupIN.style.display = 'none';
              searchIn.style.display = 'none';
              searchOUT.style.display = 'block';
          }
      }
    </script>       
    
  </body>

</html>

<?php

    }
?>