<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // include "./connectSearch.php";
    
    // $id = "";
// $name = "nguyen thanh nga";
// $time = "23-7-2028"; 
    
    // $sql = "INSERT INTO sanpham (id, name, time) VALUES ('$id', '$name', '$time')";
    
    // if ($connect->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $connect->error;
// }
    


    ?>
    <h1>Trang tìm kiếm</h1>
    <form action="search.php" method="POST">
        <input type="text" name="text">
        <button type="submit" name="btn">Tìm kiếm</button>
    </form>

    <?php
    include "./connectSearch.php";
    if (isset($_POST['btn'])) {
        $text = $_POST['text'];
    }
    $sql = "SELECT * FROM sanpham WHERE name LIKE '%$text%' ";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($result)) { ?>
    <h2><?php echo $row['id']; ?></h2>
    <h2><?php echo $row['name']; ?></h2>
    <h2><?php echo $row['time']; ?></h2>

    <?php } ?>
</body>

</html>