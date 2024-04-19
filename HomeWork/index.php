<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    b {
        color: red;
        font-size: 20px;
    }

    i {
        color: green;
        font-size: 20px;

    }
    </style>
</head>

<body>
    <?php
        for ($i=0; $i < 200; $i++) { 
            # code...
            if($i % 2 == 0){
                echo "<div><b>$i</b></div>";
            }else{
                echo "<div><i>$i</i></div>";
                
            }
        }
    ?>
</body>

</html>