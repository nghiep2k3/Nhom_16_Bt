<?php
    $servername = "localhost:4306";
    $username = "root";
    $password = " ";
    $dbname = "QUANLYSACH";
    $connect = new mysqli($servername, $username, $password, $dbname);
    if ($connect) {
        mysqli_query($connect,"SETNAMES 'UTF8' ");
        echo"Thanh Cong";
    }
    else{
        echo"error";
    }
?>