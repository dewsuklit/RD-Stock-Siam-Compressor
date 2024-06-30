<?php

$con = mysqli_connect("localhost", "root", "", "stock_db");

if(!$con){
    echo "Connection Failed" . mysqli_connect_error();
}

?>