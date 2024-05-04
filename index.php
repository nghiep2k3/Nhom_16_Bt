<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Document</title>
</head>
<body>
    <div class="form_box">
        <p>Hello</p>
        <form action="index.php" method="post">
            <input type="submit" name="logout" value="Đăng xuất">
        </form>
        <?php
            include "logout.php";
        ?>
    </div>
</body>
</html>