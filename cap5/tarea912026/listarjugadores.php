<?php
//archivo que mete en json los datos de equipos o jugadores según se le pase o no el id_equipo
header('Content-Type: application/json; charset=utf-8');
require_once 'bd.php';

if (!empty($_GET['id_equipo'])) {
    // Si hay ID, llamamos a la función de jugadores
    $datos = obtenerJugadoresPorEquipo($_GET['id_equipo']);
} else {
    // Si no hay ID, llamamos a la de equipos
    $datos = obtenerTodosLosEquipos();
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);
?>