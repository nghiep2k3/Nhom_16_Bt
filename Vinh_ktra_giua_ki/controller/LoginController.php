<?php
        include "../config/connect.php";
        session_start();
        if(isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE TenUser='$username' and MatKhau='$password'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1) {
                $_SESSION['mySession'] = $username;
                header("location: ../Sach.php");
            }
            else {
                echo "Sai tài khoản hoặc mật khẩu";
            }
        }
?>
