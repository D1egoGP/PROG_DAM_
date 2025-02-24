<?php
require_once '../modelo/class_socio.php';

class SociosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Socio();
    }

    public function agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->agregarSocio($nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function listarSocios() {
        return $this->modelo->obtenerSocios();
    }

    public function obtenerSocioPorId($id_socio) {
        return $this->modelo->obtenerSocioPorId($id_socio);
    }

    public function actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento) {
        $this->modelo->actualizarSocio($id_socio, $nombre, $apellido, $email, $telefono, $fecha_nacimiento);
    }

    public function eliminarSocio($id_socio) {
        $this->modelo->eliminarSocio($id_socio);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Proyecto CRUD PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="vista/lista_socios.php">Gestión de Socios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vista/lista_eventos.php">Gestión de Eventos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
