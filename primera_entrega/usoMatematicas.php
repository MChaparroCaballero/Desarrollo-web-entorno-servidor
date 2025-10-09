<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include 'matematicas.php';
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];

        try{
            $resultado=ecuaciones($a,$b,$c);
            foreach ($resultado as $sol) {
            echo "<p>$sol</p>";
            }
        }catch(Exception $e){
            echo "<p>Error: ".$e->getMessage()."</p>";
        }
     ?>
</body>
</html>