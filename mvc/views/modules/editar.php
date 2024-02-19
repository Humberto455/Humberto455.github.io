<?php
    // session_start();
    if(empty(session_id()) && !headers_sent()){
        session_start();

        echo '<script>window.location="ingresar"</script>';
    }

    if(!$_SESSION['validar']){
        // header("location:ingresar");
        echo '<script>window.location="ingresar"</script>';
        exit();
    }
?>


<form method="post" onsubmit="return validarCambio()" class="form_reg">
    <h1>EDITAR USUARIO</h1>

        <?php
            $editarUsuario = new MvcController();
            $editarUsuario -> editarUsuarioController();
            $editarUsuario -> actualizarUsuarioController();
        ?>  
    
</form>

