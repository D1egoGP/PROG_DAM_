<?php

class Empleado {
    private string $nombre;
    private float $sueldo;
    private string $puesto;

    public function __construct(string $nombre, float $sueldo, string $puesto) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->puesto = $puesto;
    }

    public function setSueldo(float $nuevoSueldo): void {
        $this->sueldo = $nuevoSueldo;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPuesto(): string {
        return $this->puesto;
    }
}

class Manager extends Empleado {
    private string $departamento;

    public function __construct(string $nombre, float $sueldo, string $puesto, string $departamento) {
        parent::__construct($nombre, $sueldo, $puesto);
        $this->departamento = $departamento;
    }

    public function revisarEmpleado(Empleado $empleado): void {
        echo "Revisando empleado: {$empleado->getNombre()}, Puesto: {$empleado->getPuesto()}\n";
    }
}

// Prueba
$empleado = new Empleado("Sofía Martínez", 2500, "Desarrollador");
$manager = new Manager("Pedro Ramírez", 4000, "Gerente", "IT");
$manager->revisarEmpleado($empleado);
$empleado->setSueldo(2800);
echo "Nuevo sueldo: {$empleado->getSueldo()}\n";

?>