<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'filtrarArray.php';
    $numeros = [1, 2, 3, 4, 5, 6];
    $limite = 5;

    
    try{
      $filtrados = filtrar($numeros, $limite);
        foreach ($filtrados as $numero) {
            echo "<p>$numero</p>";
        }
    }catch(Exception $e){
            echo "<p>Error: ".$e->getMessage()."</p>";
        }
    
    ?>
</body>
</html>