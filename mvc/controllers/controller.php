<?php
session_start();
    class MvcController
    {
        public function pagina(){
            include "views/template.php";
        }

        public function enlacesPaginasController(){
            if (isset($_GET['action'])) {
                $enlaces = $_GET['action'];
            } else {
                $enlaces = "index";
            }

            $respuesta = Paginas::enlacesPaginasModel($enlaces);

            include $respuesta;
        }

        // Registro de Usuarios

        public function registroUsuarioController(){
            if (isset($_POST['usuarioRegistro'])) {

                if(preg_match('/^[a-zA-Z0-9]*$/',$_POST["usuarioRegistro"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordRegistro"]) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$_POST["emailRegistro"])){

                    $encriptar = crypt($_POST["passwordRegistro"],'$2a$07$usesomesillystringforsalt$');

                    $datosController = array("usuario"=>$_POST['usuarioRegistro'], "password"=>$encriptar, "email"=>$_POST['emailRegistro']);

                    $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");
        
                    if($respuesta == "succes"){
                        // header("location:ok");
                        echo '<script>window.location="ok"</script>';
                    } else{
                        // header("location:index.php");
                        echo '<script>window.location="index.php"</script>';
                    }
                }
            }
        }

        // Ingreso de usuario

        public function ingresoUsuarioController(){
            if (isset($_POST['usuarioIngreso'])) {

                if(preg_match('/^[a-zA-Z0-9]*$/',$_POST["usuarioIngreso"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordIngreso"])){

                    $encriptar = crypt($_POST["passwordIngreso"],'$2a$07$usesomesillystringforsalt$');

                    $datosController = array("usuario"=>$_POST['usuarioIngreso'], "password"=>$encriptar);

                    $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

                    $intentos = $respuesta["intentos"];
                    $usuario = $_POST["usuarioIngreso"];
                    $maximoIntentos = 2;

                    if($intentos < $maximoIntentos){
        
                        if($respuesta['usuario'] == $_POST['usuarioIngreso'] && $respuesta['password'] == $encriptar){
                            
                            // session_start();
                            $_SESSION['validar'] =true;

                            $intentos = 0;

                            $datosController = array("usuarioActual"=>$usuario,"actualizarIntentos"=>$intentos);

                            $respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");

                            // header("location:usuarios");
                            echo '<script>window.location="usuarios"</script>';
                        } else{

                            ++$intentos;

                            $datosController = array("usuarioActual"=>$usuario,"actualizarIntentos"=>$intentos);

                            $respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");

                            // header("location:fallo");
                            echo '<script>window.location="fallo"</script>';
                        }
                    } else {
                        $intentos = 0;

                        $datosController = array("usuarioActual"=>$usuario,"actualizarIntentos"=>$intentos);

                        $respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");

                        // header("location:fallo3intentos");
                        echo '<script>window.location="fallo3intentos"</script>';
                    }
                }
            }
        }

        // Vista de Usuarios
        public function vistaUsuariosController(){
            $respuesta = Datos::vistaUsuariosModel("usuarios");

            foreach($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item['usuario'].'</td>
                    <td>'.$item['password'].'</td>
                    <td>'.$item['email'].'</td>
                    <td><a href="index.php?action=editar&id='.$item['id'].'"><button>Editar</button></a></td>
                    <td><a href="index.php?action=usuarios&idBorrar='.$item['id'].'"><button>Borrar</button></a></td>    
                 </tr>';
            }
        }

        // Editar Usuario
        public function editarUsuarioController(){
            $datosController = $_GET['id'];

            $respuesta = Datos::editarUsuarioModel($datosController,"usuarios");

            echo '<input type="hidden" name="idEditar" value='.$respuesta["id"].'>
            
            <label for="usuarioEditar">Usuario:</label><br>
            <input type="text" value='.$respuesta['usuario'].' maxlength="6" name="usuarioEditar" id="usuarioEditar" required><br><br>
        
            <label for="passwordEditar">Contraseña:</label><br>
            <input type="text" value='.$respuesta['password'].' name="passwordEditar" id="passwordEditar" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required><br><br>
        
            <label for="emailEditar">Email:</label><br>
            <input type="email" value='.$respuesta['email'].' name="emailEditar" id="emailEditar" required><br><br>
        
            <p style="text-align: center;"><input type="checkbox" id="terminosEditar"><br><a href="#">Acepta terminos y condiciones</a></p>
        
            <input type="submit" value="Actualizar">';
        }

        // Actualizar usuario
        public function actualizarUsuarioController(){
           if (isset($_POST["usuarioEditar"])) {

                if(preg_match('/^[a-zA-Z0-9]*$/',$_POST["usuarioEditar"]) && preg_match('/^[a-zA-Z0-9]*$/',$_POST["passwordEditar"]) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$_POST["emailEditar"])){

                    $encriptar = crypt($_POST["passwordEditar"],'$2a$07$usesomesillystringforsalt$');

                    $datosController = array("id"=>$_POST["idEditar"],"usuario"=>$_POST["usuarioEditar"], "password"=>$encriptar, "email"=>$_POST["emailEditar"]);

                    $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

                    if ($respuesta == "success") {
                        // header("location:cambio");
                        echo '<script>window.location="cambio"</script>';
                    } else {
                        echo "erro";
                    }
                }
           }
        }

        // Eliminar Usuario
        public function borrarUsuarioController(){
            if(isset($_GET['idBorrar'])){
                $datosController = $_GET['idBorrar'];
                $respuesta = Datos::borrarUsuarioModel($datosController,"usuarios");

                if ($respuesta == "success") {
                    // header("location:usuarios");
                    echo '<script>window.location="usuarios"</script>';
                }
            }
        }

    }
