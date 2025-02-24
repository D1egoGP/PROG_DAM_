<?php
// Incluye cualquier archivo necesario para la conexión, clases, etc.
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
   <!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Proyecto CRUD PHP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="vista/lista_socios.php">Gestión de Socios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vista/lista_eventos.php">Gestión de Eventos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bienvenido a la Gestión de CRUD - Proyecto PHP</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Gestión de Socios</div>
                    <div class="card-body">
                        <h5 class="card-title">Agrega, edita o elimina socios.</h5>
                        <p class="card-text">Puedes gestionar los socios del club aquí. Accede a la lista de socios, o agrega nuevos.</p>
                        <a href="vista/lista_socios.php" class="btn btn-light">Ver Socios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Gestión de Eventos</div>
                    <div class="card-body">
                        <h5 class="card-title">Agrega, edita o elimina eventos.</h5>
                        <p class="card-text">Puedes gestionar los eventos del club aquí. Accede a la lista de eventos, o agrega nuevos.</p>
                        <a href="vista/lista_eventos.php" class="btn btn-light">Ver Eventos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
