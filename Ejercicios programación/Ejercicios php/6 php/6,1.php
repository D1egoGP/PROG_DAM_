<?php
class Libro {
    public $titulo;
    public $autor;
    public $numerodepaginas;

    public function mostrarInfo() {
  echo $this->titulo. $this->autor. $this->numerodepaginas;
    }
}
$tu_Libro= new Libro;
$tu_Libro->titulo = "La vereda de la puerta de atras ";
$tu_Libro->autor = "Extremo Duro ";
$tu_Libro->numerodepaginas = 3000;

$tu_Libro->mostrarInfo();
?>

