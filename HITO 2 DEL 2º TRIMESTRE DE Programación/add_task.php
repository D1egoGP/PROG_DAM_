<?php
// Iniciar sesión para gestionar la autenticación del usuario
session_start();

// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si el usuario ha iniciado sesión, si no, redirigirlo al inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Procesar el formulario cuando se envía una nueva tarea
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    // Preparar la consulta SQL para insertar la nueva tarea

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_name) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['user_id'], $task_name);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Visual principal con el formulario de agregar tarea -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-center mb-4">Agregar Nueva Tarea</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Tarea</label>
                            <input type="text" name="task_name" class="form-control" placeholder="Escribe tu tarea" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Agregar Tarea</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
