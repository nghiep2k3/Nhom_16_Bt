<?php
include "./connect.php";

// Tạo bảng nếu chưa tồn tại
$sql = "CREATE TABLE IF NOT EXISTS thanhvien (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    taikhoan VARCHAR(30) NOT NULL,
    matkhau VARCHAR(30) NOT NULL,
    level INT(6) NOT NULL
)";

// Thực thi truy vấn
if ($connect->query($sql) === TRUE) {
    echo "Tạo bảng thành công";
} else {
    echo "Lỗi khi tạo bảng: " . $connect->error;
}

// Đóng kết nối
$connect->close();
?>