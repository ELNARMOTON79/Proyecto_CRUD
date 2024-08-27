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
    <!-- Script para mostrar la fecha actual-->
    

</head>
<body>
    
    <!-- Primer Componente aqui -->
    <div class="flex flex-row">

        <div class="flex flex-col bg-green-500 h-screen justify-between w-64
                    py-4 px-2">
            
            <!-- El titulo de la dashboard-->
            <div class="flex items-center justify-between text-white text-3x1 px-5">
                <b>Edu4All</b>
            </div>

            <!-- Aqui va el icono grill -->
            <div class="flex flex-col flex-auto">

                <div class="p-2 hover:bg-grey-100">
                    <div class="flex flex-row space-x-3">
                        <i class="fa-solid fa-list"></i>
                        <!-- El hover:text-black sirve para cambiar el color 
                            Cuando pase el puntero por el texto-->
                        <h4 class="font-bold text-white hover:text-gray-500">DashBoard</h4>
                    </div>
                </div>

                <div class="p-2 hover:bg-green-700">
                    <div class="flex flex-row space-x-3">
                        <i class="fa-solid fa-question text-white"></i>
                        <!-- El hover:text-black sirve para cambiar el color 
                            Cuando pase el puntero por el texto-->
                        <h4 class="text-white hover:text-black">1er apartado</h4>
                    </div>
                </div>
                
                <div class="p-2 hover:bg-green-700">
                    <div class="flex flex-row space-x-3">
                        <i class="fa-solid fa-question text-white"></i>
                        <!-- El hover:text-black sirve para cambiar el color 
                            Cuando pase el puntero por el texto-->
                        <h4 class="text-white hover:text-black">2do apartado</h4>
                    </div>
                </div>                

                <div class="p-2 hover:bg-green-700">
                    <div class="flex flex-row space-x-3">
                        <i class="fa-solid fa-question text-white"></i>
                        <!-- El hover:text-black sirve para cambiar el color 
                            Cuando pase el puntero por el texto-->
                        <h4 class="text-white hover:text-black">3er apartado</h4>
                    </div>
                </div>

            </div>
            <!-- Boton de salir -->
                <div class="flex flex-col">
                    <button class="rounded-full bg-green-900
                    py-2 text-white textl-lg ">Salir</button>
                </div>

        </div>
        <!-- Fin del 1er Componente-->
        

        <!-- Segundo Componente aqui -->    
            <div class="flex-auto">
                <div class="flex flex-col">
                    <div class="flex flex-col bg-white">
                        <div class="flex flex-row space-x-3">
                            <h4 class="font-bold text-gray-500 p-1">DashBoard</h4>
                        </div>
                        <!-- Aqui poner un script para modificar la fecha -->
                        <p class="text-gray-400 p-1" id="current-date-time"></p>
                    </div>
                    <div class="min-h-screen bg-blue-50">
                        <div class="mt-8 grid gap-10 lg:grid-cols-3 sm-grid-cols-2 p-4">
                            <!-- El panel inicia aqui -->
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Check in today
                                    <div class="text-3x1 font-medium text-gray-600 p-1">34</div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-left fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Checkar otra cosa
                                    <div class="text-3x1 font-medium text-gray-600 p-1">223</div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-right fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total de mocosos
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
                                <b class="flex flex-row text-gray-500">Graficos de cuanta raza se mete a la school</b>
                                <canvas class="p-5" id="chartLine"></canvas>
                            </div>

                            <div class="flex flex-col p-8 bg-white rounded shadow-sm">
                                <b class="flex flex-row text-gray-500">Ocupaccion Porcentaje</b>
                                <canvas class="p-5" id="chartRadar"></canvas>
                            </div>

                        </div>

                        <!-- Otro va a finalizar aqui -->
                        

                        <!-- Tabla Inicio -->

                        <div class="p-4 font-bold text-gray-600">
                            Alumnos
                        </div>
                        <div class="grid gap-3 lg:col-span-1 md:cols-1 p-4">
                            <div class="col-span-2 flex flex-auto bg-white rounded shadow-sm items-center">
                                <table class="min-w-full divide-y divide-gray-200 table-auto">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-winder">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-winder">Title</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-winder">Status</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-winder">Roles</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- Aqui colocar las imagenes si es que hay -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" 
                                                        src="https://images2.alphacoders.com/137/thumbbig-1370257.webp" 
                                                        alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Alya russian
                                                        </div>
                                                        <!-- Aqui va a ir el correo del alumno-->
                                                        <div class="text-sm text-gray-500">alyaURSS@ucol.mx</div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        
                                            <!-- Aqui es para mirar el status del alumno si esta reprobado o lo que se quiera poner -->
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                Aprobado
                                            </td>

                                            <!-- Aqui Sera para mirar si esta activo o dado de baja el alumno-->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-900">
                                                    Active
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                Alumno
                                            </td>
                                            <!-- Aqui se reprobrara o se acreditara al alumno segun lo que su calificacion diga-->
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                                    Edit
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla Fin -->
                        
                    </div>
                </div>
            </div>
    </div>
    <!-- Required chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    
