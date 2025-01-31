<?php
include '../includes/database.php';
include '../includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtiene los datos del usuario
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
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="../api/update_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" value="<?php echo $usuario['edad']; ?>" required><br>

        <label for="plan_base">Plan Base:</label>
        <select id="plan_base" name="plan_base">
            <option value="Básico" <?php echo ($usuario['plan_base'] == 'Básico') ? 'selected' : ''; ?>>Básico</option>
            <option value="Estándar" <?php echo ($usuario['plan_base'] == 'Estándar') ? 'selected' : ''; ?>>Estándar</option>
            <option value="Premium" <?php echo ($usuario['plan_base'] == 'Premium') ? 'selected' : ''; ?>>Premium</option>
        </select><br>

        <label for="paquetes">Paquetes adicionales:</label><br>
        <input type="checkbox" name="paquetes[]" value="Deporte" <?php echo (in_array("Deporte", explode(',', $usuario['paquetes_adicionales']))) ? 'checked' : ''; ?>> Deporte<br>
        <input type="checkbox" name="paquetes[]" value="Cine" <?php echo (in_array("Cine", explode(',', $usuario['paquetes_adicionales']))) ? 'checked' : ''; ?>> Cine<br>
        <input type="checkbox" name="paquetes[]" value="Infantil" <?php echo (in_array("Infantil", explode(',', $usuario['paquetes_adicionales']))) ? 'checked' : ''; ?>> Infantil<br>

        <label for="duracion">Duración:</label>
        <select id="duracion" name="duracion">
            <option value="Mensual" <?php echo ($usuario['duracion'] == 'Mensual') ? 'selected' : ''; ?>>Mensual</option>
            <option value="Anual" <?php echo ($usuario['duracion'] == 'Anual') ? 'selected' : ''; ?>>Anual</option>
        </select><br>

        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
