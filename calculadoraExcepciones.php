<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'funcionesOperar.php';

            if(isset($_POST['enviar'])){
            $numero1 = $_POST['numero1'] ?? ''; 
            $numero2 = $_POST['numero2'] ?? '';
            $operacion = $_POST['operador'] ?? '';
            try{
                $resultado = calcular($numero1, $numero2, $operacion);
                echo "<p>El resultado es: " . $resultado."</p>";
        }catch(Exception $e){
            echo "<p>Error: ".$e->getMessage()."</p>";}
            }

    ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <label>Numero 1</label>
        <input type="text" name="numero1" required>
        <label>Numero 2</label>
        <input type="text" name="numero2" required>
        <Label>Operacion</Label>
            <select name="operador" required>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        <input type="submit" name="enviar" value="Enviar">
        </form>
</body>
</html>