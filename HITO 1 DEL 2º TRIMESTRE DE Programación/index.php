<?php
// Página de inicio que muestra los paquetes disponibles
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamWeb - Inicio</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #000;
            text-align: center;
        }

        h1 {
            margin: 20px 0;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
        }

        th {
            background-color: #f4f4f4;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
        body {
    background-image: url('cine2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: black; /* Asegura que el texto sea legible */
}
    </style>
</head>
<body>
    <style>
        
body {
    background-image: url('cine2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: black; /* Asegura que el texto sea legible */
}
    </style>
    <h1  style="color:aliceblue">Bienvenido a StreamWeb</h1>
    <p style="color:aliceblue">Consulta nuestros paquetes y sus precios:</p>

    <table style="background-color:rgb(177, 177, 177);">
        <thead>
            <tr>
                <th>Paquete</th>
                <th>Precio</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Deporte</td>
                <td>€6.99</td>
                <td>Accede a los mejores eventos deportivos en vivo.</td>
            </tr>
            <tr>
                <td>Cine</td>
                <td>€7.99</td>
                <td>Disfruta de los estrenos más recientes y clásicos del cine.</td>
            </tr>
            <tr>
                <td>Infantil</td>
                <td>€4.99</td>
                <td>Contenido seguro y educativo para los más pequeños.</td>
            </tr>
        </tbody>
    </table>
    <section class="table-container">
            <h2>Planes y Precios</h2>
            <table style="background-color:rgb(177, 177, 177);">
                <thead>
                    <tr>
                        <th>Plan</th>
                        <th>Precio Mensual (€)</th>
                        <th>Precio Anual (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Básico</td>
                        <td>9.99</td>
                        <td>119.88</td>
                    </tr>
                    <tr>
                        <td>Estándar</td>
                        <td>13.99</td>
                        <td>167.88</td>
                    </tr>
                    <tr>
                        <td>Premium</td>
                        <td>17.99</td>
                        <td>215.88</td>
                    </tr>
                </tbody>
            </table>
        </section>
    <a href="views/index.php">Ir a la Gestión de Usuarios</a>

</body>
</html>
