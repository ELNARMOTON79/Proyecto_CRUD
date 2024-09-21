<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actividad</title>
    <!-- Importa Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Contenedor principal -->
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full mx-auto mt-10">
        <!-- Título -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-green-600">Eliminar Actividad</h2>
        </div>

        <!-- Formulario para eliminar actividad -->
        <form action="" method="post" class="space-y-6" id="deleteActivityForm">
            <!-- Selección de actividad -->
            <div>
                <label for="Eliminar_Act" class="block mb-2 text-sm font-semibold text-gray-700">Selecciona una actividad</label>
                <select name="Eliminar_Act" id="Eliminar_Act" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="" disabled selected>Seleccionar actividad</option>
                    <?php
                        require_once("../Conexion/contact.php");
                        $obj = new contacto();
                        if (isset($_POST["eliminar"])) {
                            $obj->eliminar($_POST["Eliminar_Act"]);
                        }
                        $resultado = $obj->consultar();
                        while ($registro = $resultado->fetch_assoc()) {
                            echo "<option value='".$registro["id"]."'>".$registro["actividad"]."</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- Botón para eliminar -->
            <div>
                <button type="button" 
                    class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300"
                    onclick="mostrarModal()">
                    Eliminar Actividad
                </button>
            </div>

            <!-- Modal de confirmación -->
            <div id="modalConfirmar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmación de Eliminación</h2>
                    <p class="mb-6 text-gray-600">¿Estás seguro de que deseas eliminar esta actividad?</p>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600" 
                                onclick="ocultarModal()">Cancelar</button>
                        <button type="submit" name="eliminar" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Mensaje de éxito -->
        <?php
        if(isset($_POST['eliminar'])){
            echo "<p id='success-message' class='mt-6 text-lg font-semibold text-center text-green-700 bg-green-100 p-4 rounded-lg'>
                  Actividad eliminada correctamente</p>";
        }
        ?>

    </div>

    <!-- Scripts -->
    <script>
        // Mostrar el modal de confirmación
        function mostrarModal() {
            const actividadSeleccionada = document.getElementById('Eliminar_Act').value;
            if (!actividadSeleccionada) {
                alert('Por favor, selecciona una actividad antes de continuar.');
                return;
            }
            document.getElementById('modalConfirmar').classList.remove('hidden');
        }

        // Ocultar el modal de confirmación
        function ocultarModal() {
            document.getElementById('modalConfirmar').classList.add('hidden');
        }

        // Ocultar mensaje de éxito después de 5 segundos
        setTimeout(function() {
            var message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>

</body>
</html>
