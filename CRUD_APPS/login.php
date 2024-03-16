<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css" /> 
</head>
<body>

<form action="validate.php" method="POST" id='myForm'>
  <div class="imgcontainer">
    <img src="./images/user.png" alt="User" class="user" width="200" height="200">
  </div>

  <div class="container">
    <label><b>Usuario</b></label>
    <input type="text" placeholder="Ingresar Usuario" name="username" id="username" required>

    <label><b>Contraseña</b></label>
    <input type="password" placeholder="Ingresar Contraseña" name="password" id="password" required>
        
    <button type="submit" name="submit">Acceder</button>

  </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function(){
      var form = document.getElementById('myForm');

      form.addEventListener('submit', function(event){
        // event.preventDefault(); // Evitar que el formulario se envíe automáticamente

        var inputEmail = document.getElementById('username').value;
        var inputPassword = document.getElementById('password').value;

        // Validación de correo con expresión regular
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(inputEmail)) {
          alert("Error: El formato del correo electrónico es inválido.");
          event.preventDefault();
        }

        // Validación de mínimo 8 caracteres en password
        if (inputPassword.length < 8) {
          alert("Error: La contraseña debe tener al menos 8 caracteres.");
          event.preventDefault();
        }

        event.submit();
      });

    });
</script>

</body>
</html>
