<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $edad = $_POST['Edad'];

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        //nuevo nombre de la foto//
        $nuevoNombre = $nombre .".png";

        //nueva ruta//
        $rutaDestino = "subidos/" . $nuevoNombre;

        //intentamos mover y comprobamos errores, la primera parte es para 1 acceder a nuestra imagen, 2 sacarla de temporal y 3 meterla en la nueva ruta//
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino)) {
            echo "<h2>Datos recibidos</h2>";
            echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
            echo "Edad: " . htmlspecialchars($edad) . "<br>";
            echo "Imagen subida:<br><img src='$rutaDestino' alt='Imagen subida por $nombre' style='max-width:300px;'><br>";
        } else {
            echo "❌ Error al mover el archivo.";
        }
    } else {
        echo "❌ No se ha subido correctamente la imagen.";
    }
} else {
    echo "Acceso no válido.";
}
?>