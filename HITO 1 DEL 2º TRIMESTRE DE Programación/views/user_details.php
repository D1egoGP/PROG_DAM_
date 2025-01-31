<?php
include '../includes/database.php';
include '../includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();

    if (!$usuario) {
        die("Usuario no encontrado.");
    }
} else {
    die("ID no válido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Detalles del Usuario</h1>
    </header>

    <main>
        <section>
            <h2>Información del Usuario</h2>
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $usuario['nombre'] . ' ' . $usuario['apellidos']; ?></td>
                </tr>
                <tr>
                    <th>Correo Electrónico</th>
                    <td><?php echo $usuario['email']; ?></td>
                </tr>
                <tr>
                    <th>Edad</th>
                    <td><?php echo $usuario['edad']; ?></td>
                </tr>
                <tr>
                    <th>Plan Base</th>
                    <td><?php echo $usuario['plan_base']; ?></td>
                </tr>
                <tr>
                    <th>Paquetes Adicionales</th>
                    <td><?php echo $usuario['paquetes_adicionales']; ?></td>
                </tr>
                <tr>
                    <th>Duración</th>
                    <td><?php echo $usuario['duracion']; ?></td>
                </tr>
                <tr>
                    <th>Costo Total</th>
                    <td>€<?php echo number_format($usuario['costo_total'], 2); ?></td>
                </tr>
            </table>

            <a href="edit_user.php?id=<?php echo $usuario['id']; ?>" class="button">Editar Usuario</a>
            <a href="../api/delete_user.php?id=<?php echo $usuario['id']; ?>" class="button" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar Usuario</a>
            <br><br>
            <a href="index.php" class="button">Volver a la Lista de Usuarios</a>
        </section>
    </main>

    <?php include_once '../includes/footer.php'; ?>
</body>
</html>
