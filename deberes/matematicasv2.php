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

        $soluciones = [];

        $discriminante = ($b**2) - (4*$a*$c);
        if($discriminante > 0){
            $x1 = (-$b + sqrt($discriminante)) / (2*$a);
            $x2 = (-$b - sqrt($discriminante)) / (2*$a);
            $soluciones[] = $x1;
            $soluciones[] = $x2;

            return $soluciones;
        }elseif($discriminante == 0){
            $x = -$b / (2*$a);
            $soluciones[] = $x;
            return $soluciones;
        }else{
            return "false";
        }
      }
      
      echo ecuaciones($a,$b,$c);
      ?>
</body>
</html>