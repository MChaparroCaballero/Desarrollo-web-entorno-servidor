<?php 
require_once 'conexion.php'; 

// 2. RECUPERA EL ID USANDO $_GET
// Es crucial verificar si la variable 'id' existe y no está vacía.
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Almacena el ID. Es buena práctica sanitizarlo (aunque PDO lo hará después)
    $id_usuario = (int)$_GET['id'];
    
    // Opcional: Verifica que la conexión exista
    if (isset($bd)) {
        $upd = "update usuarios set rol =  2  where codigo=".$id_usuario;
	    $resul = $bd->query($upd);	
	//comprobar errores
	if($resul){
		header("Location:main.php");
        $bd.close();
	}else print_r( $bd -> errorinfo());	
    }
}
?>