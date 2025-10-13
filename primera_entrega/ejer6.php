<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    function comprobarInicializada($prueba){
        if(isset($prueba)){
            echo "<p>Esta inicializada y no es null majo</p>";
        }else{
            throw new Exception("Error: No esta inicializada o la falta valor");
        }
    }

    $variableNull;

    try{
        comprobarInicializada($variableNull);
    }catch(Exception $e){
        echo "<p>".$e->getMessage()."</p>";
    }
    /**-----------------------------------------**/
    function comprobarEsNull($prueba){
        if( is_null($prueba)){
            echo "<p>Esta es null</p>";
        }
    }
    
    try{
        comprobarEsNull($variableNull);
    }catch(Exception $e){
        echo "<p>".$e->getMessage()."</p>";
    }
    /**-----------------------------------------**/
     function esNumero($prueba){
        if( is_int($prueba)){
            echo "<p>Esta variable es numerica</p>";
        }else{
            throw new Exception("Error: No es numero");
        }
    }
    
    $numero=1;

    try{
        esNumero($numero);
    }catch(Exception $e){
        echo "<p>".$e->getMessage()."</p>";
    }
    /**-----------------------------------------**/

    $palabra="patata";
    function longitudCadena($palabra){
         echo "<p>La longitud ".$palabra." es ".strlen($palabra)."</p>";
    }

    longitudCadena($palabra);

    /**-----------------------------------------**/
    $palabra1="hola";
    $palabra2="adios";
    function compararCadenas($palabra1,$palabra2){
        if(strcmp($palabra1, $palabra2)==0){
            echo "<p>Son iguales</p>";
        }else{
             echo "<p>no son iguales</p>";
        }
         
    }
    compararCadenas($palabra1,$palabra2);




    ?>
</body>
</html>