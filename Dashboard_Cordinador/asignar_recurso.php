<?php
include 'manejo_sesiones.php';

$data = json_decode(file_get_contents("php://input"), true);
$nombre_recurso = $data['nombre_recurso'];
$cant = $data['cant'];

if (asignar_recurso($nombre_recurso, $cant)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
