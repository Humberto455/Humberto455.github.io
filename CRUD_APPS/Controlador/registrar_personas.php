<?php

if(!empty($_POST["btn-registro"])){
    if(!empty($_POST["fullname"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["role_id"])){

        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role_id = $_POST["role_id"];

        //Encriptar contraseña

        $encriptar = password_hash($password,PASSWORD_DEFAULT);

        $sql = $conexion->query("INSERT INTO user(fullname,email,password,enabled,role_id) VALUES('$fullname','$email','$encriptar',1,'$role_id')");

        if($sql == 1){
            echo '<div class="alert alert-success">Persona Registrada Exitosamente!</div>';
        } else {
            echo '<div class="alert alert-danger">Error Registrada Persona No Registrada.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">ALGUN DATO NO FUE INGRESADO</div>';
    }
}
?>