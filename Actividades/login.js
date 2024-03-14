document.addEventListener('DOMContentLoaded', function(){
    var form = document.getElementById('myForm');
    var errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function(event){
        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

        var inputEmail = document.getElementById('email').value;
        var inputPassword = document.getElementById('password').value;

        // Validación de mínimo 8 caracteres en password
        if (inputPassword.length < 8) {
            errorMessage.textContent = "Error: La contraseña debe tener al menos 8 caracteres.";
            return;
        }

        // Validación de correo con expresión regular
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(inputEmail)) {
            errorMessage.textContent = "Error: El formato del correo electrónico es inválido.";
            return;
        }

        // Si llegamos aquí, los datos son válidos
        errorMessage.textContent = ""; // Limpiar mensajes de error previos
        console.log("Datos válidos. Email:", inputEmail, "Password:", inputPassword);

        // Aquí puedes realizar cualquier acción adicional, como enviar el formulario.
    });

});
