<?php
class Producto {
    public $nombre;
    public $precio;
    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    public function mostrarDetalles() {
        echo "Producto: " . $this->nombre;
        echo "Precio: $" . $this->precio;
    }
}
class Electrodomestico extends Producto {
    public $consumo;
    public function __construct($nombre, $precio, $consumo) {
        parent::__construct($nombre, $precio);
        $this->consumo = $consumo;
    }
    public function mostrarDetalles() {
        parent::mostrarDetalles();
        echo "Consumo: " . $this->consumo;
    }
}
$producto = new Producto("Mesa", 150);
$electrodomestico = new Electrodomestico("Refrigerador", 1200, 200);
echo "Detalles del Producto:";
$producto->mostrarDetalles();
echo "Detalles del Electrodoméstico:";
$electrodomestico->mostrarDetalles();
?>
  