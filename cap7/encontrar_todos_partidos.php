<?php
// encontrar_todos_partidos.php 
require_once "./bootstrap.php";
require_once "./src/Partido.php"; // Importante cargar la clase
require_once "./src/Equipo.php";  // Importante cargar la clase
require_once "./src/PartidoRepository.php";

// Indicamos que la respuesta será JSON
header('Content-Type: application/json; charset=utf-8');

//Obtenemos el repositorio
$partidoRepo = $entityManager->getRepository('Partido');

//Usamos el metodo personalizado para listarlo con todos los datos 
$partidos = $partidoRepo->findAllPartidosCompletos();

$resultado = [];

foreach ($partidos as $partido) {
    
    // Formateamos la fecha (importante porque es un objeto DateTime)
    // Si la fecha es null, ponemos un string vacio
    $fechaStr = $partido->getFecha() ? $partido->getFecha()->format('Y-m-d') : null;

    $resultado[] = [
        "id" => $partido->getId(),
        "fecha" => $fechaStr,
        "local" => $partido->getLocal()->getNombre(),         // Accedemos al objeto Local
        "visitante" => $partido->getVisitante()->getNombre(), // Accedemos al objeto Visitante
        "goles_local" => $partido->getGolesLocal(),
        "goles_visitante" => $partido->getGolesVisitante()
    ];
}

echo json_encode($resultado);