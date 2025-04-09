package miPaquete;

public class Gato extends Animal {
	private boolean Testleucemia;
	public Gato(String Chip, String Nombre, int Edad, String Raza, boolean Adoptado, boolean Testleucemia) {
        super(Chip, Nombre, Edad, Raza, Adoptado);
        this.Testleucemia = Testleucemia;
	}
        @Override
        public void mostrar() {
            System.out.println("Gato -> Chip: " + Chip + ", Nombre: " + Nombre + ", Edad: " + Edad +  ", Raza: " + Raza + ", Adoptado: " + Adoptado + ", Testleucemia: " + (Testleucemia? "Sí" : "No"));
        }
	  
}
	