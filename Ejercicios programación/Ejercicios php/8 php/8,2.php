<?php

class Tarea {
    private $nombre;
    private $descripcion;
    private $fechaLimite;
    private $estado;

    public function __construct($nombre, $descripcion, $fechaLimite, $estado = "pendiente") {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaLimite = $fechaLimite;
        $this->estado = $estado;
    }

    public function marcarComoCompletada() {
        $this->estado = "completada";
        echo "La tarea '{$this->nombre}' ha sido marcada como completada.\n";
    }

    public function editarDescripcion($nuevaDescripcion) {
        $this->descripcion = $nuevaDescripcion;
        echo "La descripción de la tarea '{$this->nombre}' ha sido actualizada.\n";
    }

    public function mostrarTarea() {
        echo "Nombre: {$this->nombre}\n";
        echo "Descripción: {$this->descripcion}\n";
        echo "Fecha límite: {$this->fechaLimite}\n";
        echo "Estado: {$this->estado}\n";
    }
}

// Crear una lista de tareas
$tareas = [
    new Tarea("Comprar víveres", "Comprar leche, pan y huevos", "2025-01-25"),
    new Tarea("Estudiar PHP", "Revisar clases y objetos", "2025-01-26"),
    new Tarea("Hacer ejercicio", "Realizar 30 minutos de cardio", "2025-01-27")
];

// Operacion con tareas
$tareas[0]->marcarComoCompletada();
$tareas[1]->editarDescripcion("Revisar clases, objetos y excepciones");

// Mostrar todas las tareas
foreach ($tareas as $tarea) {
    $tarea->mostrarTarea();
    echo "--------------------\n";
}

?>
