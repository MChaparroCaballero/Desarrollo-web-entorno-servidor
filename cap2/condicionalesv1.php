<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $uno=$_GET["valor"];
    switch ($uno) {
    case 1:
        echo "has elegido la opcion 1";
        break;
    case 2:
        echo "has elegido la opcion 2";
        break;
    case 3:
        echo "has elegido la opcion 3";
        break;
    default:
        echo "opcion no valida";
    
    }
    ?>
</body>
</html>