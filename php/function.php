<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'stock_db');

class DB_con {
    private $dbcon; // Define the property here

    public function __construct() {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function signin($uname, $password) {
        $signinquery = mysqli_query($this->dbcon, "SELECT id, name FROM user WHERE username = '$uname' AND password = '$password'");
        return $signinquery;
    }

    public function invNoavailable($invno) {
        $checkInvNo = mysqli_query($this->dbcon, "SELECT request_no FROM tbl_report_details WHERE request_no = '$invno'");
        return $checkInvNo;
    }

    public function insertInv($invno, $partcode, $shelfname, $quantity, $unit, $user_id_in, $balance) {
        $inv = mysqli_query($this->dbcon, "INSERT INTO tbl_report_details(request_no, subshelf_name, doc_input_partcode, quantity, unit, user_id_in, balance)
        VALUE('$invno', '$shelfname', '$partcode', '$quantity', '$unit', '$user_id_in', '$balance')");
        return $inv;
    }

    public function qrInsert($reqno, $subshelf, $partcode, $quantity) {
        $qr = mysqli_query($this->dbcon, "INSERT INTO tbl_report_details(request_no, subshelf_name, doc_input_partcode, quantity, unit)
        VALUE('$reqno', '$subshelf', '$partcode', '$quantity', 'PC')");
        return $qr;
    }
    public function insertShelf($shelfname) {
        $shelf = mysqli_query($this->dbcon, "INSERT INTO tbl_shelf(subshelf_name)
        VALUE('$shelfname')");
        return $shelf;
    }
    public function updateDate() {
        $date = mysqli_query($this->dbcon, "UPDATE tbl_report_details SET now_date = NOW()");
        return $date;
    }
    public function calculateDaysInStock() {
        $calculation = mysqli_query($this->dbcon, "UPDATE tbl_report_details
        SET num_days_stock = DATEDIFF(CURDATE(), date_in)");
        return $calculation;
    }
    
}

?>
