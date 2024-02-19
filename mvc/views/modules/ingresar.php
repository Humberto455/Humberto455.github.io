<form method="post" onsubmit="return validarIngreso()" class="form_reg">
    <h1>INGRESAR</h1>

    <label for="usuarioIngreso">Usuario:</label><br>
    <input type="text" placeholder="Maximo 6 caracteres" maxlength="6" name="usuarioIngreso" id="usuarioIngreso" required><br><br>

    <label for="passwordIngreso">Contraseña:</label><br>
    <input type="password" placeholder="Minimo 6 caracteres, incluir numero(s) y una mayuscula" name="passwordIngreso" id="passwordIngreso" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required><br><br>

    <input type="submit" value="Enviar">
</form>

<?php
    $ingreso = new MvcController();
    $ingreso -> ingresoUsuarioController();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "fallo") {
            echo "Fallo al Ingresar...!";
        }
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "fallo3intentos") {
            echo "ha fallado 3 veces para ingresar, favor llenar el captcha";
        }
    }
?>