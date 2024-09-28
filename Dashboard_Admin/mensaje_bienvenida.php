<div class="flex-auto ml-64">
                <div class="flex flex-col">
                    <div class="flex flex-col bg-white">
                        <div class="flex flex-row space-x-3">
                            <!-- La clase translate-y-2 desplaza la imagen 0.5rem (8px) hacia abajo -->
                            <div class="flex-shrink-0 h-10 w-10 relative">
                                <img class="ml-3 h-10 w-10 rounded-full translate-y-2" 
                                    src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png" 
                                    alt="">
                            </div>
                            <h4 class="fa-2x font-bold text-gray-500 p-1">welcome <?php echo htmlspecialchars($_SESSION['nombre']); ?></h4>
                        </div>
                        <!-- Aqui va a ir el correo del admin-->
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
                                    <div class="text-3x1 font-medium text-gray-600 p-1"><?php echo total_maestros(); ?></div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-left fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total number of students
                                    <div class="text-3x1 font-medium text-gray-600 p-1"><?php echo total_estudiantes(); ?></div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-right fa-2x"></i>
                                </div>
                            </div>
                            <div class="flex items-center bg-white rounded shadow-sm justify-between p-5">
                                <div class="text-sm text-gray-400">Total number of donators
                                    <div class="text-3x1 font-medium text-gray-600 p-1"><?php echo total_donadores(); ?></div>
                                </div>
                                <div class="text-pink-500">
                                    <i class="fa-solid fa-circle-arrow-right fa-2x"></i>
                                </div>
                            </div>
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