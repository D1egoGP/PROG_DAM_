<?php
require_once '../controlador/EventoController.php';

if (isset($_GET['id'])) {
    $controller = new EventoController();
    $controller->eliminarEvento($_GET['id']);
    header("Location: lista_eventos.php");
    exit();
} else {
    echo "ID de evento no especificado.";
}
?>
