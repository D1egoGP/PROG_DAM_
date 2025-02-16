<?php
// Incluiye el archivo de configuración de la base de datos
include 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         /* Estilos personalizados para mejorar la estética */
        body {
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .welcome-container {
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
<!-- Visual principal de bienvenida -->
    <div class="welcome-container">
        <h2 class="text-primary">Bienvenido a Gestión de Tareas</h2>
        <p class="text-muted">Administra tus tareas de forma fácil y rápida</p>

        <div class="mt-4">
            <a href="register.php" class="btn btn-primary btn-custom mb-2">Registrarse</a>
            <a href="login.php" class="btn btn-outline-secondary btn-custom">Iniciar Sesión</a>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
