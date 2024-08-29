<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All Login</title>
    <link rel="stylesheet" href="../styles/logins.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center" style="background-image: url('../SRC/fondo.jpg');">

    <div class="Fondo">
       <form action="#">
        <h1>Login</h1>

        <div class="contenedor">
            <input type="text" placeholder="Usuario" required>
        </div>

       <div class="contenedor">
        <input type="password" placeholder="Contraseña" required>
       </div> 

       <div class="Recordar">
        <label for="#"><input type="checkbox">Recordar Inicio</label>
        <a href="#">¿Olvidaste la contraseña?</a>
       </div>

       <button type="submit" class="btn">Registrar</button>

       <div class="Registro-enlaces">
        <p>¿No tienes cuenta? <a href="../joinus.php">Crear cuenta</a></p>
       </div>

       </form> 
    </div>
    
</body>
</html>