<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Título de tu Página</title>
</head>
<body>

<form>
    <form action="add.php" method="POST">
        
        <label for="codigo">Código:</label>
        <input type="number" id="codigo" name="codigo" required><br><br>
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="clave">Clave (Contraseña):</label>
        <input type="password" id="clave" name="clave" required><br><br>
        
        <label for="rol">Rol:</label>
         <input type="number" id="rol" name="rol" required><br><br>
        
        <input type="submit" value="Guardar Usuario">
</form>
    
</body>
</html>