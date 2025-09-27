<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      
include 'matematicas.php';

// Caso 1: discriminante > 0
$resultado = ecuaciones(1, -3, 2);
if ($resultado === false) {
    echo "No hay soluciones reales<br>";
} else {
    echo "Soluciones: " . implode(", ", $resultado) . "<br>";
}

// Caso 2: discriminante = 0
$resultado = ecuaciones(1, -2, 1);
if ($resultado === false) {
    echo "No hay soluciones reales<br>";
} else {
    echo "Soluciones: " . implode(", ", $resultado) . "<br>";
}

// Caso 3: discriminante < 0
$resultado = ecuaciones(1, 1, 1);
if ($resultado === false) {
    echo "No hay soluciones reales<br>";
} else {
    echo "Soluciones: " . implode(", ", $resultado) . "<br>";
}
?>

</body>
</html>