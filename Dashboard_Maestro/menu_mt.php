<div class="flex flex-col bg-green-500 fixed h-screen justify-between w-64 py-4 px-2">

    <!-- El título de la dashboard -->
    <div class="flex items-center text-white text-3xl px-5">
    <div class="flex-shrink-0">
        <!-- Aumentamos el tamaño de la imagen y agregamos forma redonda -->
        <img class="w-18 h-16 rounded-full" 
             src="../SRC/logoblanco1.png" 
             alt="Logo Edu4All">
    </div>
    <b class="ml-0 text-4xl">Edu4All</b>
</div>


    <!-- Aquí va el icono grill -->
    <div class="flex flex-col flex-auto">

        <!-- Dashboard -->
        <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
            <a href="?action=dashboard" class="flex flex-row space-x-3">
                <h4 class="text-white hover:text-black">
                    <i class="fa-solid fa-list"></i>
                    Dashboard
                </h4>
            </a>
        </div>

        <!-- Sección Desplegable - Usuarios -->
        <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
            <button id="toggleUsuarios" class="flex flex-row items-center justify-between w-full focus:outline-none">
                <span class="text-white hover:text-black">
                    <i class="fa-solid fa-list-check"></i>
                    Grades
                </span>
                <span id="iconUsuarios" class="text-white">
                    <i class="fa fa-plus"></i>
                </span>
            </button>
            <div id="submenu" class="ml-6 mt-2 hidden">
                <a href="?action=listar_usuarios" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                    <i class="fa-solid fa-pen"></i>
                    Create grades
                </a>
            </div>
        </div>

        <div class="p-2 hover:bg-green-700 text-white rounded-md transition duration-500 ease-in-out">
            <button id="toggleActividades" class="flex flex-row items-center justify-between w-full focus:outline-none">
                <span class="text-white hover:text-black">
                <i class="fa-solid fa-book-open"></i>
                    Activities
                </span>
                <span id="iconActividades" class="text-white">
                    <i class="fa fa-plus"></i>
                </span>
            </button>
            <div id="submenuActividades" class="ml-6 mt-2 hidden">
                <a href="?action=crear_actividades" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                    <i class="fa-solid fa-pen"></i>
                    Create activities
                </a>
                <a href="?action=listar_actividades" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                    <i class="fa-solid fa-clipboard-list"></i>
                    List activities
                </a>
            </div>
        </div>

        <div class="p-2 hover:bg-green-700 text-white rounded-md transition duration-500 ease-in-out">
            <button id="toggleMaterias" class="flex flex-row items-center justify-between w-full focus:outline-none">
                <span class="text-white hover:text-black">
                    <i class="fa-solid fa-book"></i>
                    Subjects
                </span>
                <span id="iconMaterias" class="text-white">
                    <i class="fa fa-plus"></i>
                </span>
            </button>
            <div id="submenuMaterias" class="ml-6 mt-2 hidden">
                <a href="?action=listar_materias" class="block text-white hover:text-black rounded-md transition duration-500 ease-in-out">
                    <i class="fa-solid fa-clipboard-list"></i>
                    List Subject
                </a>
            </div>
        </div>
        <div class="p-2 hover:bg-green-700 rounded-md transition duration-500 ease-in-out">
            <a href="?action=settings" class="flex flex-row space-x-3">
                <h4 class="text-white hover:text-black">
                <i class="fa-solid fa-gears"></i>
                    Setting
                </h4>
            </a>
        </div>
    </div>

    <!-- Botón de salir -->
    <div class="flex flex-col">
        <a class="rounded-full bg-green-900 py-2 text-white text-lg hover:bg-green-700 text-center" href="../logins/logout.php">Sign Out</a>
    </div>

</div>
