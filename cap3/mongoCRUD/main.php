<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios (MongoDB CRUD)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
try {
    include_once 'conexion.php'; 

    $collection = $bd->selectCollection('usuarios');
    $usuarios = $collection->find([]); 

    echo '<a href="addFormulario.html" class="btn btn-primary mb-3"> Añadir Nuevo Usuario</a>';
    if ($usuarios) {
        $count = 0;
        $tableRows = "";
        
        foreach ($usuarios as $usu) {
            $count++;
            
            // Campos de tu colección
            $id = $usu['_id'] ?? '';
            $nombre = $usu['nombre'] ?? '';
            $clave = $usu['clave'] ?? '';
            $saldo = $usu['saldo'] ?? '';

            $id_str = (string)$id;
                
                $tableRows .= "<tr>";
                $tableRows .= "<td>" . htmlspecialchars($id) . "</td>";
                $tableRows .= "<td>" . htmlspecialchars($nombre) . "</td>";
                $tableRows .= "<td>" . htmlspecialchars($clave) . "</td>";
                $tableRows .= "<td>" . htmlspecialchars($saldo) . "</td>";
                
                // Botones de Modificar y Borrar con clases de Bootstrap
                $tableRows .= "<td>";
                $tableRows .= "<a href=update.php?id=" . $id_str . " class='btn btn-sm btn-warning me-2'> Modificar</a>";
                $tableRows .= "<a href=borrar.php?id=" . $id_str . " class='btn btn-sm btn-danger'> Borrar</a>";
                $tableRows .= "</td>";
                $tableRows .= "</tr>";
        }

        if($count > 0){
                echo "<h1 class='mb-4'>Lista de Usuarios</h1>";
                echo "<p class='text-muted'>Número de usuarios: " . $count . "</p>";
                
                // Añado las clases de Bootstrap a la tabla
                echo "<table class='table table-striped table-bordered'>"; 
                echo "<thead class='table-dark'><tr><th>ID</th><th>Nombre</th><th>Clave</th><th>Saldo</th><th>Acciones</th></tr></thead>";
                echo "<tbody>";
                echo $tableRows;
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-info' role='alert'>No hay resultados. ¡Añade el primer usuario!</div>";
            }
        }
        
    }catch(Exception $e) {
    echo "<div class='alert alert-danger' role='alert'>";
        echo "<h4 class='alert-heading'> ERROR EN LA OPERACIÓN:</h4>";
        echo "<p>Mensaje: " . $e->getMessage() . "</p>";

        if ($e->getCode() === 1) { 
            echo "<hr>";
            echo "<p class='mb-0'>* Causa: Intento de registro con un nombre que ya existe (Violación de unicidad).</p>";
        }
        echo "</div>";
}
?>
    
</body>
</html>