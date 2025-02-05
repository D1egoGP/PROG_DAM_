<?php
echo "Ingrese un número para verificar si es primo: ";
$numero = trim(fgets(STDIN));


if ($numero < 2) {
    echo "El número no es primo.\n";
} else {
    $esPrimo = true;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false;
            break;
        }
    }


    if ($esPrimo) {
        echo "El número $numero es primo.\n";
    } else {
        echo "El número $numero no es primo.\n";
    }
}
?>


