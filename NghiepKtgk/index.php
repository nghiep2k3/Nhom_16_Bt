<?php
$server = 'localhost:4306';
$user = 'root';
$pass = '';
$database = 'database';


$connect = new mysqli(
    $server,
    $user,
    $pass,
    $database
);

if ($connect) {
    mysqli_query($connect, "SET NAMES 'utf8' ");
    echo "success";
} else {
    echo "error";
}

?>