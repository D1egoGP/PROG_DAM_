<?php

class CuentaBancaria {
    private $titular;
    private $saldo;
    private $tipoDeCuenta;

    public function __construct($titular, $saldo, $tipoDeCuenta) {
        $this->titular = $titular;
        $this->saldo = $saldo;
        $this->tipoDeCuenta = $tipoDeCuenta;
    }

    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "Se han depositado \${$cantidad}. Saldo actual: \${$this->saldo}.\n";
        } else {
            echo "La cantidad a depositar debe ser positiva.\n";
        }
    }

    public function retirar($cantidad) {
        if ($cantidad > 0) {
            if ($cantidad <= $this->saldo) {
                $this->saldo -= $cantidad;
                echo "Se han retirado \${$cantidad}. Saldo actual: \${$this->saldo}.\n";
            } else {
                echo "Fondos insuficientes para realizar el retiro.\n";
            }
        } else {
            echo "La cantidad a retirar debe ser positiva.\n";
        }
    }

    public function mostrarInfo() {
        echo "Titular: {$this->titular}\n";
        echo "Tipo de cuenta: {$this->tipoDeCuenta}\n";
        echo "Saldo actual: \${$this->saldo}\n";
    }
}

// Crear una CuentaBancaria
$miCuenta = new CuentaBancaria("Juan Perez", 5000, "Ahorros");

// Realiza operaciones
$miCuenta->depositar(1500);
$miCuenta->retirar(2000);
$miCuenta->retirar(6000); // Intento de retirar más de lo posible del saldo
$miCuenta->mostrarInfo();

?>
