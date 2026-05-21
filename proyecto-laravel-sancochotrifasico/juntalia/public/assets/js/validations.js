document.addEventListener("DOMContentLoaded", function () {
    
    
    const forms = document.querySelectorAll("form");

    // ✅ Establecer la fecha y hora mínima en los campos
    const today = new Date();
    const formattedDate = today.toISOString().split("T")[0]; // Formato YYYY-MM-DD

    document.querySelectorAll('input[type="date"]').forEach(input => {
        input.setAttribute("min", formattedDate);
    });

    document.querySelectorAll('input[type="datetime-local"]').forEach(input => {
        const formattedDateTime = today.toISOString().slice(0, 16); // Formato YYYY-MM-DDTHH:MM
        input.setAttribute("min", formattedDateTime);
    });

    forms.forEach((form) => {
        form.addEventListener("submit", function (event) {
            let isValid = true;
            let errorMessages = [];

            // Seleccionar todos los inputs dentro del formulario
            const inputs = form.querySelectorAll("input, select, textarea");

            inputs.forEach((input) => {
                const value = input.value.trim();
                const fieldName = input.getAttribute("name") ? input.getAttribute("name") : "Este campo";

                // Validar campos vacíos
                if (input.hasAttribute("required") && value === "") {
                    isValid = false;
                    errorMessages.push(`El campo "${fieldName}" no puede estar vacío.`);
                }

                // Validar email
                if (input.type === "email" && value !== "" && !/^\S+@\S+\.\S+$/.test(value)) {
                    isValid = false;
                    errorMessages.push(`El campo "${fieldName}" debe ser un correo válido.`);
                }

                // Validar números
                if (input.type === "number" && value !== "" && isNaN(value)) {
                    isValid = false;
                    errorMessages.push(`El campo "${fieldName}" debe ser un número.`);
                }

                 // Validar fechas y fechas-horas (deben ser futuras)
                 if ((input.type === "date" || input.type === "datetime-local") && value !== "") {
                    // Utilizamos valueAsNumber para obtener el timestamp (milisegundos)
                    const selectedTimestamp = input.valueAsNumber;
                    const currentTimestamp = Date.now();
                    if (selectedTimestamp <= currentTimestamp) {
                        isValid = false;
                        errorMessages.push(`El campo "${fieldName}" debe ser una fecha futura.`);
                    }
                }

                // Validar contraseñas (mínimo 6 caracteres)
                if (input.type === "password" && value !== "" && value.length < 6) {
                    isValid = false;
                    errorMessages.push(`El campo "${fieldName}" debe tener al menos 6 caracteres.`);
                }
            });

            // Verificar confirmación de contraseña (si existen ambos campos)
            const passwordField = form.querySelector('input[name="password"]');
            const passwordConfirmField = form.querySelector('input[name="password_confirmation"]');
            if (passwordField && passwordConfirmField && passwordField.value.trim() !== passwordConfirmField.value.trim()){
                isValid = false;
                errorMessages.push("Las contraseñas no coinciden.");
            }
            
            // Verificar confirmación de teléfono (si existen ambos campos)
            const phoneField = form.querySelector('input[name="phone"]');
            const phoneConfirmField = form.querySelector('input[name="phone_confirmation"]');
            if (phoneField && phoneConfirmField && phoneField.value.trim() !== phoneConfirmField.value.trim()){
                isValid = false;
                errorMessages.push("Los teléfonos no coinciden.");
            }


            // Mostrar errores si existen y evitar el envío del formulario
            if (!isValid) {
                event.preventDefault();
                let errorContainer = form.querySelector(".error-messages");
                if (!errorContainer) {
                    errorContainer = document.createElement("div");
                    errorContainer.classList.add("error-messages");
                    errorContainer.style.color = "red";
                    errorContainer.style.marginTop = "10px";
                    form.insertBefore(errorContainer, form.firstChild);
                }
                errorContainer.innerHTML = errorMessages.join("<br>");
            }
        });
    });
});


