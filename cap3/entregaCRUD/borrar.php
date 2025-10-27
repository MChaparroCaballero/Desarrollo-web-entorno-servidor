<?php 
require_once 'conexion.php'; 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Almacena el ID. Es buena práctica sanitizarlo (aunque PDO lo hará después)
    $id_usuario = (int)$_GET['id'];
    
    // Opcional: Verifica que la conexión exista
    if (isset($bd)) {
        $del = "delete from usuarios where codigo=".$id_usuario;
	$resul = $bd->query($del);	
	//comprobar errores
	if($resul){
		header("Location:main.php");
        $bd.close();
	}else print_r( $bd -> errorinfo());	
    }
}
?>