<!-- Script para actualizar la fecha y hora -->
<script>
    function actualizarFechaHora() {
        const ahora = new Date();

        // Opciones para formatear la fecha en español
        const opcionesFecha = { day: 'numeric', month: 'long' };
        const fechaFormateada = ahora.toLocaleDateString('es-ES', opcionesFecha);

        // Opciones para formatear la hora en formato de 24 horas
        const opcionesHora = { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit', 
            hour12: false 
        };
        const horaFormateada = ahora.toLocaleTimeString('es-ES', opcionesHora);

        // Combinar fecha y hora
        const fechaHora = `${fechaFormateada} ${horaFormateada}`;

        // Insertar la fecha y hora en el elemento con id="current-date-time"
        document.getElementById('current-date-time').textContent = fechaHora;
    }

    // Ejecutar la función una vez al cargar la página
    actualizarFechaHora();

    // Actualizar la hora cada segundo
    setInterval(actualizarFechaHora, 1000);




    /*
    Scrip para la grafica, se va a cambiar luego cuando 
    tengamos los datos de las personas registradas uotras cosas 
    */

    const labels = ["January", "February", "March", "April", "May", "June"];
    const data = {
        labels: labels,
        datasets: [{
            label: "My First dataset",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [0, 10, 5, 2, 20, 30, 45],
        }, ],
    };

    const configLineChart = {
        type: "line",
        data,
        options: {},
    };

    var chartLine = new Chart(
        document.getElementById("chartLine"),
        configLineChart
    );



    const dataRadar = {
        labels: [
        "Reservation 1",
        "Reservation 2",
        "Reservation 3",
        "Reservation 4",
        "Reservation 5",
        "Reservation 6",
        "Reservation 7",
        ],
        datasets: [{
            label: "My First Dataset",
            data: [65, 59, 90, 81, 56, 55, 40],
            fill: true,
            backgroundColor: "rgba(255,105,180)",
            borderColor: "rgb(255,20,147)",
            pointBackgroundColor: "rgb(133, 105, 241)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(133, 105, 241)",
        },
        {
            label: "My Second Dataset",
            data: [28, 48, 40, 19, 96, 27, 100],
            fill: true,
            backgroundColor: "rgba(255,105,180)",
            borderColor: "rgb(0,191,255)",
            pointBackgroundColor: "rgb(54, 162, 235)",
            pointBorderColor: "#fff",
            pointHoverBackgroundColor: "#fff",
            pointHoverBorderColor: "rgb(54, 162, 235)",
        },
        ],
    };

    const configRadarChart = {
        type: "radar",
        data: dataRadar,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartRadar"),
        configRadarChart
    );

</script>
</body>
</html>