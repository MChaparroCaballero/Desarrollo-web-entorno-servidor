<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesar_subida.php" method="POST"
    enctype = "multipart/form-data">
    <label for="Nombre">Nombre:</label>
    <input type="text" name= "Nombre"><br><br>
    <label for="Edad">Edad:</label>
    <input type="number" name= "Edad"><br><br>
    Escoja un fichero
    <label for="fichero">Foto:</label>
    <input type="file" name= "imagen" accept="image/*" required><br><br>
    <input type="submit" value="Subir fichero">
    </form>
</body>
</html>