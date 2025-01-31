<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('cine2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        section {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
        }

        h1 {
            color: white;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 5px;
            margin-bottom: 7px;
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

        .checkbox-group label {
            display: inline-block;
            margin-right: 20px;
            font-weight: normal;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-check {
            display: inline-flex;
            align-items: center;
            margin-right: 20px;
        }

        .form-check input[type="checkbox"] {
            margin-right: 5px;
        }

        .form-check label {
            font-size: 1em;
            margin: 0;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>
</head>
<body>

<header>
    <h1>Agregar Nuevo Usuario</h1>
</header>

<main>
    <section>
        <h2>Formulario de Registro</h2>
        <form action="../api/add_user.php" method="POST">

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ingrese su nombre">
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required placeholder="Ingrese sus apellidos">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required placeholder="Ingrese su correo electrónico">
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="form-group">
                <label for="plan_base">Plan Base:</label>
                <select id="plan_base" name="plan_base" required>
                    <option value="Básico">Básico 9.99€</option>
                    <option value="Estándar">Estándar 13.99€</option>
                    <option value="Premium">Premium 17.99€</option>
                </select>
            </div>

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

            <div class="form-group">
                <label for="duracion">Duración de la Suscripción:</label>
                <select id="duracion" name="duracion" required>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>

            <div>
                <button type="submit">Registrar Usuario</button>
            </div>

        </form>
    </section>
</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const fechaNacimientoInput = document.getElementById("fecha_nacimiento");
        const planBaseInput = document.getElementById("plan_base");
        const paquetesInputs = document.querySelectorAll("input[name='paquetes_adicionales[]']");
        const duracionInput = document.getElementById("duracion");
        const cineInput = document.getElementById("paquete_cine");
        const infantilInput = document.getElementById("paquete_infantil");
        const deporteInput = document.getElementById("paquete_deporte");

        function actualizarRestricciones() {
            const fechaNacimiento = new Date(fechaNacimientoInput.value);
            const hoy = new Date();
            const añoActual = hoy.getFullYear();
            const mesActual = hoy.getMonth();
            const diaActual = hoy.getDate();

            let edad = añoActual - fechaNacimiento.getFullYear();
            if (mesActual < fechaNacimiento.getMonth() || (mesActual === fechaNacimiento.getMonth() && diaActual < fechaNacimiento.getDate())) {
                edad--;
            }

            const esMenorDeEdad = (fechaNacimiento.getFullYear() >= 2007);

            // Restricción de edad: Solo Infantil si es menor de edad
            paquetesInputs.forEach(paquete => {
                if (esMenorDeEdad) {
                    paquete.checked = paquete.value === "Infantil";
                    paquete.disabled = paquete.value !== "Infantil";
                } else {
                    paquete.disabled = false;
                }
            });

            // Restricción del Plan Básico: Solo un paquete entre Cine o Infantil
            if (planBaseInput.value === "Básico") {
                if (cineInput.checked) {
                    infantilInput.disabled = true;
                } else if (infantilInput.checked) {
                    cineInput.disabled = true;
                } else {
                    cineInput.disabled = false;
                    infantilInput.disabled = false;
                }
            } else {
                cineInput.disabled = false;
                infantilInput.disabled = false;
            }

            // Restricción del Pack Deporte: Solo disponible con suscripción Anual
            if (duracionInput.value !== "Anual") {
                deporteInput.checked = false;
                deporteInput.disabled = true;
            } else {
                deporteInput.disabled = false;
            }
        }

        // Eventos para actualizar restricciones
        fechaNacimientoInput.addEventListener("input", actualizarRestricciones);
        planBaseInput.addEventListener("change", actualizarRestricciones);
        duracionInput.addEventListener("change", actualizarRestricciones);
        cineInput.addEventListener("change", actualizarRestricciones);
        infantilInput.addEventListener("change", actualizarRestricciones);

        actualizarRestricciones();
    });
</script>



</body>
</html>
