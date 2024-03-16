<?php

if(!empty($_POST["btn-registro"])){
    if(!empty($_POST["fullname"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["enabled"]) and !empty($_POST["role_id"])){
        
        $id=$_POST["id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $enabled = $_POST["enabled"];
        $role_id = $_POST["role_id"];

        //Encriptar contraseña

        $encriptar = password_hash($password,PASSWORD_DEFAULT);

        $sql = $conexion->query("UPDATE user SET fullname='$fullname',email='$email',password='$encriptar',enabled='$enabled',role_id='$role_id' WHERE id='$id'");

        if($sql == 1){
            // header("location:../crud.php");
            echo '<script>window.location="../crud.php"</script>';
        } else {
            echo '<div class="alert alert-danger">Error al Modificar los Datos</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Campos Vacios</div>';
    }
}

?>