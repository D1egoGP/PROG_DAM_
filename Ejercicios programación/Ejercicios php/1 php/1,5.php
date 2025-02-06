<?php
echo "Ingrese la altura de la pirámide: ";
$altura = trim(fgets(STDIN));


for ($i = 1; $i <= $altura; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "\n";
}
?>
