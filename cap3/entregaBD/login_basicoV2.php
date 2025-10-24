<?php

$cadena_conexion = 'mysql:dbname=empresa;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
   $preparada = $bd->prepare("select nombre, clave, rol from usuarios where
    nombre = ? AND clave = ?");
    $preparada->execute( array($_POST['nombre'], $_POST['clave']));
    $usuario_encontrado = false;
    foreach ($preparada as $usu) {
        $usuario_encontrado = true;
        if($usu['rol']===0){
            
        header("Location: pantalla2.php");
        exit;
        }else if ($usu['rol']===1){
            
        header("Location: pantalla1.php");
        exit;
        }else{
           
        header("Location: login_basicoFormularioV2.php?error=credenciales ERRONEAS");
        exit;
        }
    } 
    // 4. Si el bucle termina y la bandera es false, ¡no se encontró el usuario!
    if (!$usuario_encontrado) {
        header("Location: login_basicoFormularioV2.php?error=credenciales ERRONEAS");
        exit;
    }
    $bd->close();
}catch (PDOException $e) {
    $bd->close();
		header("Location: login_basicoFormularioV2.php?error=credenciales ERRONEAS");
        exit;
	}

