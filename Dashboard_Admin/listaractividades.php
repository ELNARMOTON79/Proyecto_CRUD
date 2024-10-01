<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;

// Verificar si se ha enviado el formulario para eliminar una actividad
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar($idEliminar);
    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}

// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->obtenerPorId($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

// Obtener la materia seleccionada para filtrar
$materia_filtrada = isset($_POST['materia_filtrada']) ? $_POST['materia_filtrada'] : '';

// Consulta para obtener las materias disponibles
$materias = $obj->obtenerMaterias();

// Consulta de actividades filtradas por materia
if ($materia_filtrada !== '') {
    $resultado = $obj->consultar_actividades_por_materia($materia_filtrada);
} else {
    $resultado = $obj->consultar_actividades();
}
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Activities</h1>
    
    <!-- Formulario de filtro por materia -->
    <form method="POST" class="mb-4" id="filterForm">
        <label for="materia_filtrada" class="block mb-2 text-gray-700">Filter by subject:</label>
        <select name="materia_filtrada" id="materia_filtrada" class="block w-full p-2 border border-gray-300 rounded" onchange="document.getElementById('filterForm').submit();">
            <option value="">All Subjects</option>
            <?php while ($materia = $materias->fetch_assoc()): ?>
                <option value="<?php echo $materia['id']; ?>" <?php echo $materia_filtrada == $materia['id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($materia['nombre_materia']); ?>
                </option>
            <?php endwhile; ?>
        </select>
    </form>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-left">Subject</th> <!-- Mostrar nombre de la materia -->
                <th class="px-6 py-3 text-left">Date</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_actividad"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td> <!-- Mostrar nombre de la materia -->
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
                    <td class="px-6 py-4">
                        <!-- Botón de Editar con ícono -->
                        <a href="edit_user.php?id=<?php echo $registro['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <!-- Botón de Eliminar con ícono -->
                        <a href="#" onclick="mostrarModal(<?php echo $registro['id']; ?>)" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<!-- Modal para Confirmar Eliminación -->
<div id="modalConfirmar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmation of Elimination</h2>
        <p class="mb-6 text-gray-600">Are you sure you want to delete this activity?</p>
        <div class="flex justify-end space-x-4">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600" 
                    onclick="ocultarModal()">Cancel</button>
            <form method="POST">
                <input type="hidden" name="id" id="deleteUserId" value="">
                <button type="submit" name="eliminar" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Mensaje de Éxito -->
<?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Activity successfully deleted</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<script>
    // Mostrar el modal de confirmación con el ID de la actividad
    function mostrarModal(activityId) {
        document.getElementById('deleteUserId').value = activityId;
        document.getElementById('modalConfirmar').classList.remove('hidden');
    }

    // Ocultar el modal de confirmación
    function ocultarModal() {
        document.getElementById('modalConfirmar').classList.add('hidden');
    }
</script>
