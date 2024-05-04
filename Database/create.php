<?php
include "./connect.php";
echo $test;

// tạo database
$sql = "CREATE DATABASE thanhvien";

// thực thi truy vấn đề tạo
if (mysqli_query($connect, $sql)) {
    echo "tạo thành công";
} else {
    echo "tạo không thành công";
}

?>