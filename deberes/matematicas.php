<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      



        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];

      function ecuaciones($a,$b,$c){
        $discriminante = ($b**2) - (4*$a*$c);
        if($discriminante > 0){
            $x1 = (-$b + sqrt($discriminante)) / (2*$a);
            $x2 = (-$b - sqrt($discriminante)) / (2*$a);
            return "Las soluciones son x1 = $x1 y x2 = $x2";
        }elseif($discriminante == 0){
            $x = -$b / (2*$a);
            return "La solución única es x = $x";
        }else{
            return "No hay soluciones reales.";
        }
      }
      
      echo ecuaciones($a,$b,$c);
      ?>
</body>
</html>