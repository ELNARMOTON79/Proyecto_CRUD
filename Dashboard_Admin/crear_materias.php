<?php
session_start();
$tipo_materia = isset($_SESSION['tipo_materia']) ? $_SESSION['tipo_materia'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create matter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex-shrink-0 h-10 w-10 relative">
            <img class="ml-3 h-10 w-10 rounded-full translate-y-2"
                src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png"
                alt="">
        </div>

        <form action="" method="post" class="space-y-6">
            <div>
                <label for="nombre_actividad" class="block text-sm font-medium text-gray-700"> <br></br>
                    <i class="fa-solid fa-tasks mr-2"></i>Name matter
                </label>
                <input type="text" name="nombre_materia" id="nombre_materia" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>


            <div>
                <label for="objeive" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-calendar-alt mr-2"></i>objetive
                </label>
                <input type="text" name="objetive" id="activities" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="Unit" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-clock mr-2"></i>unit
                </label>
                <input type="number" name="unit" id="unit" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <input type="hidden" name="duracion" id="duracion">

            
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="window.location.href='http://localhost/Proyecto_CRUD/Dashboard_Admin/dashboard.php';"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition duration-500">
                    Cancel
                </button>
                <input type="submit" name="crear" value="Create matter" onclick="calcularDuracion()"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-500">
            </div>
        </form>

        <?php
        if (isset($_POST['crear'])) {
            $nombre_materia = $_POST['nombre_materia'];
            $objetivo = $_POST['objetive'];
            $unidad = $_POST['unit'];

            
            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $obj->crear_materias($nombre_materia, $objetivo, $unidad);

            echo "<p class='text-green-600 mt-4'>Create succesfully created.</p>";
        }
        ?>
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
</body>

</html>
