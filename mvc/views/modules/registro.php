<form method="post" onsubmit="return validarRegistro()" class="form_reg">
    <h1>REGISTRO DE USUARIO</h1>

    <label for="usuarioRegistro">Usuario:</label><br>
    <input type="text" placeholder="Maximo 6 caracteres" maxlength="6" name="usuarioRegistro" id="usuarioRegistro" required><br><br>

    <label for="passwordRegistro">Contraseña:</label><br>
    <input type="password" placeholder="Minimo 6 caracteres, incluir numero(s) y una mayuscula" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required><br><br>

    <label for="emailRegistro">Email:</label><br>
    <input type="email" placeholder="Ingrese correctamente su correo electronico" name="emailRegistro" id="emailRegistro" required><br><br>

    <p style="text-align: center;"><input type="checkbox" id="terminos"><br><a href="#">Acepta terminos y condiciones</a></p>

    <input type="submit" value="Enviar">
</form>

<?php
    $registro = new MvcController();
    $registro -> registroUsuarioController();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "ok") {
            echo "Registro Exitoso..!";
        }
    }
?>