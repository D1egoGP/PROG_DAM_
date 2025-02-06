<?php
class Circulo {
    public $radio;
    public function calcularArea(){
    $area = pi() * ($this->radio * $this->radio);
        echo "Area del circulo es: ". $area;
    }
}

$miCirculo = new Circulo();
$miCirculo->radio= 5;
$miCirculo->calcularArea();
?>