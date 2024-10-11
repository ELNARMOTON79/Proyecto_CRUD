
<form action="" method="post" class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Create matter</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Nombre de la materia -->
        <div>
            <label for="nombre_materia" class="block text-sm font-medium text-gray-700">
                <i class="fa-solid fa-tasks mr-2"></i>Name matter
            </label>
            <input type="text" name="nombre_materia" id="nombre_materia" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Name matter">
        </div>

        <!-- Unidad -->
        <div>
            <label for="unidad" class="block text-sm font-medium text-gray-700">
                <i class="fa-solid fa-clock mr-2"></i>Unit
            </label>
            <select name="unidad" id="unidad" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
    </div>

    <!-- Objetivo -->
    <div class="mt-6">
        <label for="objetivo" class="block text-sm font-medium text-gray-700">
            <i class="fa-solid fa-calendar-alt mr-2"></i>Objective
        </label>
        <input type="text" name="objetivo" id="objetivo" required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-s" placeholder="Objective">
    </div>

    <!-- Campo oculto para duración en segundos -->
    <input type="hidden" name="duracion" id="duracion">

    <!-- Botón de creación -->
    <div class="flex justify-end space-x-4 mt-6">
        <input type="submit" name="crear" value="Create matter"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-500">
    </div>
</form>


        <?php
        $mostrarExito = false;
        if (isset($_POST['crear'])) {
            $nombre_materia = $_POST['nombre_materia'];
            $objetivo = $_POST['objetivo'];
            $unidad = $_POST['unidad'];

            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $obj->crear_materias($nombre_materia, $objetivo, $unidad);

            $mostrarExito = true;
        }
        ?>
        <?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Matter created successfully</h2>
    </div>
    <script>
        // Mostrar el modal de éxito por 2 segundos
        setTimeout(function() {
            document.getElementById('modalExito').classList.add('hidden');
        }, 2000);
    </script>
</div>
<?php endif; ?>