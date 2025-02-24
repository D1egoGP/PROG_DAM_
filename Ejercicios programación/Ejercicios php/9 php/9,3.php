<?php

class Usuario {
    protected string $nombre;
    protected string $email;

    public function __construct(string $nombre, string $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function mostrarInfo(): void {
        echo "Usuario: {$this->nombre}, Email: {$this->email}\n";
    }
}

class Administrador extends Usuario {
    private string $nivelAcceso;

    public function __construct(string $nombre, string $email, string $nivelAcceso) {
        parent::__construct($nombre, $email);
        $this->nivelAcceso = $nivelAcceso;
    }

    public function mostrarInfo(): void {
        echo "Administrador: {$this->nombre}, Email: {$this->email}, Nivel: {$this->nivelAcceso}\n";
    }
}

$usuario = new Usuario("Ana López", "ana@mail.com");
$admin = new Administrador("Carlos Gómez", "carlos@mail.com", "SuperAdmin");
$usuario->mostrarInfo();
$admin->mostrarInfo();

?>