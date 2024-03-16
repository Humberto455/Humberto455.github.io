<?php

    // Verificar si se recibió el parámetro 'metodo'
    if(isset($_GET['metodo'])) {
        // Obtener el valor del parámetro 'metodo'
        $metodo = $_GET['metodo'];

        // Según el valor del parámetro, ejecutar el método correspondiente
        if($metodo === 'Cerrar') {
            Cerrar();
        }
    }

    function Validar(){

        session_start();
        $email_user = $_SESSION['email_user'];

        if(!isset($_SESSION['id_user']) && !isset($_SESSION['email_user'])) {
            echo '<script>window.location="login.php"</script>';
        } else {

            include "./Modelo/conexion.php";

            // Verificar si el correo existe en la base de datos
            $query = "SELECT email FROM user WHERE email = '$email_user';";
            $result = $conexion->query($query);

            if ($result->num_rows == 1) {
                //validar que exista el usuario y comprobar el id 
                echo "Bienvenido, " . $_SESSION['email_user'];
            } else{
                echo '<script>window.location="login.php"</script>';
            }
        }

    };

    function Cerrar(){

        session_start();

        // Destruir la sesión
        session_destroy();

        // Redirigir al usuario a la página de inicio de sesión
        echo '<script>window.location="../home.php"</script>';

    };

?>