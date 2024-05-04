<?php
$server = 'localhost:4306';
$user = 'root';
$pass = '';
$database = 'search';

// Create connection
$connect = new mysqli($server, $user, $pass, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

mysqli_set_charset($connect, "utf8");
?>