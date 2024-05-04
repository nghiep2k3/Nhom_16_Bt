<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        cursor: pointer;
    }

    .hightlight {

        font-size: 25px;
        color: red;
    }
    </style>
</head>

<body>
    <h2>Upload File</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
    // Xử lý upload file
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $target_dir = "C:\\xampp\\htdocs\\php\\Upload\\Image\\"; // Thư mục lưu trữ file đã tải lên
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem tập tin đã tồn tại chưa
        if (file_exists($target_file)) {
            echo "Xin lỗi, tập tin đã tồn tại.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước tập tin
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Xin lỗi, tập tin quá lớn.";
            $uploadOk = 0;
        }

        // Cho phép chỉ định các loại tập tin được phép
        if ($fileType != "txt" && $fileType != "pdf" && $fileType != "docx" && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
            echo "Xin lỗi, chỉ được phép tải lên các tệp txt, pdf, docx, jpg, jpeg, png.";
            $uploadOk = 0;
        }

        // Kiểm tra nếu $uploadOk không bị lỗi
        if ($uploadOk == 0) {
            echo "Xin lỗi, tập tin của bạn không được tải lên.";
        } else {
            // Nếu mọi thứ đều ổn, cố gắng tải lên tệp
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                // Hiển thị thông tin chi tiết của tập tin đã tải lên
                echo "Tên tập tin: " . basename($_FILES["fileToUpload"]["name"]) . "<br>";
                echo "Loại: " . $_FILES["fileToUpload"]["type"] . "<br>";
                echo "Kích thước: " . ($_FILES["fileToUpload"]["size"] / 1024) . " KB<br>";
                echo "Đã tải lên thành công.";
            } else {
                echo "Có lỗi xảy ra khi tải lên tập tin của bạn.";
            }
        }
    }

    // Mã hóa mật khẩu
    function encryptPassword($password)
    {
        return sha1($password);
    }
    ?>

    <div style="font-size: 30px; font-weight: bold; margin: 0 10px">
        <i>Nhấp vào tiêu đề để sắp xếp</i>
    </div>
    <table id="fileTable">
        <tr>
            <th onclick="sortTable(0)">Tên tập tin</th>
            <th onclick="sortTable(1)">Loại</th>
            <th onclick="sortTable(2)">Ngày tải lên</th>
            <th onclick="sortTable(3)">Kích thước</th>
        </tr>
        <?php
        // Lặp qua các tập tin trong thư mục
        $files = glob($target_dir . "*");
        foreach ($files as $file) {
            // Lấy thông tin của tập tin
            $fileName = basename($file);
            $fileType = mime_content_type($file);
            $fileSize = filesize($file);
            $fileUploadDate = date("Y-m-d H:i:s", filemtime($file));
            // Hiển thị thông tin trong bảng
            echo "<tr>";
            echo "<td>" . encryptPassword($fileName) . " <span class='hightlight'>(ĐÃ MÃ HÓA SHA1) </span>" . "</td>";
            echo "<td>$fileType</td>";
            echo "<td>$fileUploadDate</td>";
            echo "<td>$fileSize</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
    function sortTable(colIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("fileTable");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[colIndex];
                y = rows[i + 1].getElementsByTagName("TD")[colIndex];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
    </script>
</body>

</html>