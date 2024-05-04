<h1>Danh mục sinh viên đăng ký môn học</h1>
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
<table style="border: 1;">
    <tr>
        <th>MSSV</th>
        <th>Họ tên</th>
        <th>Kỳ</th>
        <th>Đăng ký</th>
    </tr>
    <?php
    $server = 'localhost:4306';
    $user = 'root';
    $pass = '';
    $database = 'pka_s';
    $conn = new mysqli($server, $user, $pass, $database);
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối CSDL thất bại: " . $connect->connect_error);
    }
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS dangky (
        MSSV INT(50),
        MaMH VARCHAR(100),
        Ky INT(50),
        PRIMARY KEY (MSSV, MaMH, Ky),
        FOREIGN KEY (MSSV) REFERENCES sinhvien(MSSV),
        FOREIGN KEY (MaMH) REFERENCES monhoc(MaMH)
    )";

    if ($conn->query($sqlCreateTable) === TRUE) {
        echo "Tạo bảng dangky thành công!";
    } else {
        echo "Lỗi tạo bảng dangky: " . $conn->error;
    }

    $sql = "SELECT sinhvien.MSSV, sinhvien.HoTen, monhoc.MaMH, monhoc.TenMH, dangky.Ky
            FROM dangky
            JOIN sinhvien ON dangky.MSSV = sinhvien.MSSV
            JOIN monhoc ON dangky.MaMH = monhoc.MaMH;";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["MSSV"] . "</td>";
                echo "<td>" . $row["HoTen"] . "</td>";
                echo "<td>" . $row["Ky"] . "</td>";
                echo "<td>" . $row["TenMH"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
    ?>
</table>