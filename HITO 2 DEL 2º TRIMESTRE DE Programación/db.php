<?php
$servername = "localhost";
$username = "root";
$password = "curso";
$database = "gestion_tareas";

// Crear conexión con MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si la conexión ha fallado
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
    