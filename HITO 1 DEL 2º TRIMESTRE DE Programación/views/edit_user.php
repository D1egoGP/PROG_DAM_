<?php
include '../includes/database.php';
include '../includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();

    if (!$usuario) {
        die("Usuario no encontrado.");
    }
} else {
    die("ID no válido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: black;
        }

        header {
            background-color: #333;
            color: white;
            text-align: left;
            padding: 10px 20px;
            font-size: 24px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1em;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }
        
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* Agregamos la imagen de fondo */
            background-image: url('cine2.jpg');
            background-size: cover;  /* Hace que la imagen cubra todo el fondo */
            background-position: center;  /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen mientras se desplaza la página */
        }
    

    </style>
</head>
<body>

    <header>
        StreamWeb
    </header>

    <main>
        <section>
            <h1>Editar Usuario</h1>
            <form action="../api/update_user.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

                <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

                <label for="plan_base">Plan Base:</label>
                <select id="plan_base" name="plan_base" required>
                    <option value="Básico" <?php if ($usuario['plan_base'] == "Básico") echo "selected"; ?>>Básico</option>
                    <option value="Estándar" <?php if ($usuario['plan_base'] == "Estándar") echo "selected"; ?>>Estándar</option>
                    <option value="Premium" <?php if ($usuario['plan_base'] == "Premium") echo "selected"; ?>>Premium</option>
                </select>

                <label for="duracion">Duración de la Suscripción:</label>
                <select id="duracion" name="duracion" required>
                    <option value="Mensual" <?php if ($usuario['duracion'] == "Mensual") echo "selected"; ?>>Mensual</option>
                    <option value="Anual" <?php if ($usuario['duracion'] == "Anual") echo "selected"; ?>>Anual</option>
                </select>

                <div class="form-group" id="paquetes">
               <label for="paquetes_adicionales">Paquetes Adicionales</label>
               <div class="form-check">
                   <input type="checkbox" name="paquetes_adicionales[]" value="Deporte" id="paquete_deporte" class="form-check-input">
                   <label class="form-check-label" for="paquete_deporte">Deporte 6,99€</label>
               </div>
               <div class="form-check">
                   <input type="checkbox" name="paquetes_adicionales[]" value="Cine" id="paquete_cine" class="form-check-input">
                   <label class="form-check-label" for="paquete_cine">Cine 7,99€</label>
               </div>
               <div class="form-check">
                   <input type="checkbox" name="paquetes_adicionales[]" value="Infantil" id="paquete_infantil" class="form-check-input">
                   <label class="form-check-label" for="paquete_infantil">Infantil 4,99€</label>
               </div>
            </div>


                <button type="submit">Actualizar Usuario</button>
            </form>
        </section>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const edadInput = document.getElementById("edad");
            const planBase = document.getElementById("plan_base");
            const duracion = document.getElementById("duracion");
            const deporte = document.getElementById("paquete_deporte");
            const infantil = document.getElementById("paquete_infantil");
            const checkboxes = document.querySelectorAll("#paquetes input[type='checkbox']");

            function validarRestricciones() {
                const edad = parseInt(edadInput.value);
                const plan = planBase.value;
                const duracionSeleccionada = duracion.value;
                const paquetesSeleccionados = Array.from(checkboxes).filter(chk => chk.checked);

                // Menores de 18 años solo pueden contratar el Pack Infantil
                if (edad < 18) {
                    checkboxes.forEach(chk => {
                        chk.checked = chk.value === "Infantil";
                        chk.disabled = chk.value !== "Infantil";
                    });
                } else {
                    checkboxes.forEach(chk => chk.disabled = false);
                }

                // Plan Básico solo puede seleccionar un paquete adicional
                if (plan === "Básico" && paquetesSeleccionados.length > 1) {
                    paquetesSeleccionados.forEach((chk, index) => {
                        if (index > 0) chk.checked = false;
                    });
                }

                // Pack Deporte solo disponible si la suscripción es Anual
                if (duracionSeleccionada !== "Anual") {
                    deporte.checked = false;
                    deporte.disabled = true;
                } else {
                    deporte.disabled = false;
                }
            }

            edadInput.addEventListener("input", validarRestricciones);
            planBase.addEventListener("change", validarRestricciones);
            duracion.addEventListener("change", validarRestricciones);
            checkboxes.forEach(chk => chk.addEventListener("change", validarRestricciones));

            validarRestricciones();
        });
    </script>

</body>
</html>
