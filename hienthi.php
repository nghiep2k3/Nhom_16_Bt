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
        $dbname = 'info';          // Thay đổi thành tên CSDL

        // Tạo kết nối đến CSDL
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối CSDL thất bại: " . $conn->connect_error);
        }

        // Truy vấn CSDL để lấy thông tin đăng ký môn học
        $sql = "SELECT SinhVien.MSSV, SinhVien.HoTen, MonHoc.MaMH, MonHoc.TenMH, DangKy.Ky
                FROM DangKy
                INNER JOIN SinhVien ON DangKy.MSSV = SinhVien.MSSV
                INNER JOIN MonHoc ON DangKy.MaMH = MonHoc.MaMH";
        $result = $conn->query($sql);

        // Hiển thị kết quả truy vấn
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["MSSV"] . "</td>
                        <td>" . $row["HoTen"] . "</td>
                        <td>" . $row["MaMH"] . "</td>
                        <td>" . $row["TenMH"] . "</td>
                        <td>" . $row["Ky"] . "</td>
                      </tr>";
            }
        } else {
            echo "Không có dữ liệu đăng ký môn học.";
        }

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

    <?php
    // Xử lý dữ liệu từ form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mssv = $_POST['mssv'];
        $hoten = $_POST['hoten'];
        $mamh = $_POST['mamh'];
        $tenmh = $_POST['tenmh'];
        $ky = $_POST['ky'];

        // Kết nối CSDL
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối CSDL thất bại: " . $conn->connect_error);
        }

        // Thêm sinh viên vào bảng SinhVien
        $sqlInsertSinhVien = "INSERT INTO SinhVien (MSSV, HoTen) VALUES ('$mssv', '$hoten')";
        if ($conn->query($sqlInsertSinhVien) === TRUE) {
            echo "Thêm sinh viên thành công.<br>";
        } else {
            echo "Lỗi khi thêm sinh viên: " . $conn->error;
        }

        // Thêm môn học vào bảng MonHoc
        $sqlInsertMonHoc = "INSERT INTO MonHoc (MaMH, TenMH) VALUES ('$mamh', '$tenmh')";
        if ($conn->query($sqlInsertMonHoc) === TRUE) {
            echo "Thêm môn học thành công.<br>";
        } else {
            echo "Lỗi khi thêm môn học: " . $conn->error;
        }

        // Đăng ký môn học cho sinh viên trong bảng DangKy
        $sqlInsertDangKy = "INSERT INTO DangKy (MSSV, MaMH, Ky) VALUES ('$mssv', '$mamh', '$ky')";
        if ($conn->query($sqlInsertDangKy) === TRUE) {
            echo "Đăng ký môn học thành công.<br>";
        } else {
            echo "Lỗi khi đăng ký môn học: " . $conn->error;
        }

        // Đóng kết nối CSDL
        $conn->close();
    }
    ?>
</body>

</html>