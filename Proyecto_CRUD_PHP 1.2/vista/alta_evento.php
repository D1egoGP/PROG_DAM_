<?php
require_once '../controlador/EventoController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new EventoController();
    $controller->agregarEvento($_POST['nombre_evento'], $_POST['fecha_evento'], $_POST['lugar_evento']);
    header("Location: lista_eventos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Agregar un Nuevo Evento</h1>
        <form method="POST" class="p-4 bg-white shadow rounded">
            <div class="mb-3">
                <label for="nombre_evento" class="form-label">Nombre del Evento</label>
                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" required>
            </div>
            <div class="mb-3">
                <label for="fecha_evento" class="form-label">Fecha del Evento</label>
                <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
            </div>
            <div class="mb-3">
                <label for="lugar_evento" class="form-label">Lugar del Evento</label>
                <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Agregar Evento</button>
                <a href="lista_eventos.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
