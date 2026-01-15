<?php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['usuario'])) {
    // Si la sesión existe, devolvemos los datos del usuario
    echo json_encode([
        "logueado" => true,
        "email" => $_SESSION['usuario']['gmail'],
        "nombre" => $_SESSION['usuario']['nombre']
    ]);
} else {
    echo json_encode(["logueado" => false]);
}
exit;