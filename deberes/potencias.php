<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


$base = $_GET['base'];
$exponente = isset($_GET['exponente']) ? $_GET['exponente'] : 2;

function potencia($base, $exponente) {


    if ($exponente === null || $exponente === '') {
        return $base ** 2; 
    }else{
        return $base ** $exponente;
    }
    
}

echo potencia($base, $exponente);
    ?>
</body>
</html>