<?php
include "./Modelo/conexion.php";
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
if (!preg_match($emailRegex, $username)) {
    echo '<script>window.alert("Error al iniciar sesión!")</script>';
    echo '<script>window.location="login.php"</script>';
    exit(); // Salir del script si el correo no tiene el formato correcto
}

$username = $conexion->real_escape_string($username);

// Verificar si el correo existe en la base de datos
$query = "SELECT email, password FROM user WHERE email = '$username';";
$result = $conexion->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $hash_almacenado = $row['password'];

    $id_user = $row['id'];

    // Verificar si la contraseña ingresada coincide con el hash almacenado
    if (password_verify($password, $hash_almacenado)) {
        $_SESSION['id_user'] = $id_user;
        $_SESSION['email_user'] = $username;
        echo '<script>window.location="crud.php"</script>';
        exit(); // Salir del script si la contraseña es correcta
    } else {
        echo '<script>window.alert("Error al iniciar sesión!")</script>';
        echo '<script>window.location="login.php"</script>';
        exit(); // Salir del script si la contraseña no coincide
    }
} else {
    echo '<script>window.alert("Error al iniciar sesión!")</script>';
    echo '<script>window.location="login.php"</script>';
    exit(); // Salir del script si el correo no existe en la base de datos
}
?>
