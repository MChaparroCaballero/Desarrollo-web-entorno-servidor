<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'verificacionPalindromo.php';
     $palabra = $_GET['palabra'];
    
    try {
        esPalindromo($palabra);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    ?>
</body>
</html>