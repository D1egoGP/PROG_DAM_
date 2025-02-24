<?php
require_once '../controlador/EventoController.php';
$controller = new EventoController();
$eventos = $controller->listarEventos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Eventos Registrados</h1>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Evento</th>
                <th>Fecha Evento</th>
                <th>Lugar Evento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= $evento['id_evento'] ?></td>
                <td><?= $evento['nombre_evento'] ?></td>
                <td><?= $evento['fecha_evento'] ?></td>
                <td><?= $evento['lugar_evento'] ?></td>
                <td>
                    <a href="editar_evento.php?id=<?= $evento['id_evento'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="eliminar_evento.php?id=<?= $evento['id_evento'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="alta_evento.php" class="btn btn-primary">Agregar Evento</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


