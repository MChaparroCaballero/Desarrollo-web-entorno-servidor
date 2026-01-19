<?php
require_once 'connection.php';
header('Content-Type: application/json');
//funcion para cargar los restaurantes de la bd


        $correo = $_POST['gmail'];
        $clave = $_POST['password'];
       
    try {
        $bd = leer_config();
        $stmt = $bd->prepare("SELECT * FROM restaurantes where correo=? and clave = ?");
        $stmt->execute([$correo, $clave]);
        $restaurantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        if (count($restaurantes) > 0) {
        echo json_encode([
            "status" => "success", 
            "mensaje" =>"Bienvenido " . $restaurantes[0]['Correo']
        ]);
        } else {
            echo json_encode([
                "status" => "error", 
                "mensaje" => "El usuario o la contraseña son incorrectos"
            ]);
        }

    } catch (Exception $e) {
        echo json_encode(["error" => "Error al conectar con la base de datos: " . $e->getMessage()]);
    }
?>