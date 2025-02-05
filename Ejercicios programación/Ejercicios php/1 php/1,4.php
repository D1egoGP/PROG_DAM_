<?php
$numeroSecreto = rand(1, 100);
$intento = null;


echo "¡Adivina el número entre 1 y 100!\n";


while ($intento != $numeroSecreto) {
    echo "Ingrese su suposición: ";
    $intento = trim(fgets(STDIN));


    if ($intento > $numeroSecreto) {
        echo "El número secreto es menor.\n";
    } elseif ($intento < $numeroSecreto) {
        echo "El número secreto es mayor.\n";
    } else {
        echo "¡Felicidades! Adivinaste el número.\n";
    }
}
?>


