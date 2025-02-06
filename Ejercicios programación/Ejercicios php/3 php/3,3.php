<?php
function buscarElemento($array, $valor) {
    try {
        $index = array_search($valor, $array);
        if ($index === false) {
            throw new Exception("Error: El elemento no se encuentra en el array.");
        }
        return $index;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


$array = ["manzana", "naranja", "pera"];
echo buscarElemento($array, "pera");
echo buscarElemento($array, "plátano");






?>
