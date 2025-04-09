package miPaquete;
import java.util.*;

public class Main {
    private static Map<String, Animal> animales = new HashMap<>();

    public static void AGP(String[] args) {
        Scanner sc = new Scanner(System.in);
        boolean Salir = false;

        while (Salir) {
            System.out.println("\n1. Alta animal\n2. Buscar por chip\n3. Mostrar todos\n4. Salir");
            int opcion = sc.nextInt();
            sc.nextLine();

            switch (opcion) {
                case 1 -> Altaanimal(sc);
                case 2 -> Buscaranimal(sc);
                case 3 -> Mostrartodos();
                case 4 -> Salir = true;
            }
        }
    }

    public static void Altaanimal(Scanner sc) {
        System.out.print("Tipo (perro/gato): ");
        String tipo = sc.nextLine().toLowerCase();

        System.out.print("Chip: ");
        String chip = sc.nextLine();

        if (animales.containsKey(chip)) {
            System.out.println("El chip ya esta registrado y asignado.");
            return;
        }

        System.out.print("Nombre: ");
        String nombre = sc.nextLine();
        System.out.print("Edad: ");
        int edad = sc.nextInt(); sc.nextLine();
        System.out.print("Raza: ");
        String raza = sc.nextLine();
        System.out.print("¿Adoptado? (Si/No): ");
        boolean adoptado = sc.nextBoolean(); sc.nextLine();

        if (tipo.equals("Perro")) {
            System.out.print("Tamaño (pequeño/mediano/grande): ");
            String tamaño = sc.nextLine();
            animales.put(chip, new Perro(chip, nombre, edad, raza, adoptado, tamaño));
        } else if (tipo.equals("Gato")) {
            System.out.print("¿Test leucemia positivo? (Si/No): ");
            boolean leucemia = sc.nextBoolean(); sc.nextLine();
            animales.put(chip, new Gato(chip, nombre, edad, raza, adoptado, leucemia));
        } else {
            System.out.println("El tipo no ha sido válido.");
        }
    }

    public static void Buscaranimal(Scanner sc) {
        System.out.print("Introduce el chip: ");
        String chip = sc.nextLine();

        Animal a = animales.get(chip);
        if (a != null) {
            a.mostrar();
        } else {
            System.out.println("El animal no ha sido encontrado.");
        }
    }

    public static void Mostrartodos() {
        if (animales.isEmpty()) {
            System.out.println("No hay animales registrados.");
        } else {
            for (Animal a : animales.values()) {
                a.mostrar();
            }
        }
    }
}
