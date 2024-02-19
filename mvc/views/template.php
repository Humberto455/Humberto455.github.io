<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>

    <style>
        header{
            position: relative;
            margin: auto;
            text-align: center;
            padding: 5px;
        }

        nav{
            position: relative;
            margin: auto;
            width: 100%;
            height: auto;
            background: black;
        }

        nav ul{
            position: relative;
            margin: auto;
            width: 100%;
            text-align: center;
        }

        nav ul li{
            display: inline-block;
            width: 24%;
            line-height: 50px;
            list-style: none;
        }

        nav ul li a{
            color: white;
            text-decoration: none;
        }

        section{
            position: relative;
            padding: 20px;
        }

        /* Forms */
        .form_reg input{
            margin-top: 20px;
            width: 20%;
            padding: 15px;
        }

        .form_reg input#usuarioRegistro{
            text-transform: lowercase;
        }

        .form_reg input#usuarioIngreso{
            text-transform: lowercase;
        }

        .form_reg input#usuarioEditar{
            text-transform: lowercase;
        }

        .form_reg{
            display: block;
            align-items: center;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- <header>
        <h1>LOGOTIPO</h1>
    </header> -->

    <?php
        include "views/modules/navegacion.php";
    ?>

    <section>
        <?php
            $mvc = new MvcController;
            $mvc -> enlacesPaginasController();
        ?>
    </section>

    <script src="views/js/validarRegistro.js"></script>
    <script src="views/js/validarIngreso.js"></script>
    <script src="views/js/validarCambio.js"></script>
</body>
</html>