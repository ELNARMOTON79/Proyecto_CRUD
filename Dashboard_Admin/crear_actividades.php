<div class="max-w-4xl mx-auto mt-10 p-6 space-y-6">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Create Activity</h2>
    <form action="" method="post" class="bg-white shadow-md rounded-lg p-6 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="nombre_actividad" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-tasks mr-2"></i>Name Activity
                </label>
                <input type="text" name="nombre_actividad" id="nombre_actividad" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            
            <div>
                <label for="fecha_fin" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-calendar-alt mr-2"></i>Final Date
                </label>
                <input type="date" name="fecha_fin" id="fecha_fin" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
        </div>
        
        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">
                <i class="fa-solid fa-align-left mr-2"></i>Description
            </label>
            <textarea name="descripcion" id="descripcion" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
        </div>

        <div>
            <label for="fk_materia" class="block text-sm font-medium text-gray-700">
                <i class="fa-solid fa-book mr-2"></i>Subject
            </label>
            <select name="fk_materia" id="fk_materia"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <?php
                require_once("../Conexion/contacto.php");
                $obj = new Contacto();
                $resultado = $obj->obtenerMaterias(); // Asegúrate de que este método devuelva las materias con sus IDs

                if ($resultado) {
                    while ($materia = $resultado->fetch_assoc()) {
                        echo "<option value='" . $materia['id'] . "'>" . $materia['nombre_materia'] . "</option>";
                    }
                } else {
                    echo "<option>No se encontraron materias</option>";
                }
                ?>
            </select>
        </div>

        <!-- Campo oculto para duración en segundos -->
        <input type="hidden" name="duracion" id="duracion">
        
        <div class="flex justify-end space-x-4 mt-6">
            <input type="submit" name="crear" value="Create Activity"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-500">
        </div>
    </form>
</div>


    <?php
        $mostrarMensaje = false;
        
        if (isset($_POST['crear'])) {
            $nombre_actividad = $_POST['nombre_actividad'];
            $descripcion = $_POST['descripcion'];
            $fk_materia = $_POST['fk_materia'];
            $fecha_fin = $_POST['fecha_fin'];

            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $obj->crear_actividades($nombre_actividad, $descripcion, $fk_materia, $fecha_fin);

            $mostrarMensaje = true;
        }
        if ($mostrarMensaje): ?>
            <div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
                <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
                    <h2 class="text-xl font-semibold mb-4">Activity created successfully</h2>
                </div>
                <script>
                    // Mostrar el modal de éxito por 2 segundos
                    setTimeout(function() {
                        document.getElementById('modalExito').classList.add('hidden');
                    }, 2000);
                </script>
            </div>
        <?php endif;
    ?>
</div>
