<?php
$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1;port=3307';
$usuario = 'root';
$clave = '';

    $bd = new PDO($cadena_conexion, $usuario, $clave);
    if(!$bd){
        throw new Exception("No se pudo conectar a la base de datos");
    }

?>