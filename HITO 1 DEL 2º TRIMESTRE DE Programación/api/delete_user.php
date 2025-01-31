<?php
include '../includes/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Elimina el usuario por ID
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: ../views/index.php");
    exit();
} else {
    echo "ID no válido.";
}
?>
