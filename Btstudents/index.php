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
            <th>Kỳ</th>
            <th>Đăng ký</th>
        </tr>

        <?php
        $server = 'localhost:4306';
        $user = 'root';
        $pass = '';
        $database = 'pka_s';

        // Tạo kết nối đến CSDL
        $connect = new mysqli($server, $user, $pass, $database);

        // Kiểm tra kết nối
        if ($connect->connect_error) {
            die("Kết nối CSDL thất bại: " . $connect->connect_error);
        }

        // Truy vấn dữ liệu từ ba bảng sinhvien, monhoc, dangky bằng INNER JOIN
        // $sql = "SELECT sv.MSSV, sv.HoTen, mh.MaMH, mh.TenMH, dk.Ky
        // FROM sinhvien AS sv
        // INNER JOIN dangky AS dk ON sv.MSSV = dk.MSSV
        // INNER JOIN monhoc AS mh ON dk.MaMH = mh.MaMH";

        $sql = "SELECT sv.MSSV, sv.HoTen
        FROM sinhvien AS sv";

        $result = $connect->query($sql);
        

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
        $connect->close();
        ?>
    </table>
</body>

</html>