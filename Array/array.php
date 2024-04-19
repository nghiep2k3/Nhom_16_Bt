<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <?php
    $ten = array("Nghiệp", "Trúc", "Ngọc");

    foreach ($ten as $value) {
        echo "Name:  $value </br>";
    }
    $length = count($ten);

    for ($i = 0; $i <= 2; $i++) {
        # code...
        if (isset($i)) {
            echo $ten[$i];
        }
    }
    ?> -->

    <!-- json -->
    <?php
    $thongtin = array("id"=>"1", "name"=>"nghiep");
    echo $thongtin['id'];
    
    $ten = array("Nghiệp", "Trúc", "Ngọc");
    
    $ten[1] = "hằng";
    
    print_r($ten);
    ?>

</body>

</html>