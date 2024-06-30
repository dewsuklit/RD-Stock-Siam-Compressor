<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM tbl_transactions WHERE product_id LIKE '%{$input}%' OR product_name LIKE '%{$input}%' OR subshelf_name LIKE '%{$input}%' OR user_id_out LIKE '%{$input}%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {?>
        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
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
        <?php
    }else{
        echo '<div style="text-align: center; font-size:  2rem;"><h6>No data</h6></div>';
    }
}

?>

