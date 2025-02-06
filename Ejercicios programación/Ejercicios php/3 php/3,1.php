<?php
function calculadora($num1, $num2, $operador) {
    try {
        if ($operador == '/' && $num2 == 0) {
            throw new Exception("Error: No se puede dividir entre cero.");
        }


        switch ($operador) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                return $num1 / $num2;
            default:
                throw new Exception("Operador no válido.");
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
}




?>
