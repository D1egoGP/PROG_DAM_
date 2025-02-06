<?php


function validarContraseña($contraseña) {
    $patron = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/";


    if (preg_match($patron, $contraseña)) {
        return "Contraseña válida.";
    } else {
        return "Contraseña inválida. Debe tener al menos 8 caracteres, contener una letra mayúscula, una minúscula y un número.";
    }
}
$contraseña = "Contraseña123";
echo validarContraseña($contraseña) . "\n";


?>


