<?php 
session_start();
$usuario_correcto = "admin";
$contrasena_correcta = "12345";
if (isset($_POST['usuario']) && isset($_POST['contrasena'])&& 
    !empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
        $_SESSION['token'] = rand(1,1000000);
        $_SESSION['dinero'] = 300;
        $_SESSION['tiempo'] = time();
        header("Location: correcto.php");
    } else {
        header("Location: formulario.php?error=credenciales incorrectas");
    }
      
}else{
    header("Location: formulario.php?error=credenciales vacias");
}

?>