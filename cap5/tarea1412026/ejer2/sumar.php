<?php 

function calcularSuma($a, $b) {
    return (float)$a + (float)$b;
}

$numero1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
$numero2 = isset($_POST['num2']) ? $_POST['num2'] : 0;

echo calcularSuma($numero1, $numero2);
?>