<?php
function validarEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido";
    } else {
        $error = "Error: La dirección de correo no es válida.";
        file_put_contents('errores.log', $error . "\n", FILE_APPEND);
        return $error;
    }
}


echo validarEmail("correo@ejemplo.com");
echo validarEmail("correo_invalido");




?>
