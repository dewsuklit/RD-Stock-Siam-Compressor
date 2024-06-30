<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM tbl_report_details WHERE product_id LIKE '%{$input}%' OR product_name LIKE '%{$input}%' OR subshelf_name LIKE '%{$input}%' OR user_id_in LIKE '%{$input}%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {?>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
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
                    
                    while($row = mysqli_fetch_assoc($result)){
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
        <?php
    }else{
        echo '<div style="text-align: center; font-size:  2rem;"><h6>No data</h6></div>';
    }
}

?>

