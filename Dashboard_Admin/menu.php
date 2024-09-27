<div class="flex flex-col bg-green-500 fixed h-screen justify-between w-64
                    py-4 px-2">
            
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
                            DashBoard
                            </h4>
                            
                    </button>
                </div>

                <!-- Sección Desplegable - Usuarios
                    La forma de activar el JS es con el id="toggleUsuarios"-->
                <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">   
                    <button id="toggleUsuarios" class="flex flex-row space-x-3 w-full focus:outline-none">
                    <span class="text-white hover:text-black">
                        <i class="fa-solid fa-user"></i>
                        User
                    </span>
                    </button>
                    <div id="submenu" class="ml-6 mt-2 hidden">
                        <a href="crear_usuario.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-user-plus"></i>
                            Create user
                        </a>
                        <a href="modificaruser.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-user-pen"></i>
                            Modify user</a>
                        <a href="listausuarios.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-list-check"></i>
                            List user</a>

                        <a href="eliminarusuario.php" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                        <i class="fa-solid fa-user-xmark"></i>
                            Delete user</a>
                    </div>
                </div>

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
                            Create Subject</a>
                        <a href="#" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
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