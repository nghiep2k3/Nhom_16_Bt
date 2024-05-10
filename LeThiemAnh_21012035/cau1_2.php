CREATE DATABASE QUANLYSACH;
<?php
    include "connect.php";
    $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS QUANLYSACH";
    if ($conn->query($sqlCreateDatabase) === TRUE) {
        echo "Tạo cơ sở dữ liệu thành công<br>";
    } else {
        echo "Lỗi khi tạo cơ sở dữ liệu: " . $conn->error . "<br>";
    }
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
        ('Toán', 9),
        ('Văn', 9),
        ('Anh', 8),
        ('Sinh', 7),
        ('Hóa', 10)";
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
        ('Lta', '21012035'),
        ('nguyentn', 'abc12'),
        ('lethi', '123321'),
        ('phamhuy', 'pass1'),
        ('doquang', 'qwer')";
    if ($conn->query($sqlInsertUser) === TRUE) {
        echo "Chèn dữ liệu vào bảng User thành công<br>";
    } else {
        echo "Lỗi khi chèn dữ liệu vào bảng User: " . $conn->error . "<br>";
    }
    $conn->close();
?>