// Validar Editar
function validarCambio(){
    var usuario = document.querySelector("#usuarioEditar").value;
    var password = document.querySelector("#passwordEditar").value;
    var email = document.querySelector("#emailEditar").value;
    var terminos = document.querySelector("#terminosEditar").checked;

    // Validar Usuario
    if(usuario != ""){
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 6){
            document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
            return false;
        }

        if(!expresion.test(usuario)){
            document.querySelector("label[for='usuarioEditar']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }

    // Validar Contraseña
    if(password != ""){
        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres < 6){
            document.querySelector("label[for='passwordEditar']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
            return false;
        }

        if(!expresion.test(password)){
            document.querySelector("label[for='passwordEditar']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }

    // Validar Email
    if(email != ""){
        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(!expresion.test(email)){
            document.querySelector("label[for='emailEditar']").innerHTML += "<br>Escriba correctamente el email.";
            return false;
        }
    }

    // Validar Terminos
    if(!terminos){
        document.querySelector("form").innerHTML += "<br>Por favor Aceptar Terminos y Condiciones..!.";

        // Datos
        document.querySelector("#usuarioEditar").value = usuario;
        document.querySelector("#passwordEditar").value = password;
        document.querySelector("#emailEditar").value = email;
        return false;
    }

    return true;
}