<?php
include("../php/config.php");
if(isset($_POST['subshelf_name'])){
    $subshelf_name = $_POST['subshelf_name'];
    $query = "SELECT * FROM tbl_report_details  WHERE subshelf_name LIKE '%{$subshelf_name}%'"; 
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {
?>
        
                
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Date In</td>
                    <td>Subshelf</td>
                    <td>Product ID</td>
                    <td>Product name</td>
                    <td>Quantity In</td>
                    <td>Balance</td>
                    <td>Unit</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                <?php
                    
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['date_in']; ?></td>
                    <td><?php echo $row['subshelf_name']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    <td><?php echo $row['unit']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <?php
    }else{
        echo '<div style="text-align: center; font-size:  2rem;"><h6>No data</h6></div>';
    }
}