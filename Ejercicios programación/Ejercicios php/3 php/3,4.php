<?php
function tablaMultiplicar($numero) {
    try {
        if (!is_int($numero) || $numero <= 0) {
            throw new Exception("Error: El número debe ser un entero positivo.");
        }


        for ($i = 1; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . "\n";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


tablaMultiplicar(5);
tablaMultiplicar(-2);






?>
