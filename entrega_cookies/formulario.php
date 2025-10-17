<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
     ?>
    
    <h1>Iniciar Sesión</h1>
    <form action="comprobar.php" method="POST"> 
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        
        <input type="submit" value="Entrar">
    </form>

   <!-- Banner de cookies -->
    <!-- Inicialmente oculto con display:none -->
    <div id="bannerCookies" style="display:none; position: fixed; bottom:0; left:0; width:100%; background:#333; color:white; text-align:center; padding:15px;">
        Esta web utiliza cookies para mejorar tu experiencia.
        <!-- Botones para aceptar o rechazar cookies -->
        <button onclick="aceptarCookies()">Aceptar</button>
        <button onclick="rechazarCookies()">Rechazar</button>
    </div>

    <script>
    // Comprobamos si el usuario ya aceptó o rechazó cookies
    // Si no existe la cookie 'acepta_cookies' (true o false), mostramos el banner
    if (!document.cookie.includes("acepta_cookies=true") && !document.cookie.includes("acepta_cookies=false")) {
        document.getElementById("bannerCookies").style.display = "block";
    }

    // Función que se ejecuta al pulsar "Aceptar"
    function aceptarCookies() {
        // Creamos la cookie 'acepta_cookies' con valor true
        // path=/ significa que es válida en todo el sitio
        // max-age=60*60*24*365 = 1 año
        document.cookie = "acepta_cookies=true; path=/; max-age=" + 60*60*24*365;
        // Ocultamos el banner
        document.getElementById("bannerCookies").style.display = "none";
    }

    // Función que se ejecuta al pulsar "Rechazar"
    function rechazarCookies() {
        // Creamos la cookie 'acepta_cookies' con valor false
        document.cookie = "acepta_cookies=false; path=/; max-age=" + 60*60*24*365;
        // Ocultamos el banner
        document.getElementById("bannerCookies").style.display = "none";
    }
    </script>

</body>
</html>