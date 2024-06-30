<?php
include("config.php");
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM pr_document WHERE doc_code LIKE '{$input}%'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {?>
        <table>
            
            <tbody>
                <?php
                while($row = mysqli_fetch_assoc($result)){
                    $partcode = $row['doc_input_partcode'];
                    $partname = $row['doc_input_partname'];
                    $rawmat = $row['doc_input_raw_mat'];
                    $qty = $row['doc_input_check_qty'];
                    
                    ?>
                    <label for="">Part Code</label>
                    <input type="text" value="<?php echo $partcode; ?>">

                    <label for="">Part Name</label>
                    <input type="text" value="<?php echo $partname; ?>">

                    <label for="">Raw Mat</label>
                    <input type="text" value="<?php echo $rawmat; ?>">
                    
                    <label for="">Quantity</label>
                    <input type="text" value="<?php echo $qty; ?>">
                    
                    <?php
                }

                ?>
            </tbody>
        </table>
        <?php
    }else{
        echo "<h6>No data</h6>";
    }
}

?>