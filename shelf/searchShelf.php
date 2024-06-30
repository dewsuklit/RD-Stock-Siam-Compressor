<?php
include("../php/config.php");
if(isset($_POST['shelfId'])){
    $shelfId = $_POST['shelfId'];
    $query = "SELECT * FROM tbl_subshelf  WHERE shelf_id = '{$shelfId}%' ORDER BY subshelf_name ASC" ; 
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
?>
        
                
                <?php
                    
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    
                    <button class="shelfbtn" id="myTd" onclick="sendSubShelfName('<?php echo $row['subshelf_name'];; ?>')"><?php echo $row['subshelf_name']; ?></button>
                <?php
                    }
                ?>
                <div id="searchShelf"></div>
        <?php
    }else{
        echo '<div style="text-align: center; font-size:  2rem;"><h6>No data</h6></div>';
    }
}

?>
<script>
        function sendSubShelfName(subshelf_name) {
            $.ajax({
            type: "POST",
            url: "searchSubShelf.php", // เปลี่ยนเป็น URL ของไฟล์ที่จะทำการประมวลผล
            data: { subshelf_name: subshelf_name },
            success: function(data){
                $("#searchShelf").html(data);
            },
            error: function(xhr, status, error) {
                // ทำสิ่งที่คุณต้องการเมื่อเกิดข้อผิดพลาดในการส่งข้อมูล
                console.error('Error sending shelf name:', error);
            }
            });
        }
</script>
