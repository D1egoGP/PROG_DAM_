<?php
include '../includes/database.php';
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamWeb - Gestión de Usuarios</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        /* Estilos para mejorar la disposición de los enlaces */
        header {
            background-color: #333;
            color: white;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        header h1 {
            font-size: 2.5em;
            margin-bottom: 15px;
            text-align: left; /* Alinea el título a la izquierda */
        }

        header nav ul {
            display: flex;
            padding: 0;
            margin: 0;
        }

        header nav ul li {
            list-style: none;
            margin-right: 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 16px;
            background-color: #007bff;
            border-radius: 4px;
        }

        header nav ul li a:hover {
            background-color: #0056b3;
        }
        h1 {
            color: white;
        }
        h2 {
            color: white;
            font-size: 1.8em;
            margin-top: 20px;
        }

        /* Estilos adicionales para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f9;
            font-weight: bold;
        }

        .button {
            display: inline-block;
            padding: 0.5em 1em;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button-container {
            margin-bottom: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* Agrega la imagen de fondo */
            background-image: url('cine2.jpg');
            background-size: cover;  
            background-position: center;  
            background-attachment: fixed; 
        }
    </style>
</head>
<body>
    <header>
        <h1>StreamWeb</h1>
 
    </header>

    <main>
        <section>
            <h2>Lista de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Plan Base</th>
                        <th>Paquetes</th>
                        <th>Duración</th>
                        <th>Costo Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Obtener usuarios desde la base de datos
                    $stmt = $pdo->query("SELECT * FROM users");
                    $usuarios = $stmt->fetchAll();

                    if (count($usuarios) > 0) {
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<td>{$usuario['nombre']} {$usuario['apellidos']}</td>";
                            echo "<td>{$usuario['email']}</td>";
                            echo "<td>{$usuario['plan_base']}</td>";
                            echo "<td>{$usuario['paquetes_adicionales']}</td>";
                            echo "<td>{$usuario['duracion']}</td>";
                            echo "<td>€{$usuario['costo_total']}</td>";
                            echo "<td>
                                <a href='edit_user.php?id={$usuario['id']}' class='button'>Editar</a>
                                <a href='../api/delete_user.php?id={$usuario['id']}' class='button' onclick='return confirm(\"¿Seguro que deseas eliminar este usuario?\");'>Eliminar</a>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No hay usuarios registrados.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="button-container">
                <a href="add_user.php" class="button">Agregar Usuario</a>
            </div>
        </section>
    </main>

    <?php include_once '../includes/footer.php'; ?>
</body>
</html>
