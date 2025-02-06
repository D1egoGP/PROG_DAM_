<?php

class Empleado {
    protected $nombre;
    protected $sueldo;
    protected $aniosExperiencia;

    public function __construct($nombre, $sueldo, $aniosExperiencia) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->aniosExperiencia = $aniosExperiencia;
    }

    public function calcularBonus() {
        $bonus = ($this->aniosExperiencia / 2) * 0.05 * $this->sueldo;
        return $bonus;
    }

    public function mostrarDetalles() {
        echo "Nombre: {$this->nombre}\n";
        echo "Sueldo: {$this->sueldo}\n";
        echo "Años de experiencia: {$this->aniosExperiencia}\n";
        echo "Bonus: {$this->calcularBonus()}\n";
    }
}

class Consultor extends Empleado {
    private $horasPorProyecto;

    public function __construct($nombre, $sueldo, $aniosExperiencia, $horasPorProyecto) {
        parent::__construct($nombre, $sueldo, $aniosExperiencia);
        $this->horasPorProyecto = $horasPorProyecto;
    }

    public function calcularBonus() {
        $bonusBase = parent::calcularBonus();
        $bonusExtra = 0;
        if ($this->horasPorProyecto > 100) {
            $bonusExtra = 0.10 * $this->sueldo;
        }
        return $bonusBase + $bonusExtra;
    }

    public function mostrarDetalles() {
        parent::mostrarDetalles();
        echo "Horas por proyecto: {$this->horasPorProyecto}\n";
    }
}

// Instancia del Empleado
$empleado = new Empleado("Ana Lopez", 50000, 6);
$empleado->mostrarDetalles();

echo "--------------------\n";

// Instancia del Consultor
$consultor = new Consultor("Carlos Ruiz", 70000, 4, 120);
$consultor->mostrarDetalles();

// Comparar bonificaciones
echo "--------------------\n";
echo "Comparación de bonificaciones:\n";
echo "Empleado: {$empleado->calcularBonus()}\n";
echo "Consultor: {$consultor->calcularBonus()}\n";

?>
