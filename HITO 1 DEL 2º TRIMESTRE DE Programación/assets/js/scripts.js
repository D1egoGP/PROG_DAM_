document.addEventListener("DOMContentLoaded", () => {
    const planBase = document.getElementById("plan_base");
    const edad = document.getElementById("edad");
    const paquetes = document.querySelectorAll("input[name='paquetes[]']");
    const periodo = document.getElementById("periodo");
    const costoTotalElement = document.getElementById("costo_total");

    function actualizarOpciones() {
        const edadValue = parseInt(edad.value, 10);
        const planValue = planBase.value;

        // Habilitar/deshabilitar paquetes según la edad
        paquetes.forEach(paquete => {
            paquete.disabled = false;
            paquete.checked = false;

            // Restringir paquete según la edad
            if (edadValue < 18 && paquete.value !== "Infantil") {
                paquete.disabled = true;
            }

            // Plan Básico solo permite un paquete adicional
            if (planValue === "Básico") {
                paquetes.forEach(p => p.checked = false); // Deseleccionar todos
                paquete.disabled = paquetes.filter(p => p.checked).length >= 1; // Solo se puede marcar uno
            }

            // Lógica para el paquete "Deporte"
            if (paquete.value === "Deporte" && periodo.value === "Anual") {
                paquete.disabled = false;
            }
        });
    }

    // Actualizar las opciones 
    planBase.addEventListener("change", actualizarOpciones);
    edad.addEventListener("input", actualizarOpciones);
    periodo.addEventListener("change", actualizarOpciones);

    // Función que sirve para calcular el costo total mediante AJAX
    async function calcularCosto() {
        const formData = new FormData();
        formData.append('plan_base', planBase.value);
        formData.append('paquetes', Array.from(paquetes).filter(p => p.checked).map(p => p.value));
        formData.append('duracion', periodo.value);

        try {
            const response = await fetch('../api/calculate_cost.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            if (data.costo_total) {
                costoTotalElement.textContent = `€${data.costo_total.toFixed(2)}`;
            }
        } catch (error) {
            console.error("Error al calcular el costo: ", error);
        }
    }

    // Calcular el costo cada vez que cambie alguna opción
    planBase.addEventListener("change", calcularCosto);
    edad.addEventListener("input", calcularCosto);
    periodo.addEventListener("change", calcularCosto);
    paquetes.forEach(paquete => paquete.addEventListener("change", calcularCosto));

    // Llamada inicial para calcular el costo
    calcularCosto();
});
