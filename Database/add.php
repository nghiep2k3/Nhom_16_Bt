<?php
include "./connect.php";

$id = "";
$taikhoan = "admin";
$matkhau = "123456";
$level = 1;

$sql = "INSERT INTO thanhvien (id, taikhoan, matkhau, level)
VALUES ('$id', '$taikhoan', '$matkhau', '$level')";

mysqli_query($connect, $sql);

echo "ok";

?>