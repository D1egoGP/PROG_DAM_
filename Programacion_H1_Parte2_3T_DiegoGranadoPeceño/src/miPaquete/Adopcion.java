package miPaquete;

public class Adopcion { // Clase que guarda información de una adopción
    private String nombreAdoptante;
    private String dniAdoptante;

    public Adopcion(String Nombre, String DNI) {   // Pide los datos del adoptante
        this.nombreAdoptante = Nombre;
        this.dniAdoptante = DNI;
    }
    public String getnombreAdoptante() {
        return nombreAdoptante;
    }
    public String getDNIAdoptante() {
        return dniAdoptante;
    }
}
