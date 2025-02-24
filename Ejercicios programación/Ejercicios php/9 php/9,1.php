<?php


class Producto {
    private string $nombre;
    private float $precio;
    private int $cantidad;

    public function __construct(string $nombre, float $precio, int $cantidad) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }
}

class ProductoImportado extends Producto {
    private float $impuestoAdicional;

    public function __construct(string $nombre, float $precio, int $cantidad, float $impuestoAdicional) {
        parent::__construct($nombre, $precio, $cantidad);
        $this->impuestoAdicional = $impuestoAdicional;
    }

    public function calcularPrecioFinal(): float {
        return $this->getPrecio() + $this->impuestoAdicional;
    }
}

$producto = new Producto("Laptop", 1000, 2);
$productoImportado = new ProductoImportado("Smartphone", 800, 3, 50);

echo "Producto: {$producto->getNombre()} - Precio: {$producto->getPrecio()}\n";
echo "Producto Importado: {$productoImportado->getNombre()} - Precio Final: {$productoImportado->calcularPrecioFinal()}\n";
?>