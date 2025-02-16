<?php
// Iniciar la sesión para mantener la información del usuario durante la navegación
session_start();
include 'db.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para verificar si el correo existe en la base de datos
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el usuario con el correo proporcionado existe
    if ($result->num_rows > 0) {

        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Redirigir al dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Si la contraseña es incorrecta, mostrar un error
            $error = "Contraseña incorrecta.";
        }
    } else {
        // Si el correo no existe en la base de datos, mostrar un error
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
<!-- Formulario de inicio de sesión -->
<div class="login-container">
    <h2 class="text-primary">Iniciar Sesión</h2>
    <p class="text-muted">Accede a tu cuenta</p>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" placeholder="Correo" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary btn-custom">Ingresar</button>
    </form>

    <div class="mt-3">
        <p class="text-muted">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
