<?php
    include('./Proceso/sesion.php');
    Validar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto CRUD PHP</title>
    <!-- CSS only -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9bf893eeb9.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">Proyecto CRUD</h1>

    <a href="./Proceso/sesion.php?metodo=Cerrar"><button type="button" class="btn btn-danger" id="cerrar">Cerrar Sesion</button></a>

        <div class="container-fluid row">
            <form method="POST" class="col-4 p-3" id="myForm">
                <h3 class="text-center secondary">Registro Datos Personales</h3>
                <?php
                    include "./Modelo/conexion.php";
                    include "Controlador/registrar_personas.php";
                ?>
                <div class="mb-1">
                    <label for="exampleInputEmail" class="form-label">Fullname</label>
                    <input type="text" class="form-control" name="fullname" required>
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail" class="form-label">Role</label>
                    <input type="text" class="form-control" name="role_id">
                </div>
                    <button type="submit" class="btn btn-primary" name="btn-registro" value="OK">Registrar</button>
            </form>
                <div class="col-8 p-4">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                               <th scope="col">Id</th>
                               <th scope="col">Fullname</th>
                               <th scope="col">Email</th>
                               <th scope="col">Password</th>
                               <th scope="col">Created_at</th>
                               <th scope="col">Updated_at</th>
                               <th scope="col">Enabled</th>
                               <th scope="col">Role</th>
                               <th scope="col"></th>       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "Modelo/conexion.php";
                                $sql = $conexion -> query("Select * from user");
                                
                                while($datos = $sql->fetch_object()){?>
                                    <tr>
                                        <td><?= $datos->id ?></td>
                                        <td><?= $datos->fullname ?></td>
                                        <td><?= $datos->email ?></td>
                                        <td><?= $datos->password ?></td>
                                        <td><?= $datos->created_at ?></td>
                                        <td><?= $datos->updated_at ?></td>
                                        <td><?= $datos->enabled ?></td>
                                        <td><?= $datos->role_id ?></td>

                                        <td>
                                            <a href="./Proceso/modificar.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="./Proceso/eliminar.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                        </tbody>
                    </table>
                </div>
        </div>
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>