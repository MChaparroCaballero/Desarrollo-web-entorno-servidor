<?php 
require_once 'conexion.php'; 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // Almacena el ID. Es buena práctica sanitizarlo (aunque PDO lo hará después)
    $id_usuario = (int)$_GET['id'];
    
    // Opcional: Verifica que la conexión exista
    if (isset($bd)) {
        $sql_delete = "DELETE FROM usuarios WHERE codigo = ?";
        //$del = "delete from usuarios where codigo=".$id_usuario;
        $stmt = $bd->prepare($sql_delete);
        $exito = $stmt->execute([$id_usuario]);
	//$resul = $bd->query($del);	
	//comprobar errores
    if ($exito==true) {
        header("Location: main.php?status=deleted");
         $bd.close();
    }else{
        throw new Exception ("No se pudo borrar");
    }
}else{
    throw new Exception("No hay conexión con la base de datos");
}}
?>