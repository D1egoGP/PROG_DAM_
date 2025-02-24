<?php

class Vehiculo {
    private string $marca;
    private string $modelo;

    public function __construct(string $marca, string $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function encender(): void {
        echo "El vehículo está encendido.\n";
    }
}

class Coche extends Vehiculo {
    private string $combustible;

    public function __construct(string $marca, string $modelo, string $combustible) {
        parent::__construct($marca, $modelo);
        $this->combustible = $combustible;
    }

    public function mostrarDetalles(): void {
        echo "Marca: {$this->marca}, Modelo: {$this->modelo}, Combustible: {$this->combustible}\n";
    }
}

$coche = new Coche("Toyota", "Corolla", "Gasolina");
$coche->encender();
$coche->mostrarDetalles();

?>