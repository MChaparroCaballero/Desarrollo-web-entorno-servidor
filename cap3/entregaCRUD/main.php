<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Título de tu Página</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
include_once 'conexion.php';
    $sql = 'SELECT codigo, nombre, clave, rol FROM usuarios';


    echo '<a href="addFormulario.html">Añadir</a>';

    if (isset($bd)) {
        try{

        
    // 3. Ejecutas la consulta SQL
        $usuarios = $bd->query($sql);
        if($usuarios->rowCount()>0){
            echo "<h1>Lista de Usuarios</h1>";
            echo "<p>Número de usuarios: " . $usuarios->rowCount() . "</p>";
            echo "<table>";
            echo "<thead><tr><th>Codigo</th><th>Nombre</th><th>Clave</th><th>Rol</th></tr></thead>";
            echo "<tbody>";
            foreach ($usuarios as $usu) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($usu['codigo']) . "</td>";
            echo "<td>" . htmlspecialchars($usu['nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($usu['clave']) . "</td>";
            echo "<td>" . htmlspecialchars($usu['rol']) . "</td>"; // Añadido el rol
             echo "<td><a href=update.php?id=" . $usu['codigo'] . ">Modificar</a></td>" . "<td><a href=borrar.php?id=" . $usu['codigo'] . ">borrar</a></td>";
            echo "</tr>";
           }
            echo "</tbody>";
            echo "</table>";
        }else{
            echo "<p>No hay resultados</p>";
        }
        }catch(Exception $e){
        echo "<p style='color:red;'>".e->getMessage()."</p>";
        }

    
    }else{
        echo "<p style='color:red;'>No se pudo establecer la conexión a la base de datos.</p>";
    }

 ?>
    
</body>
</html>