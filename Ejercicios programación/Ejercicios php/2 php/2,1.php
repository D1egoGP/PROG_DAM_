<?php


function contarPalabras($frase) {
    $contadorPalabras = 0;
    $espacios = false;


    for ($i = 0; $i < strlen($frase); $i++) {
        if ($frase[$i] == ' ') {
            if (!$espacios) {
                $contadorPalabras++;
                $espacios = true;
            }
        } else {
            $espacios = false;
        }
    }
    $contadorPalabras++;
    return $contadorPalabras;
}
$frase = "Hola, este es un ejemplo para contar palabras.";
echo "Número total de palabras: " . contarPalabras($frase) . "\n";


?>
