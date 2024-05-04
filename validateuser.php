<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "coffeehp";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại " . $conn->connect_error);
}
    session_start();
    if(isset($_POST['login'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM account WHERE user='$username' and password='$password'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1) {
            $_SESSION['mySession'] = $username;
            header("location:index.php");
        }
        else {
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }
?>