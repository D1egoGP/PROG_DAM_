<?php
include '../includes/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Elimina usuario por ID
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    // Redirigir a la página de listado de usuarios
    header("Location: index.php");
    exit();
} else {
    echo "ID no válido.";
}
?>
