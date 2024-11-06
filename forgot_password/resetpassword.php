<?php
    include_once("../Conexion/contacto.php");
    
    if(isset($_GET['code']))
    {
        $codigo = htmlspecialchars($_GET['code']);
        $obj = new Contacto();
        $user_code= $result = $obj->checkCode($codigo);

        if (!$user_code) {
            header("Location: ../index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="relative bg-cover bg-center h-screen w-full" style="background-image: url('../SRC/carrucel/12.png');">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
                <div class="flex justify-between items-center mb-6">
                    <!-- Logo y texto centrados -->
                    <div class="logo flex items-center text-2xl font-bold text-green-600">
                        <img src="../SRC/logoblanco.png" class="w-17 h-14 mr-3" alt="logo">
                        Enter your new password
                    </div>
                    <!-- Icono de casita alineado a la derecha -->
                    <a href="../index.php" class="text-green-500 hover:text-green-700">
                        <i class="fas fa-home fa-lg"></i>
                    </a>
                </div>

                <!-- Formulario con método POST para PHP -->
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" type="email" placeholder="Password" required>
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                            Send Mail
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>