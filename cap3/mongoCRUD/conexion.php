<?php
// Carga las clases del driver de MongoDB instaladas por Composer
require '../vendor/autoload.php'; 

use MongoDB\Client;
use MongoDB\Driver\Exception\Exception as MongoDBException;

try {
    // Conecta al servidor de MongoDB
    $cliente = new Client("mongodb://localhost:27017");
    
    // Selecciona la base de datos 'libroservidor' y la guarda en $bd
    $bd = $cliente->libroservidor; 

    // Opcional: Verifica la conexión haciendo una llamada simple para forzar una excepción si no hay conexión
    $cliente->listDatabases(); 

} catch (MongoDBException $e) {
    // Si la conexión falla, lanzamos una excepción que será capturada por main.php
    throw new Exception("Error de conexión a MongoDB: " . $e->getMessage());
}
?>