
<div class="flex-auto ml-64">
    <div class="flex flex-col">
        <div class="flex items-center bg-white p-4 space-x-4">
            <!-- Imagen del usuario -->
            <div class="flex-shrink-0 h-16 w-16 relative">
                <img class="h-full w-full rounded-full" src="../SRC/jesus.jpg" alt="User Avatar">
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
                <!-- El panel inicia aquí -->
                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total de recursos
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo '$'?>
                            <?php echo total_recursos(); ?>
                            <?php echo 'Usd.'?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                        <i class="fa-solid fa-circle-dollar-to-slot fa-2x"></i>
                    </div>
                </div>

                <button onclick="abrirModal()">
                    <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                        <div class="text-sm text-gray-400">
                            Asignar recursos
                            <div class="text-3xl font-medium text-gray-600 p-1">
                                Presione aqui
                            </div>
                        </div>
                        <div class="text-pink-500">
                            <i class="fa-solid fa-piggy-bank fa-2x"></i>
                        </div>
                    </div>
                </button>

                <!-- Modal -->
                <div id="modalAsignarRecursos" class="modal hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
                    <div class="bg-white rounded-lg shadow-lg w-1/3 p-5">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Asignar Recursos</h2>

                        <form id="formAsignarRecursos">
                            <div class="mb-4">
                                <label class="block text-gray-600">Nombre de recurso:</label>
                                <input type="text" id="nombreRecurso" class="w-full border p-2 rounded" maxlength="50" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-600">Cantidad:</label>
                                <input type="number" id="cantidadRecurso" class="w-full border p-2 rounded" step="0.01" required>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="button" onclick="cerrarModal()" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancelar</button>
                                <button type="button" onclick="asignarRecurso()" class="bg-green-600 text-white px-4 py-2 rounded">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                    <div class="text-sm text-gray-400">
                        Total de donadores
                        <div class="text-3xl font-medium text-gray-600 p-1">
                            <?php echo total_donadores(); ?>
                        </div>
                    </div>
                    <div class="text-pink-500">
                    <i class="fa-solid fa-hand-holding-dollar fa-2x"></i>
                    </div>
                </div>
            </div>
            <!-- Nueva Tabla -->
            <div class="mt-5 grid lg:grid-cols-3 md:grid-cols-3 p-4 gap-3">
                <div class="col-span-2 bg-white p-8 flex-col rounded shadow-sm">
                    <b class="flex flex-row text-gray-500">Donaciones en un transcurso de 6 meses</b>
                    <table class="w-full mt-3 text-left">
                        <thead>
                            <tr>
                                <th class="border-b p-2 text-gray-600">Nombre Recurso</th>
                                <th class="border-b p-2 text-gray-600">Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $recursos = historial_recursos(5); 
                            foreach ($recursos as $recurso): ?>
                                <tr>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($recurso['nombre_recurso']); ?></td>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($recurso['cant']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                      
                </div>
                <div class="flex flex-col p-8 bg-white rounded shadow-sm">
                    <div class="flex flex-row text-gray-500">
                        Historial de donaciones
                        <div><i class="fa-solid fa-clock-rotate-left p-1"></i></div>
                    </div>
                    <table class="w-full mt-3 text-left">
                        <thead>
                            <tr>
                                <th class="border-b p-2 text-gray-600">Monto</th>
                                <th class="border-b p-2 text-gray-600">Motivo</th>
                                <th class="border-b p-2 text-gray-600">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $donaciones = historial_donaciones(5); 
                            foreach ($donaciones as $donacion): ?>
                                <tr>
                                    <td class="border-b p-2 text-gray-800"><?php echo number_format($donacion['monto'], 2); ?></td>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($donacion['motivo']); ?></td>
                                    <td class="border-b p-2 text-gray-800"><?php echo htmlspecialchars($donacion['fecha_don']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
