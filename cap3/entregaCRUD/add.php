<?php 
require_once 'conexion.php'; 

// 2. RECUPERA EL ID USANDO $_GET
// Es crucial verificar si la variable 'id' existe y no está vacía.

    // Opcional: Verifica que la conexión exista
    if (!isset($bd)) {
        throw new Exception("No hay conexión con la base de datos");}

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // 3. Obtener y sanitizar los datos del formulario
            // IMPORTANTE: Los nombres deben coincidir con los atributos 'name' del formulario.
            $nombre = $_POST['nombre'] ?? '';
            $clave = $_POST['clave'] ?? '';
            $rol = $_POST['rol'] ?? 0;
            $codigo = $_POST['codigo'] ?? null;


	   if ($exito == true) {
        // Redirigir solo si fue un éxito limpio y no lanzó una excepción
        header("Location: main.php");
        exit;
    } else {
        // Si PDO no lanzó una excepción (lo cual es raro con ERRMODE_EXCEPTION), 
        // pero execute devolvió FALSE, lanzamos una excepción genérica.
        throw new Exception("No se pudo insertar el usuario por un fallo desconocido en la base de datos.");
    }
}
?>