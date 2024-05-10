<?php

// tạo kết nối vì chưa có database lên chưa cần khai báo, khi đọc đến dòng 22 thì tạo cơ sở dữ liệu 
$server = 'localhost:4306';
$user = 'root';
$pass = '';

$connect = new mysqli(
    $server,
    $user,
    $pass,
);

if ($connect) {
    mysqli_query($connect, "SET NAMES 'utf8' ");
    echo "success";
} else {
    echo "error";
}

// câu lệnh sql để tạo database
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS QUANLYSACH";
if ($connect->query($sqlCreateDatabase) === TRUE) {
    echo "Tạo cơ sở dữ liệu thành công<br>";
} else {
    echo "Lỗi khi tạo cơ sở dữ liệu: " . $connect->error . "<br>";
}

// kết nối đến database
include './connect.php';


$conn->select_db("QUANLYSACH");
$sqlCreateTableSach = "CREATE TABLE IF NOT EXISTS Sach (
        MaSach INT AUTO_INCREMENT PRIMARY KEY,
        TenSach VARCHAR(255) NOT NULL,
        SoLuong INT NOT NULL
    )";
if ($conn->query($sqlCreateTableSach) === TRUE) {
    echo "Tạo bảng Sach thành công<br>";
} else {
    echo "Lỗi khi tạo bảng Sach: " . $conn->error . "<br>";
}
$sqlInsertSach = "INSERT INTO Sach (TenSach, SoLuong) VALUES
        ('Toán', 10),
        ('Văn', 8),
        ('Lịch sử', 5),
        ('Khoa học', 12),
        ('Tiểu thuyết', 7)";
if ($conn->query($sqlInsertSach) === TRUE) {
    echo "Chèn dữ liệu vào bảng Sach thành công<br>";
} else {
    echo "Lỗi khi chèn dữ liệu vào bảng Sach: " . $conn->error . "<br>";
}
$sqlCreateTableUser = "CREATE TABLE IF NOT EXISTS User (
        MaUser INT AUTO_INCREMENT PRIMARY KEY,
        TenUser VARCHAR(255) NOT NULL,
        MatKhau VARCHAR(255) NOT NULL
    )";
if ($conn->query($sqlCreateTableUser) === TRUE) {
    echo "Tạo bảng User thành công<br>";
} else {
    echo "Lỗi khi tạo bảng User: " . $conn->error . "<br>";
}
$sqlInsertUser = "INSERT INTO User (TenUser, MatKhau) VALUES
        ('nghiep1320', '123456'),
        ('admin', 'admin'),
        ('test', 'test'),
        ('test2', 'pass123'),
        ('test3', 'abcxyz')";
if ($conn->query($sqlInsertUser) === TRUE) {
    echo "Chèn dữ liệu vào bảng User thành công<br>";
} else {
    echo "Lỗi khi chèn dữ liệu vào bảng User: " . $conn->error . "<br>";
}
$conn->close();
?>