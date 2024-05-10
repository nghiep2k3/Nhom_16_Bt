<?php
include "./Database/connect.php";
echo $test;

// tạo database
$sql = "CREATE DATABASE nghiep1320";

// thực thi truy vấn đề tạo
if (mysqli_query($connect, $sql)) {
    echo "tạo thành công";
} else {
    echo "tạo không thành công";
    echo "test2";

}

?>