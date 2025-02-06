<?php
function convertirTemperatura($valor, $unidad) {
    try {
        if ($unidad == 'C') {
            return ($valor - 32) * 5/9;
        } elseif ($unidad == 'F') {
            return ($valor * 9/5) + 32;
        } else {
            throw new Exception("Error: Unidad no válida.");
        }
    } catch (Exception $e) {
        file_put_contents('errores.log', $e->getMessage() . "\n", FILE_APPEND);
        return $e->getMessage();
    }
}


echo convertirTemperatura(100, "C");
echo convertirTemperatura(0, "F");
echo convertirTemperatura(25, "X");
