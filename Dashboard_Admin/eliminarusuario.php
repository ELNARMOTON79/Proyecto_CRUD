<?php
require_once("../Conexion/contacto.php");

// Lógica para eliminar un usuario
if (isset($_POST["eliminar"])) {
    $obj = new contacto();
    $obj->eliminar($_POST["ideleminar"]);
    
    // Mensaje de éxito después de eliminar
    echo "<p id='success-message' class='mt-6 text-lg font-semibold text-center text-green-700 bg-green-100 p-4 rounded-lg'>
        Usuario eliminado correctamente</p>";
}

// Consulta para obtener los usuarios
$obj = new contacto();
$resultado = $obj->consultar();
?>

<!-- Modal para Confirmar Eliminación -->
<div id="modalConfirmar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmación de Eliminación</h2>
        <p class="mb-6 text-gray-600">¿Estás seguro de que deseas eliminar este usuario?</p>
        <div class="flex justify-end space-x-4">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600" 
                    onclick="ocultarModal()">Cancelar</button>
            <button type="submit" name="eliminar" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                Eliminar
            </button>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    // Mostrar el modal de confirmación
    function mostrarModal() {
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
