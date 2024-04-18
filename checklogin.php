<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];

        if ($password == "12345" && $user == "admin") {
            echo "<h1>Xin chào $user</h1>";
        } else {
            echo "<p>Vui lòng nhập lại</p>";
        }
    } else {
        echo "<p>Xin chào</p>";
    }
    ?>
    <p>Hello</p>
    <form action="checklogin.php" method="POST">
        User name: <input type="text" name="user" />
        Password: <input type="password" name="password" />
        <input type="submit" name="submit">
    </form>
</body>

</html>