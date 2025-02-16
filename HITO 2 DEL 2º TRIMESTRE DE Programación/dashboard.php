<?php
session_start();
include 'db.php';

// Verificar si el usuario ha iniciado sesión, de lo contrario, redirigirlo a la página de inicio de sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consultar las tareas del usuario en la base de datos
$result = $conn->query("SELECT * FROM tasks WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .task-item {
            transition: all 0.3s ease-in-out;
        }
        .task-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="text-primary">Mis Tareas</h2>
                    <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
                </div>

                <div class="mb-3">
                    <h5 class="text-secondary">Bienvenido, <strong><?php echo $_SESSION['username']; ?></strong></h5>
                    <a href="add_task.php" class="btn btn-success">+ Agregar Tarea</a>
                </div>

                <?php if ($result->num_rows > 0) { ?>
                    <ul class="list-group">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center task-item">
                                <span><?php echo htmlspecialchars($row['task_name']); ?></span>
                                <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p class="text-muted text-center mt-3">No tienes tareas pendientes.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
