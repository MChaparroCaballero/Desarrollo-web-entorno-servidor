<?php
require_once 'conexion.php';
header('Content-Type: application/json');
//funcion para cargar los productos de la bd

    try {
        $bd = leer_config();
        $stmt = $bd->prepare("SELECT * FROM productos");
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo json_encode(["error" => "No hay productos"]);
    }
  echo json_encode($productos);
?>
 