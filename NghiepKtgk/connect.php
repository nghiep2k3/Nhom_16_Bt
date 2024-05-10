<?php
$server = 'localhost:4306';
$user = 'root';
$pass = '';
$database = 'QUANLYSACH';


$conn = new mysqli(
    $server,
    $user,
    $pass,
    $database
);

if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8' ");
    echo "Kết nối thành công";
} else {
    echo "error";
}

?>