package miPaquete;

public class Gato extends Animal {
	private boolean testleucemia;   //Dictar las caracteristicas del animal 
	public Gato(String Chip, String Nombre, int Edad, String Raza, boolean Adoptado, boolean testleucemia) {
        super(Chip, Nombre, Edad, Raza, Adoptado);
        this.testleucemia = testleucemia;
	}
	public boolean tieneLeucemia() {
        return testleucemia;   //hace conexión con gestor para mostrar los datos de los gatos
	}
        @Override
        public void mostrar() {    // Muestra la informacion de dicho animal, dice si tiene leucemia o no
            System.out.println("Chip: " + Chip + ", Nombre: " + Nombre + ", Edad: " + Edad +  ", Raza: " + Raza + ", Adoptado: " + Adoptado + ", Testleucemia: " + (testleucemia? "Sí" : "No"));
        }
	  
}


