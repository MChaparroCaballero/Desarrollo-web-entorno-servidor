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

        ////ejercicio 1//

      function ecuaciones1($a,$b,$c){
        $discriminante = ($b**2) - (4*$a*$c);
        if($discriminante > 0){
            $x1 = (-$b - sqrt($discriminante)) / (2*$a);
            $x2 = (-$b + sqrt($discriminante)) / (2*$a);
            return "Las soluciones son x1 = $x1 y x2 = $x2";
        }elseif($discriminante == 0){
            $x = -$b / (2*$a);
            return "La solución única es x = $x";
        }else{
            return "No hay soluciones reales.";
        }
      }

      //echo ecuaciones1($a,$b,$c);



      //ejercicio 2//
      function ecuaciones($a,$b,$c){

        $soluciones = [];

        $discriminante = ($b**2) - (4*$a*$c);
        if($discriminante > 0){
            $x1 = (-$b - sqrt($discriminante)) / (2*$a);
            $x2 = (-$b + sqrt($discriminante)) / (2*$a);
            $soluciones[] = $x1;
            $soluciones[] = $x2;

            return $soluciones;
        }elseif($discriminante == 0){
            $x = -$b / (2*$a);
            $soluciones[] = $x;
            return $soluciones;
        }else{
            return false;
        }
      }
      
      $solucionesFinales = ecuaciones($a, $b, $c);
      if ($solucionesFinales === false) {
    echo "FALSE";
} else {
    print_r($solucionesFinales);
}
    
      
      
      ?>
</body>
</html>