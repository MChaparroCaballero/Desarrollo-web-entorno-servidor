<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
     $palabra = $_GET['palabra'];
     function esPalindromo($palabra){

        if (!is_string($palabra)) {
       throw new Exception("Error: se debe pasar una cadena");} 

        if ($palabra === strrev($palabra)) {
        echo "Es un palíndromo.";
    } else {
        echo "No es un palíndromo.";
    }
}
    try {
        esPalindromo($palabra);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    ?>
</body>
</html>