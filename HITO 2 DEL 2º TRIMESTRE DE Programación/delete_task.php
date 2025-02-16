<?php
// Inicia la sesión para mantener la información del usuario
session_start();

// Incluir la conexión a la base de datos
include 'db.php';

// Verificar si el usuario está autenticado, si no, redirigir al inicio de sesión
if (!isset($_SESSION['user_id'])) { header("Location: index.php"); exit(); }

// Verificar si se ha recibido un ID de tarea para eliminar
if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $_SESSION['user_id']);
    $stmt->execute();
}

// Redirigir de nuevo al panel de control después de la eliminación
header("Location: dashboard.php");
?>
