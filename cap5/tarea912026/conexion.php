<?php 
//archivo de conexión a la base de datos
$cadena_conexion = 'mysql:dbname=doctrine;host=127.0.0.1;port=3307';
$usuario = 'root';
$clave = '';

try {
    $pdo = new PDO($cadena_conexion, $usuario, $clave);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>