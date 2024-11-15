<div class="flex-auto ml-64">
    <div class="flex flex-col">
        <div class="flex items-center bg-white p-4 space-x-4">
            <!-- Imagen del usuario -->
            <div class="flex-shrink-0 h-16 w-16 relative">
                <img class="h-full w-full rounded-full" src="../SRC/luis.jpg" alt="User Avatar">
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
            <!-- Contenedor para centrar la tarjeta -->
            <div class="mt-8 flex justify-center p-2">
                <!-- Tarjeta de Total Students -->
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5 w-64">
                    <div class="text-sm text-gray-400">
                        Total Students
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_estudiantes(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-user-graduate fa-2x"></i>
                    </div>
                </div>
            </div>

            <!-- Gráfica -->
            <div class="mt-8">
                <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
                    <canvas id="miGrafica" class="w-full"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
