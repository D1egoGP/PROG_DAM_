<?php
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge datos del formulario
    $planBase = $_POST['plan_base'];
    $paquetes = isset($_POST['paquetes']) ? $_POST['paquetes'] : [];
    $duracion = $_POST['duracion'];

    // Calcula el costo total
    $costoTotal = calcularCosto($planBase, $paquetes, $duracion);

    // Devuelve el costo calculado en formato JSON
    echo json_encode([
        'costo_total' => $costoTotal
    ]);
} else {
    echo "Método no permitido.";
}
?>
