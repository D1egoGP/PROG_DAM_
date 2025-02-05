<?php

class Carrito {
    private $productos;

    public function __construct() {
        $this->productos = [];
    }

    public function agregarProducto($nombre, $precio, $cantidad) {
        $this->productos[$nombre] = [
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
        echo "Producto '{$nombre}' agregado al carrito.\n";
    }

    public function quitarProducto($nombre) {
        if (isset($this->productos[$nombre])) {
            unset($this->productos[$nombre]);
            echo "Producto '{$nombre}' eliminado del carrito.\n";
        } else {
            echo "El producto '{$nombre}' no se encuentra en el carrito.\n";
        }
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    public function mostrarDetalleCarrito() {
        echo "Detalles del carrito:\n";
        foreach ($this->productos as $nombre => $producto) {
            echo "- {$nombre}: {$producto['cantidad']} unidad(es) a \${$producto['precio']} cada una.\n";
        }
        echo "Total: \${$this->calcularTotal()}\n";
    }
}

// Crear una instancia del Carrito
$miCarrito = new Carrito();

// Simula el agregar productos
$miCarrito->agregarProducto("Manzanas", 1.5, 4);
$miCarrito->agregarProducto("Pan", 2.0, 2);
$miCarrito->agregarProducto("Leche", 1.2, 3);

// Muestra detalle del carrito
$miCarrito->mostrarDetalleCarrito();

echo "--------------------\n";

// Quita un producto
$miCarrito->quitarProducto("Pan");

// Muestra detalle del carrito nuevamente
$miCarrito->mostrarDetalleCarrito();

?>
