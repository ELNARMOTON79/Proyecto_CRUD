<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../styles/logins.css">
    <link rel="icon" href="../SRC/EDU4ALL..png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-green-100">
    <div class="relative bg-cover bg-center h-screen w-full" style="background-image: url('../SRC/carrucel/12.png');">
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-8 w-96 relative">
                <div class="flex justify-between items-center mb-6">
                    <!-- Logo y texto centrados -->
                    <div class="logo flex items-center text-2xl font-bold text-green-600">
                        <img src="../SRC/logoblanco.png" class="w-17 h-14 mr-3" alt="logo">
                        Recovery Password
                    </div>
                    <!-- Icono de casita alineado a la derecha -->
                    <a href="../index.php" class="text-green-500 hover:text-green-700">
                        <i class="fas fa-home fa-lg"></i>
                    </a>
                </div>

                <!-- Formulario con método POST para PHP -->
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="E-mail" required>
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="reset">
                            Send Mail
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
<?php
    $mostrarExito = false;
    if (isset($_POST['reset'])) {
        $email = $_POST['email'];
        // Verificar si el correo existe en la base de datos
        include_once '../Conexion/contacto.php';
        $obj = new Contacto();
        $correo = $obj->forgotPassword($email);
    
        if ($correo == null) {
            echo "<script>alert('Correo no encontrado');</script>";
        } else {
            // Imprime el correo
            // echo "<script>alert('Correo encontrado');</script>";
            // Generar un código aleatorio
            include 'crearcod.php';
            $codigo = codigo_aleatorio();
            // Imprimir código
            // echo "<script>alert('Codigo: $codigo');</script>";
            //almacenar id en variable
            $nombreDeUsuario = $correo['nombre'];
            $id_user = $obj->obtenerIdPorCorreo($email)['id'];

            //echo "<script>alert('Id: $id');</script>";
            // Insertar código en la base de datos
            //Imprimir id y código y correo
            //echo "<script>alert('Id: $id, Codigo: $codigo, Correo: $email');</script>";
            $obj->insertarCodigo($codigo, $id_user);
            //Enviar por correo el codigo y el nombre de usuario
            include 'sendmail.php';
        }
    }
    
?>
<?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Mail Send Successfully</h2>
    </div>
    <script>
        // Mostrar el modal de éxito por 2 segundos
        setTimeout(function() {
            document.getElementById('modalExito').classList.add('hidden');
        }, 2000);
    </script>
</div>
<?php endif; ?>