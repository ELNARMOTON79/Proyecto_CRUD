<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All Login</title>
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles/logins.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center" style="background-image: url('../SRC/fondo.jpg');">

    <div class="Fondo relative">
       <!-- Icono de casa y tacha -->
       <div class="absolute top-0 right-0 mt-2 mr-2 flex space-x-4">
           <!-- Icono de casa -->
           <a href="../index.php" class="text-green-600 hover:text-green-800">
               <i class="fas fa-home fa-lg"> </i>
               
           </a>
       </div>
       <!-- Formulario de login -->
       <form action="#" method="POST">
           <h1>Login</h1>

           <div class="contenedor">
               <input type="text" name="email" placeholder="E-mail" required>
           </div>

           <div class="contenedor">
               <input type="password" name="password" placeholder="Password" required>
           </div>

           <div class="mt-4 flex items-center">
               <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-green-500">
               <label for="terms" class="ml-2 text-gray-700">I accept the <a href="#" class="text-green-500 underline">Terms and Conditions</a></label>
           </div>

           <div class="Recordar">
               <a href="#">Forgot your password?</a>
           </div>

           <button type="submit" name="login" class="btn">Login</button>

           <div class="Registro-enlaces">
               <p>Don't you have an account? <a href="../joinus.php">Create account</a></p>
           </div>

       </form> 
    </div>
    
</body>
</html>

<?php
    include('login_var.php');
?>
