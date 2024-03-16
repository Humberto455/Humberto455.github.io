<?php

if(!empty($_POST["btn-registro"])){
    if(!empty($_POST["id"])){
        
        $id=$_POST["id"];

        $sql = $conexion->query("DELETE FROM user WHERE id=$id");

        if($sql == 1){
            // header("location:../crud.php");
            echo '<script>window.location="../crud.php"</script>';
        } else {
            echo '<div class="alert alert-danger">Error al Eliminar los Datos</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Algo salio mal</div>';
    }
}else if(!empty($_POST["btn-cancelar"])){
    // header("location:../crud.php");
    echo '<script>window.location="../crud.php"</script>';
}

?>