<?php
class Animal {
    public $especie;
    public function __construct($especie) {
        $this->especie = $especie;
    }
    public function emitirSonido() {
        echo "Este animal emite un sonido.";
    }
}
class Perro extends Animal {
    public $raza;
    public function __construct($especie, $raza) {
        parent::__construct($especie); 
        $this->raza = $raza;
    }
    public function emitirSonido() {
        echo "Guau guau";
    }
}
$miPerro = new Perro("Caniche", "Doberman");
echo "Especie: " . $miPerro->especie . "<br>";
echo "Raza: " . $miPerro->raza . "<br>";
echo "Sonido: " . $miPerro->emitirSonido() . "<br>";
?>
