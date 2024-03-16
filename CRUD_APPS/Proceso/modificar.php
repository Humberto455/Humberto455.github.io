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
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9bf893eeb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center secondary">Modificar Datos Personales</h3>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
        <?php
            include "../Controlador/modificar_datos.php";
            include "../Modelo/conexion.php";

            $sql=$conexion->query("SELECT * FROM user WHERE id=$id");
            while($datos = $sql->fetch_object()){
        ?>

            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Fullname</label>
                <input type="text" class="form-control" name="fullname" value="<?=$datos->fullname?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$datos->email?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="<?=$datos->password?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Enabled</label>
                <input type="text" class="form-control" name="enabled" value="<?=$datos->enabled?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Role</label>
                <input type="text" class="form-control" name="role_id" value="<?=$datos->role_id?>">
            </div>
            <?php } ?>

            <button type="submit" class="btn btn-primary" name="btn-registro" value="OK">Modificar Datos</button>
    </form>
</body>
</html>