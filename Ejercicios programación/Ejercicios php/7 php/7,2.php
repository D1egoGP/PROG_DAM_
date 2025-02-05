<?php
class Rectangulo {
    public $base;
    public $altura;
    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }
    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

$rectangulo = new Rectangulo(10, 5);
$area = $rectangulo->calcularArea();
echo "El área del rectángulo es: " . $area;
?>
