<?php
class ConversorMoneda {
    private $factorDolaresAEuros = 0.85;
    private $factorEurosADolares = 1.18;
    public function convertirDolaresAEuros($dolares) {
        return $dolares * $this->factorDolaresAEuros;
    }
    public function convertirEurosADolares($euros) {
        return $euros * $this->factorEurosADolares;
    }
}
$conversor = new ConversorMoneda();
$dolares = 100;
$euros = 85;
echo "Conversión de dólares a euros:";
echo "$" . $dolares . " USD son €" . $conversor->convertirDolaresAEuros($dolares) . "EUR";
echo "Conversión de euros a dólares:<br>";
echo $euros . "EUR son $" . $conversor->convertirEurosADolares($euros) . "USD";
?>
