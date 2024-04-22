<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký môn học</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }
    </style>
</head>

<body>
    <h2>Danh sách sinh viên đăng ký môn học</h2>
    <table>
        <tr>
            <th>MSSV</th>
            <th>Họ và tên</th>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Kỳ</th>
        </tr>
        <?php
        // Kết nối CSDL
        $servername = 'localhost:4306';  // Thay đổi tùy theo cấu hình máy chủ CSDL
        $username = "root";     // Thay đổi thành tên đăng nhập CSDL
        $password = "";     // Thay đổi thành mật khẩu CSDL
        $conn = new mysqli($servername, $username, $password);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối CSDL thất bại: " . $conn->connect_error);
        }

        // Tạo CSDL 'info' nếu chưa tồn tại
        $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS info";
        if ($conn->query($sqlCreateDB) === TRUE) {
            echo "Tạo CSDL thành công hoặc CSDL đã tồn tại.<br>";
        } else {
            die("Lỗi khi tạo CSDL: " . $conn->error);
        }

        // Sử dụng CSDL 'info'
        $conn->select_db("info");

        // Tạo bảng SinhVien
        $sqlCreateSinhVien = "CREATE TABLE IF NOT EXISTS SinhVien (
                MSSV INT PRIMARY KEY,
                HoTen VARCHAR(255) NOT NULL
            )";
        if ($conn->query($sqlCreateSinhVien) === TRUE) {
            echo "Tạo bảng SinhVien thành công hoặc bảng đã tồn tại.<br>";
        } else {
            die("Lỗi khi tạo bảng SinhVien: " . $conn->error);
        }

        // Tạo bảng MonHoc
        $sqlCreateMonHoc = "CREATE TABLE IF NOT EXISTS MonHoc (
                MaMH INT PRIMARY KEY,
                TenMH VARCHAR(255) NOT NULL
            )";
        if ($conn->query($sqlCreateMonHoc) === TRUE) {
            echo "Tạo bảng MonHoc thành công hoặc bảng đã tồn tại.<br>";
        } else {
            die("Lỗi khi tạo bảng MonHoc: " . $conn->error);
        }

        // Tạo bảng DangKy
        $sqlCreateDangKy = "CREATE TABLE IF NOT EXISTS DangKy (
                MSSV INT,
                MaMH INT,
                Ky VARCHAR(50),
                PRIMARY KEY (MSSV),
                FOREIGN KEY (MSSV) REFERENCES SinhVien(MSSV),
                FOREIGN KEY (MaMH) REFERENCES MonHoc(MaMH)
            )";
        if ($conn->query($sqlCreateDangKy) === TRUE) {
            echo "Tạo bảng DangKy thành công hoặc bảng đã tồn tại.<br>";
        } else {
            die("Lỗi khi tạo bảng DangKy: " . $conn->error);
        }

        // Thêm dữ liệu vào bảng SinhVien và MonHoc (ví dụ)
        $sqlInsertSinhVien = "INSERT INTO SinhVien (MSSV, HoTen) VALUES (1, 'Nguyễn Văn A')";
        $sqlInsertMonHoc = "INSERT INTO MonHoc (MaMH, TenMH) VALUES (101, 'Toán')";
        $sqlInsertDangKy = "INSERT INTO DangKy (MSSV, MaMH, Ky) VALUES (1, PKA01, 1)";
        

        // Đóng kết nối CSDL
        $conn->close();
        ?>
    </table>

    <h2>Thêm sinh viên đăng ký môn học mới</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="mssv">MSSV:</label>
        <input type="text" id="mssv" name="mssv" required><br><br>
        <label for="hoten">Họ và tên:</label>
        <input type="text" id="hoten" name="hoten" required><br><br>
        <label for="mamh">Mã môn học:</label>
        <input type="text" id="mamh" name="mamh" required><br><br>
        <label for="tenmh">Tên môn học:</label>
        <input type="text" id="tenmh" name="tenmh" required><br><br>
        <label for="ky">Kỳ:</label>
        <input type="text" id="ky" name="ky" required><br><br>
        <input type="submit" value="Thêm sinh viên đăng ký môn học">
    </form>
</body>

</html>