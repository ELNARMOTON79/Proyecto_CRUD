<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;
$mostrarExito2 = false;

// Verificar si se ha enviado el formulario para eliminar una actividad
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar_actividades($idEliminar);
    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}

// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->consultar_actividades($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $description = $_POST['description'];
    $fk_materia = $_POST['fk_materia'];
    $fecha = $_POST['fecha'];
    $obj->modificar_actividades($id, $nombre, $description, $fk_materia, $fecha);
    $mostrarExito2 = true;
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
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="idmodificar" value="<?php echo $registro['id']; ?>">
                            <button type="submit" name="modificarBtn" class="relative group text-blue-600 hover:text-blue-800 mr-2">
                                <i class="fas fa-edit"></i>
                                <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                    Edit
                                </span>
                            </button>
                        </form>
                        <!-- Botón de Eliminar con ícono -->
                        <a href="#" onclick="mostrarModal(<?php echo $registro['id']; ?>)" class="relative group text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                            <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                Delete
                            </span>
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
<!-- Modal para Mensaje de Éxito -->
<?php if ($mostrarExito2): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Activity successfully modified</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<?php if ($registroParaModificar): ?>
<!-- Modal para Editar actividades -->
    <?php 
    // Asegurarse de obtener las materias para el modal
    $materias = $obj->obtenerMaterias(); 
    ?>
    <div id="modalEditar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Activity</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $registroParaModificar['id']; ?>">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-clipboard mr-2"></i>Activity Name
                    </label>
                    <input type="text" name="nombre" value="<?php echo $registroParaModificar['nombre_actividad']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-align-left mr-2"></i>Description
                    </label>
                    <input type="text" name="description" value="<?php echo $registroParaModificar['descripcion']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div>
                <label for="fk_materia" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-book mr-2"></i>Materia
                </label>
                <select name="fk_materia" id="fk_materia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <?php while ($materia = $materias->fetch_assoc()): ?>
                        <option value="<?php echo $materia['id']; ?>" <?php echo $registroParaModificar['fk_materia'] == $materia['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($materia['nombre_materia']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-calendar-alt mr-2"></i>Date
                </label>
                <input type="date" name="fecha" value="<?php echo $registroParaModificar['fecha']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="ocultarModalEditar()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200">Cancel</button>
                <input type="submit" name="modificar" value="Edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
            </div>
        </form>
    </div>
</div>
<script>
    function ocultarModalEditar() {
        document.getElementById('modalEditar').classList.add('hidden');
    }
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
