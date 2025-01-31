<?php
include '../includes/database.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $edad = (int)$_POST['edad'];
    $planBase = $_POST['plan_base'];
    $paquetes = isset($_POST['paquetes']) ? $_POST['paquetes'] : [];
    $duracion = $_POST['duracion'];

    // Valida el correo único
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND id != ?");
    $stmt->execute([$email, $id]);
    if ($stmt->rowCount() > 0) {
        die("El correo electrónico ya está registrado.");
    }

    // Valida las restricciones
    if ($edad < 18 && (in_array("Deporte", $paquetes) || in_array("Cine", $paquetes))) {
        die("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
    }

    if ($planBase === "Básico" && count($paquetes) > 1) {
        die("El Plan Básico solo permite seleccionar un paquete adicional.");
    }

    if (in_array("Deporte", $paquetes) && $duracion !== "Anual") {
        die("El Pack Deporte solo puede ser contratado con una duración de 1 año.");
    }

    // Calcula el nuevo costo total
    $costoTotal = calcularCosto($planBase, $paquetes, $duracion);

    // Actualizar el usuario en la base de datos
    $stmt = $pdo->prepare("UPDATE users SET nombre = ?, apellidos = ?, email = ?, edad = ?, plan_base = ?, paquetes_adicionales = ?, duracion = ?, costo_total = ? WHERE id = ?");
    $stmt->execute([
        $nombre,
        $apellidos,
        $email,
        $edad,
        $planBase,
        implode(',', $paquetes),
        $duracion,
        $costoTotal,
        $id
    ]);

    // Redirigir a la página de listado de usuarios
    header("Location: ../views/index.php");
    exit();
} else {
    echo "Método no permitido.";
}
?>

