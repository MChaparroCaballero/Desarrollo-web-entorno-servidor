<?php
require_once 'conexion.php';
//arvchivo con las funciones para obtener los datos de equipos y jugadores de la bd

function obtenerTodosLosEquipos() {
    global $pdo;
    $stmt = $pdo->query('SELECT id, nombre, fundacion, socios, ciudad FROM equipo');
    return $stmt->fetchAll();
}

function obtenerJugadoresPorEquipo($idEquipo) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT Nombre, Apellidos, Edad FROM jugador WHERE Equipo = ?');
    $stmt->execute(array($idEquipo));
    return $stmt->fetchAll();
}