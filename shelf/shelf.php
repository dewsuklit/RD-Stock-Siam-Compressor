<?php 

    session_start();
    
    if ($_SESSION['id'] == ""){
        header("location: ../php/login.php");
    }else{
        require_once('../php/config.php');
        
        $query = "SELECT * FROM tbl_report_details ORDER BY id DESC";
        $queryShelf = "SELECT * FROM tbl_shelf";
        $querySubShelf = "SELECT * FROM tbl_subshelf";
        $result = mysqli_query($con, $query);
        $resultShelf = mysqli_query($con, $queryShelf);
        $resultSubShelf = mysqli_query($con, $querySubShelf);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siam Compressor</title>
    <script src="../js/jquery-3.7.0.min.jss"></script>
    <link rel="stylesheet" href="../css/style-shelf.css">
    <style>
        .shelfbtn{
            width: 60px;
            position: grid;
            padding: 5px 10px;
            background: var(--blue);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
            margin-top : 15px
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

              <span class="title">SPARE PART </span>
            </a>
          </li>

          <li class="hovered">
            <a href="../php/index.php">
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

        
          
        
        <div id="popup"  style="display:grid;">
          <div class="details"> 
              <div class="recentPart">
                <div class="cardHeader">
                  <h2>Shelf</h2>
                  <a href="#" class="btn" onclick="openPopup()">Add</a>
                </div>
                
                
                    
                    
                    <?php
                        while($row = mysqli_fetch_assoc($resultShelf)){
                    ?>
                        <button class="shelfbtn" id="myTd" onclick="sendShelfName('<?php echo $row['shelf_id'];; ?>')"><?php echo $row['shelf_name']; ?></button>
                    <?php
                        }
                    ?>
                    
                    
              </div>
              
          </div>
        </div>


        <div id="popup2"  style="display:none;">
          <div class="details"> 
              <div class="recentPart">
                <div class="cardHeader">
                  <h2>Sub Shelf</h2>
                  <a href="#" class="btn" onclick="openPopup2()">Add</a>
                </div>
                
                
                    
                    
                <div id="searchShelf"></div>
                
                
              </div>
          </div>
        </div>
        
        <div class="popupAddShelf" id="popupAddShelf">
            <a class="myTagA" href="#" onclick="closePopupShelf()">x</a>
            <h2>Insert Shelf</h2>
            <input type="text" name="shelfName" id="shelfName" class="form-control"  placeholder="Shelf Name" >
            <button type="submit" onclick="insertShelf()">SUBMIT</button>
        </div>
        <div class="popupAddShelf" id="popupAddSubShelf">
            <a class="myTagA" href="#" onclick="closePopupSubShelf()">x</a>
            <h2>Insert Sub Shelf</h2>
            <input type="text" name="subshelfName" id="subshelfName" class="form-control"  placeholder="Sub Shelf Name" require>
            <button type="submit" onclick="insertSubShelf()">SUBMIT</button>
        </div>
      </div>
    </div>
    <!-- ========= Scripts ========= -->
    <script src="../js/main.js"></script>
    <script src="../js/jquery.min.js"></script>
    <!-- ========= Live Search ========= -->                 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#liveSearch").keyup(function(){
          var input = $(this).val();
          if(input != ""){
            $.ajax({
              url: "../php/livesearch.php",
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
          
    <script>
        function sendShelfName(shelfId) {
            $.ajax({
            type: "POST",
            url: "searchShelf.php", // เปลี่ยนเป็น URL ของไฟล์ที่จะทำการประมวลผล
            data: { shelfId: shelfId },
            success: function(data){
                $("#searchShelf").html(data);
                $("#popup2").css("display", "grid");
            },
            error: function(xhr, status, error) {
                // ทำสิ่งที่คุณต้องการเมื่อเกิดข้อผิดพลาดในการส่งข้อมูล
                console.error('Error sending shelf name:', error);
            }
            });
        }
    </script>

    <script>
          let popupShelf = document.getElementById("popupAddShelf");
          function openPopup(){
            popupShelf.classList.add("open-popup");
          }


          function closePopupShelf(){
            popupShelf.classList.remove("open-popup");
          }


          function insertShelf() {
            var shelfName = document.getElementById("shelfName").value;
            if(shelfName !=""){
              $.ajax({
                type: "POST",
                url: "insertShelf.php", // เปลี่ยนเป็น URL ของสคริปต์ PHP ที่จะดำเนินการ Insert ข้อมูล
                data: { shelfName: shelfName },
                success: function(data) {
                    // ดำเนินการหลังจาก Insert ข้อมูลสำเร็จ (ถ้าต้องการ)
                    closePopupShelf();
                    window.location.href='shelf.php';
                },
                error: function(xhr, status, error) {
                    // ทำสิ่งที่คุณต้องการเมื่อเกิดข้อผิดพลาดในการส่งข้อมูล
                    console.error('Error inserting shelf:', error);
                }
              });
            }else{
              alert('กรุณากรอก Shelf');
            }
            
        }
      </script>



      <script>
            
            let popupSubshelf = document.getElementById("popupAddSubShelf");
            
            function openPopup2(){
              popupSubshelf.classList.add("open-popup");
            }


            function closePopupSubShelf(){
              popupSubshelf.classList.remove("open-popup");
            }


            function insertSubShelf() {
              var subshelfName = document.getElementById("subshelfName").value;
              if(subshelfName !=""){
                $.ajax({
                    type: "POST",
                    url: "insertSubshelf.php", // เปลี่ยนเป็น URL ของสคริปต์ PHP ที่จะดำเนินการ Insert ข้อมูล
                    data: { subshelfName: subshelfName },
                    success: function(data) {
                        // ดำเนินการหลังจาก Insert ข้อมูลสำเร็จ (ถ้าต้องการ)
                        closePopupSubShelf();
                        window.location.href='shelf.php';
                    },
                    error: function(xhr, status, error) {
                        // ทำสิ่งที่คุณต้องการเมื่อเกิดข้อผิดพลาดในการส่งข้อมูล
                        console.error('Error inserting shelf:', error);
                    }
                });
              }else{
                alert('กรุณากรอก Sub Shelf');
              }
            }
        </script>
    
  </body>

</html>

<?php

    }
?>