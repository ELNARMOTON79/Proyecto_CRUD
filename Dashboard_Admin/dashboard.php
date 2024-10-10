<?php
    include 'manejo_sesiones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../SRC/EDU4ALL..png"  class="w-25 h-17 mr-2">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>
<body>
    <div class="flex flex-row">
        <!-- Aqui va el menu -->
        <?php
            include 'menu.php';
        ?>
        <main class="flex-1 p-6">
            <?php
                if ((!$showForm0 && !$showForm1 && !$showForm2 && !$showForm3 && !$showForm4 && !$showForm5 && !$showForm6 && !$showForm7 && !$showForm8 && !$showForm9 && !$showForm10 && !$showForm11 && !$showForm12) || $showForm0):
                    include 'mensaje_bienvenida.php';
                endif;

                if ($showForm1):
                    include 'crear_usuario.php';
                endif;

                if ($showForm3):
                    include 'listausuarios.php';
                endif;

                if ($showForm5):
                    include 'crear_actividades.php';
                endif;

                if ($showForm6):
                    include 'listaractividades.php';
                endif;

                if ($showForm9):
                    include 'crear_materias.php';
                endif;

<<<<<<< HEAD
                <!-- Sección Desplegable - Actividades -->
                <div class="p-2 hover:bg-green-700 text-white rounded-md transition duration-500 ease-in-out">
                    <button id="toggleActividades" class="flex flex-row space-x-3 w-full focus:outline-none">
                        <span class="text-white hover:text-black ">
                            <i class="fa-solid fa-bookmark"></i>
                            Activities
                        </span>
                    </button>
                    <div id="submenuActividades" class="ml-6 mt-2 hidden">
                        <a href="crear_actividades.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-pen"></i>
                            Create activities</a>
                        <a href="#" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-clipboard-list"></i>
                            List activities
                        </a>
                        <a href="modificar_actividades.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-sharp fa-solid fa-gears"></i>
                            Modify activities
                        </a>
                        <a href="eliminaractividad.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-trash-can"></i>
                            Delete activities
                        </a>
                    </div>
                </div>
                <div class="p-2 hover:bg-green-700 text-white rounded-md transition duration-500 ease-in-out">
                    <button id="toggleMaterias" class="flex flex-row space-x-3 w-full focus:outline-none">
                        <span class="text-white hover:text-black ">
                        <i class="fa-solid fa-book"></i>
                            Subjects
                        </span>
                    </button>
                    <div id="submenuMaterias" class="ml-6 mt-2 hidden">
                        <a href="#" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-pen"></i>
                            Create Subjects</a>
                        <a href="listarmaterias.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-clipboard-list"></i>
                            List Subject
                        </a>
                        <a href="#" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-sharp fa-solid fa-gears"></i>
                            Modify Subject
                        </a>
                        <a href="#" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-trash-can"></i>
                            Delete Subject
                        </a>
                    </div>
                </div>
                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-chart-line"></i>
                            Performance monitoring
                        </h4>
                    </button>
                </div>

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-coins"></i>
                            Resources
                        </h4>
                    </button>
                </div>

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-flag"></i>
                            Information
                        </h4>
                    </button>
                </div>

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-bullhorn"></i>
                            
                            Communication
                        </h4>
                    </button>
                </div>

            </div>
            <!-- Boton de salir -->
                <div class="flex flex-col ">
                    <a class="rounded-full bg-green-900 py-2 text-white textl-lg hover:bg-green-700 text-center" href="../logins/logout.php">Exit</a>
                </div>

        </div>
        <!-- Fin del 1er Componente-->
=======
                if ($showForm10):
                    include 'listarmaterias.php';
                endif;
            ?>
        </main>
>>>>>>> 4efdefa507366136cc06faa41bc3370f20e0b45f
        
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
    
</body>
</html>

