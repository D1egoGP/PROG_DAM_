<?php


function generarNombreAleatorio($nombres, $apellidos) {
    $indiceNombre = rand(0, count($nombres) - 1);
    $indiceApellido = rand(0, count($apellidos) - 1);
    return $nombres[$indiceNombre] . " " . $apellidos[$indiceApellido];
}
$nombres = ["Juan", "Ana", "Carlos", "Laura", "Pedro"];
$apellidos = ["González", "Pérez", "Martínez", "López", "Ramírez"];
echo "Nombre generado: " . generarNombreAleatorio($nombres, $apellidos) . "\n";


?>
