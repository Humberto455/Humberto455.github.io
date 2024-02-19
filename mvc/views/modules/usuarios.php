<?php
session_start();
// if(empty(session_id()) && !headers_sent()){
//     session_start();

//     echo '<script>window.location="ingresar"</script>';
// }

    if(!$_SESSION['validar']){
        // header("location:ingresar");
        echo '<script>window.location="ingresar"</script>';

        exit();
    }
?>

<table border="1">
    <h1>USUARIOS</h1>

    <thead>
        <tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    <?php
        $user = new MvcController();
        $user -> vistaUsuariosController();
        $user -> borrarUsuarioController();  
    ?>
    </tbody>
</table>

<?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "cambio") {
            echo "Cambio Exitoso...!";
        }
    }
?>

