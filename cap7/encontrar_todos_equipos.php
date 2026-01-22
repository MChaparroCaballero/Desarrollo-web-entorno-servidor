<?php
require_once "./bootstrap.php";
require_once "./src/Equipo.php";

header('Content-Type: application/json; charset=utf-8');
$equipos = $entityManager->getRepository("Equipo")->findAll();
//importante cuando son varios objetos necesitas enviar un array, osea lees un array de respuestas y las almacenas en otro array
$resultado = [];
foreach ($equipos as $eq) {
    $resultado[] = [
        "Nombre" => $eq->getNombre()
    ];
}
echo json_encode($resultado);