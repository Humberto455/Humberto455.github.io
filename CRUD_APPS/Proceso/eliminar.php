<?php
    include "../Modelo/conexion.php";
   $id=$_GET["id"];
   $sql=$conexion->query("SELECT * FROM user WHERE id=$id")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9bf893eeb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center secondary"></h3>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
        <?php
            include "../Controlador/eliminar_persona.php";
            include "../Modelo/conexion.php";

            $sql=$conexion->query("SELECT * FROM user WHERE id=$id");
            while($datos = $sql->fetch_object()){
        ?>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">¿Estas Seguro de Eliminar a: <?=$datos->fullname?>?</label>
            </div>
            <?php } ?>

            <button type="submit" class="btn btn-primary" name="btn-cancelar" value="OK">Cancelar</button>
            <button type="submit" class="btn btn-small btn-danger" name="btn-registro" value="OK">Eliminar</button>
    </form>
</body>
</html>