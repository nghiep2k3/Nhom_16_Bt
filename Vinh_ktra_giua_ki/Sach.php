<?php
include './config/connect.php';
$sql = "SELECT * FROM sach LIMIT 5";
$result = $conn->query($sql);
$sachRows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sachRows[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sách</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Danh sách Sách</h2>
    <table>
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
        </tr>
        <?php foreach ($sachRows as $sach): ?>
        <tr>
            <td><?php echo $sach['MaSach']; ?></td>
            <td><?php echo $sach['TenSach']; ?></td>
            <td><?php echo $sach['SoLuong']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
