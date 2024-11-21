<?php
    if (isset($_GET['code'])) {
        $codigo = htmlspecialchars($_GET['code']);
        //echo $codigo;
        //verificar codigo con la base de datos
        include_once '../Conexion/contacto.php';
        $obj = new Contacto();
        $id = $obj->checkCode($codigo);

        if ($id == null) {
            //echo "Codigo no valido";
            header("Location: ../index.php");
        }else{
            //echo "Codigo valido";
        }
    }
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

                <form method="post">
                    <div class="mb-5">
                        <label for="password" class="block text-lg font-semibold text-secondary">New Password</label>
                        <input type="password" name="password" id="password" class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="New Password" required>
                    </div>
                    <input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="reset">
                        Recovery Password
                    </button>
                    <?php
                        if (isset($_POST['reset'])) {
                            include("procesar_resetpassword.php");
                        }
                    ?>
                </form>
            </div>

        </div>
    </div>
</body>
</html>