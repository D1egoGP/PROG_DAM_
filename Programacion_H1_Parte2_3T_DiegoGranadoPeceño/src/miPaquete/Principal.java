package miPaquete;
import java.util.*;

public class Principal {
    private static Map<String, Animal> animales = new HashMap<>();
    private static Map<String, Adopcion> adopciones = new HashMap<>(); //Guarda los datos de adopcion

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);  // Creamos un objeto para poder leer la entrada 
        boolean salir = false;   // Controla el bucle del menú

        while (!salir) {
        	System.out.print("Selecciona una de las siguientes opciones: "); //Nuevo
            System.out.println("\n1. Dar de alta animal \n2. Listar animales \n3. Buscar animal \n4. Realizar adopción \n5. Dar de baja \n6. Mostrar estadisticas de gatos \n7. Salir"); //Modificado
            
            int opcion = sc.nextInt();
            sc.nextLine();
            switch (opcion) {         // Usamos un switch para ejecutar la opción
                case 1 -> altaAnimal(sc);
                case 2 -> mostrarTodos();
                case 3 -> buscarAnimal(sc);
                case 4 -> realizarAdopcion(sc); //Nuevo
                case 5 -> dardeBaja(sc);//Nuevo
                case 6 -> mostrarEstadisticasGatos();//Nuevo
                case 7 -> salir = true;
                default -> System.out.println("Vuelva seleccionar un número del 1 al 7 y no superiores.");
            }
        }
    }
// Registrar un nuevo animal
    public static void altaAnimal(Scanner sc) {
        System.out.print("Tipo (perro/gato): ");
        String tipo = sc.nextLine().toLowerCase();

        System.out.print("Chip: ");  // Pregunta por el chip
        String chip = sc.nextLine();
     // Vemos si el chip del animal esta registrado
        if (animales.containsKey(chip)) {
            System.out.println("El chip ya esta registrado y asignado.");
            return;
        }
// Pide informacion del animal
        System.out.print("Nombre: ");
        String nombre = sc.nextLine();
        System.out.print("Edad: ");
        int edad = sc.nextInt(); sc.nextLine();
        System.out.print("Raza: ");
        String raza = sc.nextLine();
        System.out.print("¿Adoptado? (S/N): ");  //equals("S") nos devuelve true si escribes "S", y false si escribes "N"
        String adoptadoInput = sc.nextLine().trim().toUpperCase();
        boolean adoptado = adoptadoInput.equals("S");


        if (tipo.equals("perro")) {
            System.out.print("Tamaño (pequeño/mediano/grande): ");  //Vemos el tamaño del animal
            String tamaño = sc.nextLine();
            animales.put(chip, new Perro(chip, nombre, edad, raza, adoptado, tamaño));
        } else if (tipo.equals("gato")) {
        	System.out.print("¿Test de leucemia positivo? (S/N): ");  //dictamos si el gato tiene leucemia o no 
        	String leucemiaInput = sc.nextLine().trim().toUpperCase();
        	boolean leucemia = leucemiaInput.equals("S");  //equals("S") nos devuelve true si escribes "S", y false si escribes "N"
            animales.put(chip, new Gato(chip, nombre, edad, raza, adoptado, leucemia));
        } else {
            System.out.println("El tipo no ha sido válido.");  // Se muestra si ha ocurrido un error
        }
    }
  // Busca el animal por el Chip
    public static void buscarAnimal(Scanner sc) {
        System.out.print("Introduzca el chip: ");
        String chip = sc.nextLine();

        Animal a = animales.get(chip);
        if (a != null) {
            a.mostrar();
        } else {
            System.out.println("El animal no ha sido encontrado.");
        }
    }
// Muestra todos los animales
    public static void mostrarTodos() {
        if (animales.isEmpty()) {
            System.out.println("No hay animales registrados.");
        } else {
            for (Animal a : animales.values()) {
                a.mostrar();
            }
        }
    }
    public static void realizarAdopcion(Scanner sc) {  //Nuevo
    	System.out.print("Introduzca el chip del animal que va a contratar: ");
    	String chip = sc.nextLine();
    	Animal animal = animales.get(chip);
    	if (animal == null) {
    		System.out.print("El número de chip no esta asignado a ningún animal");
    		return;
    	}
    	if (animal.Adoptado) {
    		System.out.print("El animal con dicho chip ya fue adoptado. ");
    		return;
    	}
    	 System.out.print("Nombre del adoptante: ");
         String Nombre = sc.nextLine();
         System.out.print("DNI del adoptador: ");
         String DNI = sc.nextLine();
         
         adopciones.put(chip, new Adopcion(Nombre, DNI));
         animal.Adoptado = true;
         System.out.println("La odopción fue registrada correctamente");
     }
    public static void dardeBaja(Scanner sc) {  //Nuevo
        System.out.print("Introduzca el chip del animal que desea eliminar: ");
        String chip = sc.nextLine();

        if (!animales.containsKey(chip)) {
            System.out.println("El animal no está registrado");
            return;
        }
        animales.remove(chip);
        if (adopciones.containsKey(chip)) {
            adopciones.remove(chip);
            System.out.println("El animal y su respectiva adopción han sido eliminados");
        } else {
            System.out.println("El animal fue eliminado correctamente");
        
        }

    }
    public static void mostrarEstadisticasGatos() {  //Nuevo
        int totalGatos = 0;
        int gatosLeucemia = 0;

        for (Animal a : animales.values()) {
            if (a instanceof Gato g) {
                totalGatos++;
                if (g.tieneLeucemia()) {
                    gatosLeucemia++;
                }
            }
        }

        System.out.println("Total de gatos registrados: " + totalGatos);
        System.out.println("Gatos con test de leucemia positivos: " + gatosLeucemia);
    }

    
}
