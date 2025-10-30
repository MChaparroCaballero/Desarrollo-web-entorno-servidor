<?php 
require_once 'conexion.php'; 

use MongoDB\BSON\ObjectID; // Necesitamos esta clase para trabajar con el _id

if (!isset($bd)) {
    throw new Exception("Error: El objeto de base de datos MongoDB no está disponible.");
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // 1. El ID que viene por GET es el _id (string de 24 caracteres)
    $id_usuario_str = $_GET['id'];
    
    $collection = $bd->selectCollection('usuarios');

    try {
        // 2. FILTRO: Buscar por el _id, convirtiendo el string a un objeto ObjectID
        $filter = ['_id' => new ObjectID($id_usuario_str)];
        
        // 3. ACTUALIZACIÓN: Se establece el nuevo valor para el campo 'saldo'
        // NOTA: Aquí deberías obtener el valor de un formulario POST. 
        // Para que funcione con un enlace GET simple, lo fijaremos a 50.00
        $nuevo_saldo = 50.00; 

        $update = ['$set' => ['saldo' => $nuevo_saldo]]; 
        
        $result = $collection->updateOne($filter, $update);

        // 4. Comprobación del resultado
        if ($result->getMatchedCount() > 0) {
            header("Location: main.php?status=updated");
            exit;
        } else {
            // El usuario no fue encontrado para actualizar
            throw new Exception("Error al actualizar: No se encontró el usuario con ID {$id_usuario_str}.");
        }
        
    } catch (\MongoDB\Driver\Exception\InvalidArgumentException $e) {
        // Captura si el ID no es un string de 24 caracteres válido para ObjectID
        throw new Exception("El ID proporcionado no es un formato válido de MongoDB ObjectId.");
    } catch (\Exception $e) {
        throw new Exception("Error al actualizar el usuario con ID {$id_usuario_str} en MongoDB: " . $e->getMessage());
    }

} else {
    throw new Exception("ID de usuario no especificado para la actualización.");
}