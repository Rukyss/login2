<!-- 
Sesiones:
Las sesiones son una forma de almacenar datos del usuario en el servidor web durante un tiempo determinado. 
Cuando un usuario visita un sitio web, se le asigna un identificador único (ID de sesión) que se utiliza para asociar 
y mantener los datos específicos de ese usuario mientras navega por el sitio. Estos datos pueden incluir información de 
inicio de sesión, preferencias del usuario, carritos de compras, entre otros. 

Cookies:
Las cookies son pequeños archivos de texto almacenados en el navegador del usuario. Estos archivos contienen información 
como preferencias del usuario, información de inicio de sesión y datos de seguimiento. Las cookies se utilizan para recordar 
la información del usuario en visitas posteriores al sitio web.

Mi Proyecto:
En mi proyecto, he utilizado sesiones para mantener la información de inicio de sesión del usuario, lo que me permite 
verificar y controlar el acceso a ciertas áreas del sitio web. Además, las sesiones son ideales para almacenar temporalmente 
datos específicos del usuario mientras navega por el sitio, lo que ayuda a proporcionar una experiencia personalizada y segura.
-->



<?php
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "1234") {
        $_SESSION["username"] = $username;
        $_SESSION["rol"] = "admin";
        header("Location: correcto.php");
        exit();
    }elseif ($username === "cliente1" && $password === "3333"){
        $_SESSION["username"] = $username;
        $_SESSION["rol"] = "cliente1";
        header("Location: correcto.php");
        exit();
    }
    else {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *,*:before,*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 830px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -20px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 480px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.exit-button {
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}

</style>

    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="post">
        <h3>Admin Login</h3>

        <label for="username">Nombre de Usuario</label>
        <input type="text" placeholder="Usuario" name="username">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Password" name="password">

        <button>Log In</button>
    </form>
</body>
</html>
