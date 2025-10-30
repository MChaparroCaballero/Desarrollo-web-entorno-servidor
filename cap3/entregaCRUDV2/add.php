<?php 
require_once 'conexion.php'; 

// 2. RECUPERA EL ID USANDO $_GET
// Es crucial verificar si la variable 'id' existe y no está vacía.

    


    // Opcional: Verifica que la conexión exista
    if (isset($bd)) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            // 3. Obtener y sanitizar los datos del formulario
            // IMPORTANTE: Los nombres deben coincidir con los atributos 'name' del formulario.
            $nombre = $_POST['nombre'] ?? '';
            $clave = $_POST['clave'] ?? '';
            $rol = $_POST['rol'] ?? 0;
            $codigo = $_POST['codigo'] ?? null;


	    $stmt = $bd->prepare('INSERT INTO usuarios (codigo, nombre, clave, rol) VALUES (?, ?, ?, ?)');
        $stmt->execute([$codigo, $nombre, $clave, $rol]);
        header("Location:main.php");
        exit;
        }

    }
?>