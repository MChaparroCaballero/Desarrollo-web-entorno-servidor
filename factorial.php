<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

$factorial = $_GET['number'];
for($i=$factorial-1; $i>0; $i--){
    $factorial = $factorial*$i;
    
}
echo " el numero factorial es $factorial";
     ?>
</body>
</html>