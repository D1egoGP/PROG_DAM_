<?php
// Pedir al usuario que ingrese un número
echo "Ingrese un número para generar su tabla de multiplicar: ";
$numero = trim(fgets(STDIN));
for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "\n";
}
?>
