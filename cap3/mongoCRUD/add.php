<?php 
require_once 'conexion.php'; 

if (!isset($bd)) {
    throw new Exception("Error: El objeto de base de datos MongoDB no está disponible.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener y convertir datos a tipos correctos (saldo a entero/float)
    $nombre = $_POST['nombre'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $saldo = (float)($_POST['saldo'] ?? 0.0); // Usamos float o int
    
    // Validar campo único (nombre)
    if (empty($nombre)) {
        throw new Exception("El nombre no puede estar vacío.");
    }

    $collection = $bd->selectCollection('usuarios');

    $documento = [
        'nombre' => $nombre, 
        'clave' => $clave, 
        'saldo' => $saldo // Nuevo campo
    ];

    try {
        $result = $collection->insertOne($documento);

        if ($result->getInsertedCount() === 1) {
            // Éxito: Redirige
            header("Location: main.php");
            exit;
        } else {
            throw new Exception("La inserción falló sin lanzar una excepción de base de datos.");
        }
        
    } catch (\MongoDB\Driver\Exception\BulkWriteException $e) {
        // Captura el error específico de duplicidad de clave (código 11000)
        if ($e->getCode() === 11000) {
            // Lanzamos una excepción con código 1 para que main.php la reconozca como duplicado
            throw new Exception("Error de duplicidad: El nombre '{$nombre}' ya existe.", 1); 
        } else {
            throw new Exception("Error de escritura en MongoDB: " . $e->getMessage());
        }
    } catch (\Exception $e) {
        throw new Exception("Error general durante la inserción: " . $e->getMessage());
    }
}
?>