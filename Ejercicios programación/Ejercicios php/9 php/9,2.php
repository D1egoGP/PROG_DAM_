<?php

class CuentaBancaria {
    private string $titular;
    private float $saldo;
    private string $tipoCuenta;

    public function __construct(string $titular, string $tipoCuenta) {
        $this->titular = $titular;
        $this->tipoCuenta = $tipoCuenta;
        $this->saldo = 0;
    }

    public function depositar(float $cantidad): void {
        $this->saldo += $cantidad;
    }

    public function retirar(float $cantidad): void {
        if ($this->verificarSaldoSuficiente($cantidad)) {
            $this->saldo -= $cantidad;
        } else {
            echo "Saldo insuficiente.\n";
        }
    }

    private function verificarSaldoSuficiente(float $cantidad): bool {
        return $this->saldo >= $cantidad;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }
}

$cuenta = new CuentaBancaria("Juan Pérez", "Ahorro");
$cuenta->depositar(500);
$cuenta->retirar(200);
echo "Saldo final: {$cuenta->getSaldo()}\n";

?>