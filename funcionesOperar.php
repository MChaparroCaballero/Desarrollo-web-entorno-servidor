<?php
function calcular($num1, $num2, $operador) {
  
 if (!is_numeric($num1) || !is_numeric($num2)) {
        throw new Exception("Los valores deben ser numéricos.");}
             switch ($operador) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) {
                throw new Exception("No se puede dividir por cero.");
            }
            return $num1 / $num2;
        default:
            return "Operador no válido.";
    }
 }

   
  
 ?>
