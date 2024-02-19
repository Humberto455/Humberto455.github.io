// Validar Registro
function validarRegistro(){
    var usuario = document.querySelector("#usuarioRegistro").value;
    var password = document.querySelector("#passwordRegistro").value;
    var email = document.querySelector("#emailRegistro").value;
    var terminos = document.querySelector("#terminos").checked;

    // Validar Usuario
    if(usuario != ""){
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 6){
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
            return false;
        }

        if(!expresion.test(usuario)){
            document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }

    // Validar Contraseña
    if(password != ""){
        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres < 6){
            document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Escriba por favor mas de 6 caracteres.";
            return false;
        }

        if(!expresion.test(password)){
            document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>No escriba caracteres especiales.";
            return false;
        }
    }

    // Validar Email
    if(email != ""){
        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if(!expresion.test(email)){
            document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Escriba correctamente el email.";
            return false;
        }
    }

    // Validar Terminos
    if(!terminos){
        document.querySelector("form").innerHTML += "<br>Por favor Aceptar Terminos y Condiciones..!.";

        // Datos
        document.querySelector("#usuarioRegistro").value = usuario;
        document.querySelector("#passwordRegistro").value = password;
        document.querySelector("#emailRegistro").value = email;
        return false;
    }

    return true;
}