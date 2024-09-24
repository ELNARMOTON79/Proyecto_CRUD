<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actividades</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <!-- Container for delete activity form -->
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex items-center mb-6">
            <img class="h-10 w-10 rounded-full" src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png" alt="Icono de usuario">
            <h4 class="font-bold text-green-500 ml-4">Eliminar Materia</h4>
        </div>

        <!-- Delete Activity Form -->
        <form action="" method="post" class="space-y-6" id="deleteUserForm">
        <!-- User Selection -->
        <div>
            <label for="ideleminar" class="block mb-2 text-sm font-semibold text-gray-700">Selecciona una Materia</label>
            <select name="ideleminar" id="ideleminar" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="Seleccionar Materia">Seleccionar Materia</option>
                <?php
                    require_once("../Conexion/contacto.php");
                    $obj = new contacto();
                    if (isset($_POST["eliminar"])) {
                        $obj->eliminar_programas($_POST["ideleminar"]);
                    }
                    $resultado = $obj->consultar_programas();
                    while ($registro = $resultado->fetch_assoc()) {
                        echo "<option value='".$registro["id"]."'>".$registro["nombre_programas"]."</option>";
                    }
                ?>
            </select>
        </div>

        <!-- Delete Button -->
        <div>
            <button type="button" 
                class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300"
                onclick="mostrarModal()">
                Eliminar Materia
            </button>
        </div>

        <!-- Modal para Confirmar Eliminación -->
        <div id="modalConfirmar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmación de Eliminación</h2>
                <p class="mb-6 text-gray-600">¿Estás seguro de que deseas eliminar esta Materia?</p>
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

        <!-- Success Message -->
        <?php
        if (isset($_POST['eliminar'])) {
            echo "<p id='success-message' class='mt-6 text-lg font-semibold text-center text-green-700 bg-green-100 p-4 rounded-lg'>
                Materia eliminada correctamente</p>";
        }
        ?>

    </div>

    <!-- Scripts -->
    <script>
        // Show confirmation modal
        function mostrarModal() {
            document.getElementById('modalConfirmar').classList.remove('hidden');
        }

        // Hide confirmation modal
        function ocultarModal() {
            document.getElementById('modalConfirmar').classList.add('hidden');
        }

        // Hide success message after 5 seconds
        setTimeout(function() {
            var message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 5000); // 5000 ms = 5 seconds
    </script>
</body>
</html>