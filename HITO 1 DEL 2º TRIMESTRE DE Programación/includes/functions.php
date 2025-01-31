<?php
function calcularCosto($planBase, $paquetes, $duracion) {
    // Precios de los planes base
    $preciosBase = [
        'Básico' => 9.99,
        'Estándar' => 13.99,
        'Premium' => 17.99,
    ];

    // Precios de los paquetes adicionales
    $preciosPaquetes = [
        'Deporte' => 6.99,
        'Cine' => 7.99,
        'Infantil' => 4.99,
    ];

    // Precio base
    $costo = $preciosBase[$planBase];

    // Añadir costos de paquetes adicionales
    foreach ($paquetes as $paquete) {
        $costo += $preciosPaquetes[$paquete];
    }

    // Si la duración es anual, se multiplica por 12
    if ($duracion === 'Anual') {
        $costo *= 12;
    }

    return $costo;
}
?>
