<?php
    session_start();
    // Verifica si la sesión contiene los datos
    if (!isset($_SESSION['nombre'])) {
        // Si no existe una sesión válida, redirige al usuario a la página de login
        header('Location: ../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
    <!-- Script para usar tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script para usar la biblioteca de Fon Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Es el CDN para mostrar la grafica chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>
<body>
    
    <!-- Primer Componente aqui -->
    <div class="flex flex-row">

        <!-- 
        Para solucionar el error que tenia de que el sidebar no se podia adaptar
        a las dimensiones de la pantalla, la solucion fue que al "div" del sidebar
        le agregue a la clase el atributo "fidex" y para evitar afectar a los demas
        "div" donde estaba la grafica, lo solucione agregando "ml-64" como en el 
        siguiente ejemplo: (Antes: <div class="flex-auto">) 
        (Después: <div class="flex-auto ml-64">)
        Solución del sidebar : (Antes: <div class="flex flex-col bg-green-500 h-screen justify-between w-64 py-4 px-2">)
        (Después: <div class="flex flex-col bg-green-500 fixed h-screen justify-between w-64 py-4 px-2">)
        -->
        <div class="flex flex-col bg-green-500 fixed h-screen justify-between w-64
                    py-4 px-2 ">
            <!-- El título de la dashboard -->
            <div class="flex items-center text-white text-3x1 px-5">
                <div class="flex-shrink-0 h-10 w-10">
                    <img class="scale-150 h-10 w-10 rounded-full" 
                        src="../img/logo.png" 
                    alt="">
                </div>
            <!-- Agregue la clase ml-3 para poder crear un espacion entre
                la imagen y el texto y este no se distorcione -->
                <b class="fa-2x ml-3">Edu4All</b>
            </div>

            <!-- Aqui va el icono grill -->
            <div class="flex flex-col flex-auto">

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <!-- El hover:text-black sirve para cambiar el color 
                            Cuando pase el puntero por el texto-->
                            <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-list"></i>
                            DashBoard</h4>
                    </button>
                </div>

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-address-book"></i>
                            Calificaciones</h4>
                    </button>
                </div>
                
                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-user-clock"></i>
                            Horario</h4>
                    </button>
                </div>                

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-gear"></i>
                            Ajustes</h4>
                    </button>
                </div>

                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
                    <button class="flex flex-row space-x-3">
                        <h4 class="text-white hover:text-black">
                        <i class="fa-solid fa-bullhorn"></i>
                            Comunicación</h4>
                    </button>
                </div>
            </div>
            <!-- Boton de salir -->
                <div class="flex flex-col ">
                <a class="rounded-full bg-green-900 py-2 text-white textl-lg hover:bg-green-700 text-center" href="../logins/logout.php">Log Out</a>
                </div>

        </div>
        <!-- Fin del 1er Componente-->
        

        <!-- Segundo Componente aqui -->    
            <div class="flex-auto ml-64">
                <div class="flex flex-col">
                    <div class="flex flex-col bg-white">
                        <div class="flex flex-row space-x-3">
                            <!-- La clase translate-y-2 desplaza la imagen 0.5rem (8px) hacia abajo -->
                        <div class="flex-shrink-0 h-10 w-10 relative">
                            <img class="ml-3 h-10 w-10 rounded-full translate-y-2" 
                                src="https://img.icons8.com/plasticine/100/among-us.png" 
                                alt="">
                        </div>
                        <h4 class="fa-2x font-bold text-gray-500 p-1">Welcome <?php echo htmlspecialchars($_SESSION['nombre']); ?></h4>
                        </div>
                        <!-- Aqui va a ir el correo del alumno-->
                        <div class="text-sm text-gray-500 p-1">
                            <?php
                                echo $_SESSION['correo'];
                            ?>
                            <!-- Aqui se encuetra para mostrar la fecha -->
                        <p class="text-gray-400 p-1 text-right" id="current-date-time"></p> 
                        </div>
                    </div>
                    <div class="min-h-screen bg-blue-50">
                        <div class="mt-8 grid gap-10 lg:grid-cols-3 sm-grid-cols-2 p-4">
                            <!-- El panel inicia aqui -->
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total number of teachear
                                    <div class="text-3x1 font-medium text-gray-600 p-1">34</div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-left fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total number of students
                                    <div class="text-3x1 font-medium text-gray-600 p-1">223</div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-right fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total number of donators
                                    <div class="text-3x1 font-medium text-gray-600 p-1">91283</div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-house-user fa-2x"></i>                                
                                </div>
                            </div>
                            <!-- El segundo componente termina aqui -->
                        </div>
                        <!-- Otro va a iniciar aqui -->

                        <div class="mt-5 grid lg:grid-cols-3 md:grid-cols-3 p-4 gap-3">
                            <div class="col-span-2 bg-white p-8 flex-col rounded shadow-sm">
                                <b class="flex flex-row text-gray-500">Student graphics</b>
                                <canvas class="p-5" id="chartLine"></canvas>
                            </div>

                            <div class="flex flex-col p-8 bg-white rounded shadow-sm">
                                <b class="flex flex-row text-gray-500">Occupation percentage</b>
                                <canvas class="p-5" id="chartRadar"></canvas>
                            </div>

                        </div>
                
                    </div>
                </div>
            </div>
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
</body>
</html>