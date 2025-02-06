<?php
echo "Ingrese el primer número: ";
$numero1 = trim(fgets(STDIN));


echo "Ingrese el segundo número: ";
$numero2 = trim(fgets(STDIN));
echo "Seleccione una operación: \n";
echo "1. Suma\n";
echo "2. Resta\n";
echo "3. Multiplicación\n";
echo "4. División\n";
$opcion = trim(fgets(STDIN));
if ($opcion == 1) {
    echo "Resultado: " . ($numero1 + $numero2) . "\n";
} elseif ($opcion == 2) {
    echo "Resultado: " . ($numero1 - $numero2) . "\n";
} elseif ($opcion == 3) {
    echo "Resultado: " . ($numero1 * $numero2) . "\n";
} elseif ($opcion == 4) {
    if ($numero2 != 0) {
        echo "Resultado: " . ($numero1 / $numero2) . "\n";
    } else {
        echo "Error: División por cero no permitida.\n";
    }
} else {
    echo "Opción inválida.\n";
}
?>
