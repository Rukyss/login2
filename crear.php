<?php
session_start();

// Verifica si no está establecido el valor de "username" en la sesión.
if (!isset($_SESSION["username"])) {
    // Redirige a la página "correcto.php" si no hay un usuario autenticado.
    header("Location: correcto.php");
    exit(); 
}

// Verifica si el usuario autenticado es "admin".
if ($_SESSION["username"] === "admin") {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        // Obtiene los datos del formulario POST: contenido, nombre del archivo y permisos.
        $contenido = $_POST["contenido"];
        $nombreArchivo = $_POST["nombre_archivo"];
        $permisos = $_POST["permisos"];

        // Crea el nombre del archivo con la extensión ".txt".
        $archivo = $nombreArchivo . '.txt';

        // Intenta escribir el contenido en el archivo y establece los permisos.
        if (file_put_contents($archivo, $contenido, LOCK_EX) !== false) {
            // Muestra un mensaje si el archivo se creó y escribió correctamente.
            echo 'El archivo se ha creado y escrito correctamente.<br>';
            
            // Intenta actualizar los permisos del archivo y muestra el resultado.
            if (chmod($archivo, octdec($permisos))) {
                echo 'Los permisos del archivo se han actualizado correctamente.';
            } else {
                echo 'No se pudieron actualizar los permisos del archivo.';
            }
        } else {
            // Muestra un mensaje si no se pudo crear o escribir en el archivo.
            echo 'No se pudo crear o escribir en el archivo.';
        }
    }
} else {
    // Redirige a la página "correcto.php" si el usuario autenticado no es "admin".
    header("Location: correcto.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

    <style>
        *,*:before,*:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 830px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(
                #1845ad,
                #23a2f6
            );
            left: -80px;
            top: -80px;
        }

        .shape:last-child {
            background: linear-gradient(
                to right,
                #ff512f,
                #f09819
            );
            right: -30px;
            bottom: -80px;
        }

        form {
          
        }


        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 40px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social i {
            margin-right: 4px;
        }
        #cajita {
            height: 640px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        #cajita  * {
            font-family: 'Poppins', sans-serif;
            color: black;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        #cajita h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: white;
        }
        #letracaja{
            color:white;
        }
        #rutac{
            color:white;
            text-align:center;
        }
        #etiquetac{
            color:white;
        }
        #nombre_archivo{
            color:white;
        }
        #contenido{
            color:white;
        }
        #permisos{
            color:white;
        }

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
        <div id="cajita">
                <h3>Admin Login</h3>
                <br>
                <div>
                <br>
                    </div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label id="permisos"  for="nombre_archivo">Nombre del archivo:</label>
                        <input type="text" id="nombre_archivo" name="nombre_archivo" placeholder="Nombre del archivo">

                        <label id="permisos"  for="contenido">Contenido:</label>
                        <input type="text" id="contenido" name="contenido" placeholder="Escribe el contenido aquí">

                        <label id="permisos" for="permisos">Permisos:</label>
                        <input type="text" id="permisos" name="permisos" placeholder="Octal (0644)">

                        <button type="submit">Crear y Escribir en el Archivo</button>
                    </form>
        </div>
</body>
</html>
