<?php
class Empleado {
    public $nombre;
    public $sueldo;
    public function mostrarDetalles(){
        echo "nombre". $this->nombre;
        echo "sueldo". $this->sueldo;

    }
}

class Gerente extends Empleado{
    public $departamento;
}

?>

