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
        <form action="login.php" method="post">
            <h2>Đăng Nhập</h2>
            <p>Tài Khoản</p>
            <input type="text" placeholder="Enter your user" name="email">
            <p>Mật khẩu</p>
            <input type="password" placeholder="Enter your password" name="password">
            <input type="submit" name="login" value="Đăng nhập">
            <a href="#">Quên mật khẩu?</a>
        </form>
    </div>
    <?php
        include "validateuser.php";
    ?>
</body>
</html>