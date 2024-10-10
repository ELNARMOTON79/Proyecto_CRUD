<div class="flex-auto ml-64">
    <div class="flex flex-col">
        <div class="flex items-center bg-white p-4 space-x-4">
            <!-- Imagen del usuario -->
            <div class="flex-shrink-0 h-16 w-16 relative">
                <img class="h-full w-full rounded-full" src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png" alt="User Avatar">
            </div>
            <!-- Contenedor de bienvenida y correo -->
            <div class="flex flex-col justify-center">
                <!-- Mensaje de bienvenida -->
                <h4 class="text-lg font-bold text-gray-500">
                    Welcome, <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                </h4>
                <!-- Correo del usuario -->
                <div class="text-sm text-gray-500">
                    <?php echo $_SESSION['correo']; ?>
                </div>
            </div>
        </div>
        <div class="min-h-screen bg-blue-50">
            <div class="mt-8 grid gap-10 lg:grid-cols-3 sm:grid-cols-2 p-4">
                <!-- El panel inicia aqui -->
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total number of students
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_estudiantes(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-circle-arrow-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Total graph</h2>
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <canvas id="miGrafica" class="w-full"></canvas>
                </div>
            </div>
        </div>
        
    </div>
</div>
