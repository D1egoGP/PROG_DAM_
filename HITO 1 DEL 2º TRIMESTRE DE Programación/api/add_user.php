<?php
include '../includes/database.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $fechaNacimiento = $_POST['fecha_nacimiento']; // Variable de la fecha de nacimiento
    $planBase = $_POST['plan_base'];
    $paquetes = isset($_POST['paquetes']) ? $_POST['paquetes'] : [];
    $duracion = $_POST['duracion'];

    // Calcula la edad a partir de la fecha de nacimiento
    $fechaNacimientoObj = new DateTime($fechaNacimiento);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNacimientoObj)->y;

    // Valida el correo único
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("El correo electrónico ya está registrado.");
    }

    // Valida las restricciones
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }

    // Restricciones para menores de 18 años
    if ($edad < 18 && (in_array("Deporte", $paquetes) || in_array("Cine", $paquetes))) {
        die("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
    }

    // Restricciones para el plan básico
    if ($planBase === "Básico" && count($paquetes) > 1) {
        die("El Plan Básico solo permite seleccionar un paquete adicional.");
    }

    // Restricciones para el pack deporte
    if (in_array("Deporte", $paquetes) && $duracion !== "Anual") {
        die("El Pack Deporte solo puede ser contratado con una duración de 1 año.");
    }

    // Calcula el costo total
    $costoTotal = calcularCosto($planBase, $paquetes, $duracion);

    // Inserta en la base de datos
    $stmt = $pdo->prepare("INSERT INTO users (nombre, apellidos, email, edad, plan_base, paquetes_adicionales, duracion, costo_total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $nombre,
        $apellidos,
        $email,
        $edad,  
        $planBase,
        implode(',', $paquetes),
        $duracion,
        $costoTotal,
    ]);

    header("Location: ../views/index.php");
    exit();
} else {
    echo "Método no permitido.";
}
?>
