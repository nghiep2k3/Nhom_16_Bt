<?php
require_once '../config/connect.php';
class UserModel
{
    public function getUserByUsername($username)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>