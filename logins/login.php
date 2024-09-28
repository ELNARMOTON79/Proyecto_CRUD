<?php
    session_start();
    include 'login_var.php';
?>

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
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="relative bg-cover bg-center h-screen w-full" style="background-image: url('../SRC/EDU4ALL.png');">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
                <!-- Mover el icono de la casa aquí, fuera del formulario -->
                <div class="absolute top-0 right-0 mt-2 mr-2 flex space-x-4">
                    <!-- Icono de casita en color verde -->
                    <a href="../index.php" class="text-green-500 hover:text-green-700">
                        <i class="fas fa-home fa-lg"></i>
                    </a>
                </div>
                <a class="logo flex items-center text-2xl font-bold mb-6 text-center text-green-600">
                <img src="../SRC/logoblanco.png" class="w-17 h-14 mr-3" alt="logo">
                Login

                </a>
                <!-- Formulario con método POST para PHP -->
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="E-mail" required>
                    </div>
                    <div class="mb-6 relative">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password" required>
                        <!-- Icono de mostrar/ocultar contraseña -->
                        <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password" style="position:absolute; right: 10px; top: 40px; cursor: pointer;"></span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <a class="inline-block align-baseline font-bold text-sm text-green-600 hover:text-green-800" href="#">
                            Forgot your password?
                        </a>
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                            Login
                        </button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <p class="text-gray-600 text-sm">Don't you have an account? <a href="../joinus.php" class="text-green-600 font-bold hover:underline">Create account</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script para mostrar/ocultar la contraseña
        document.querySelector('.toggle-password').addEventListener('click', function (e) {
            const passwordField = document.querySelector('#password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    </script>
</body>
</html>
