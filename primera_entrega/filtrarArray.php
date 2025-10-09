<?php
function filtrar($numeros, $limite) {
   // Validar que $numeros sea un array y $limite un número//
    if (!is_array($numeros) || !is_numeric($limite)) {
        throw new Exception("Parámetros inválidos: se espera un array y un número.");
    }

    $resultado = [];

    foreach ($numeros as $numero) {
        if ($numero < $limite) {
            $resultado[] = $numero;  // Agrega al resultado si es menor//
        }
    }

    //devolvemos el nuevo array//
    return $resultado;
}
?>