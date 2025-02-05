<?php
class Vehiculo{
    public $marca;
    public function encender(){

    }
}
class Coche extends Vehiculo{
    public $modelo;
    public function mostrarInfo() {
        echo "Marca: ". $this->marca;
        echo "Modelo: ". $this->modelo;
    }
}
$miCoche = new Coche;
$miCoche->marca = "ford ";
$miCoche->modelo = "mustang";

$miCoche->encender();
$miCoche->mostrarInfo();
?>