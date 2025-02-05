<?php


function ordenarArray($numeros) {
    for ($i = 0; $i < count($numeros); $i++) {
        for ($j = 0; $j < count($numeros) - 1; $j++) {
            if ($numeros[$j] > $numeros[$j + 1]) {
                $temp = $numeros[$j];
                $numeros[$j] = $numeros[$j + 1];
                $numeros[$j + 1] = $temp;
            }
        }
    }
    return $numeros;
}
$numeros = [10, 2, 35, 4, 60, 23, 8];
$numerosOrdenados = ordenarArray($numeros);
echo "Array ordenado: " . implode(", ", $numerosOrdenados) . "\n";


?>
