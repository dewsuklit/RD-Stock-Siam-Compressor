<?php 
    include_once('../php/function.php');
    session_start();
    $invNocheck = new DB_con();

    $invNo = $_POST['invNo'];
    
    
    $sql = $invNocheck->invNoavailable($invNo);

    $num = mysqli_num_rows($sql);

    if ($invNo != "") {
        if ($num > 0) {
            echo "<span style='color: red;'>$invNo. already associated with another Invoice No.</span>";
            echo "<script>$('#submit').prop('disabled', true);</script>";
        }else{
            echo "<span style='color: green;'>Invoice No. available for Insert.</span>";
            echo "<script>$('#submit').prop('disabled', false);</script>";
            $_SESSION['invno'] = $invNo;
        }
    }elseif($invNo == ""){
        echo "<span style='color: red;'>Please insert invoice number before upload file!</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
?>