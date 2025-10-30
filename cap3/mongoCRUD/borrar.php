<?php 
require_once 'conexion.php'; 

use MongoDB\BSON\ObjectID; // Necesitamos esta clase para buscar por _id

if (!isset($bd)) {
    throw new Exception("Error: El objeto de base de datos MongoDB no está disponible.");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // El 'id' que viene por GET es el _id (string de 24 caracteres)
    $id_usuario_str = $_GET['id'];
    
    $collection = $bd->selectCollection('usuarios');
    
    try {
        // El filtro DEBE convertir el string a un objeto ObjectID
        $filter = ['_id' => new ObjectID($id_usuario_str)];
        
        $result = $collection->deleteOne($filter);

        if ($result->getDeletedCount() === 1) {
            header("Location: main.php?status=deleted");
            exit;
        } elseif ($result->getDeletedCount() === 0) {
            header("Location: main.php?status=notfound");
            exit;
        } else {
            throw new Exception("Error inesperado en la operación de borrado.");
        }
        
    } catch (\MongoDB\Driver\Exception\InvalidArgumentException $e) {
        // Captura si el string 'id' no es un ObjectID válido
        throw new Exception("El ID proporcionado no es un formato válido de MongoDB ObjectId.");
    } catch (\Exception $e) {
        throw new Exception("Error al borrar el usuario con ID {$id_usuario_str}: " . $e->getMessage());
    }

} else {
    throw new Exception("ID de usuario no especificado para el borrado.");
}
?>