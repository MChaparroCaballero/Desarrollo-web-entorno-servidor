<?php 
     function esPalindromo($palabra){

        if ($palabra === '') {
        throw new Exception("Error: No se ha proporcionado ninguna palabra.");
        }


        if ( is_numeric($palabra)) {
       throw new Exception("Error: se debe pasar una cadena");} 

        if ($palabra === strrev($palabra)) {
        echo $palabra." Es un palíndromo.";
    } else {
        echo "No es un palíndromo.";
    }
}
   
    ?>