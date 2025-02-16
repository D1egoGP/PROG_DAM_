<?php
// Iniciar la sesión para poder eliminarla
session_start();
// Eliminar todos los datos de la sesión
session_destroy();
// Redirigir al usuario a la página principal (index.php)
header("Location: index.php");
?>


