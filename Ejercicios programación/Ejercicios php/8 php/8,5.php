<?php

class Personaje {
    private $nombre;
    private $nivel;
    private $puntosVida;
    private $puntosAtaque;

    public function __construct($nombre, $nivel, $puntosVida, $puntosAtaque) {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
        $this->puntosVida = $puntosVida;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function atacar(Personaje $objetivo) {
        $danio = $this->puntosAtaque;
        $objetivo->recibirDanio($danio);
        echo "{$this->nombre} atacó a {$objetivo->nombre} causando {$danio} puntos de daño.\n";
    }

    private function recibirDanio($danio) {
        $this->puntosVida -= $danio;
        if ($this->puntosVida < 0) {
            $this->puntosVida = 0;
        }
        echo "{$this->nombre} ahora tiene {$this->puntosVida} puntos de vida.\n";
    }

    public function curarse() {
        $vidaRecuperada = $this->nivel * 10;
        $this->puntosVida += $vidaRecuperada;
        echo "{$this->nombre} se curó y recuperó {$vidaRecuperada} puntos de vida. Ahora tiene {$this->puntosVida} puntos de vida.\n";
    }

    public function subirNivel() {
        $this->nivel++;
        $this->puntosAtaque += 5;
        $this->puntosVida += 20;
        echo "{$this->nombre} subió al nivel {$this->nivel}. Sus puntos de ataque ahora son {$this->puntosAtaque} y sus puntos de vida son {$this->puntosVida}.\n";
    }

    public function mostrarEstado() {
        echo "{$this->nombre}: Nivel {$this->nivel}, Vida {$this->puntosVida}, Ataque {$this->puntosAtaque}\n";
    }
}

// Crear los personajes
$personaje1 = new Personaje("Guerrero", 1, 100, 15);
$personaje2 = new Personaje("Mago", 1, 80, 20);

// Simular la batalla
$personaje1->mostrarEstado();
$personaje2->mostrarEstado();

echo "--------------------\n";

$personaje1->atacar($personaje2);
$personaje2->curarse();
$personaje2->atacar($personaje1);
$personaje1->subirNivel();

// Mostrar el estado final
$personaje1->mostrarEstado();
$personaje2->mostrarEstado();

?>
