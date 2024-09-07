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

    <div class="Fondo relative">
       <a href="../index.php" class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
           </svg>
       </a>

       <form action="#" method="POST">
        <h1>Login</h1>

        <div class="contenedor">
            <input type="text" name="user" placeholder="User" required>
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
    include 'login_var.php';
?>