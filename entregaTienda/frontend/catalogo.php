<?php
/*comprueba que el usuario*/
require '../backend/sesiones.php';
require_once '../backend/conectar.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>Lista de categorías</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> <!--para los iconos-->
    <link rel="stylesheet" href="./css/catalogo.css">
</head>
<body>
    <header>
    <a href="carrito.php" title="Ir al Carrito">
        <button type="button">
            <i class="fas fa-shopping-cart"></i>
        </button>
    </a>
</header>
    <main>
        <div id="catalogo">
             <img src="../imagenesTienda/apple.jpg" onclick="">
             <img src="../imagenesTienda/avocado.jpg" onclick="">
             <img src="../imagenesTienda/bananas.jpg" onclick="">
             <img src="../imagenesTienda/blueberries.jpg" onclick="">
             <img src="../imagenesTienda/bread.jpg" onclick="">
             <img src="../imagenesTienda/bulbs.jpg" onclick="">
             <img src="../imagenesTienda/carrots.jpg" onclick="">
             <img src="../imagenesTienda/fruits.jpg" onclick="">
             <img src="../imagenesTienda/oranges.jpg" onclick="">
             <img src="../imagenesTienda/watermelons.jpg" onclick="">  
        </div>
       
    </main>
</body>
</html>