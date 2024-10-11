<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

$mostrarExito = false;

// Verificar si se ha enviado el formulario para eliminar un usuario
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar_materias($idEliminar);
    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}
// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->obtenerPorIdmateria($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

// Verificar si se ha enviado el formulario para modificar un usuario
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre_materia'];
    $objetivo = $_POST['objetivo'];
    $unidad = $_POST['unidad'];
    $obj->modificar_materia($id, $nombre, $objetivo, $unidad);
    //$mostrarExito2 = true;
}

// Realizar la consulta para obtener todas las materias
$resultado = $obj->consultarmaterias(); // No se pasa offset ni límite
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Subjects</h1>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Subject</th>
                <th class="px-6 py-3 text-left">Objective</th>
                <th class="px-6 py-3 text-left">Unit</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado): // Verificar si hay resultados ?>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["objetivos"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["unidad"]); ?></td>
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
                            <!-- Botón de Eliminar con ícono, activando modal -->
                            <a href="#" onclick="mostrarModal(<?php echo $registro['id']; ?>)" class="relative group text-red-600 hover:text-red-800">
                                <i class="fas fa-trash-alt"></i>
                                <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                    Delete
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No subjects found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal para Confirmar Eliminación -->
<div id="modalConfirmar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmation of Elimination</h2>
        <p class="mb-6 text-gray-600">Are you sure you want to delete this user?</p>
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
        <h2 class="text-xl font-semibold mb-4">Subject successfully deleted</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<!-- Modal para Editar Materia -->
<!-- Modal para Editar Materia -->
<?php if ($registroParaModificar): ?>
<div id="modalEditar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Subject</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $registroParaModificar['id']; ?>">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-book mr-2"></i>Name activitie
                    </label>
                    <input type="text" name="nombre_materia" value="<?php echo $registroParaModificar['nombre_materia']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="objetivo" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-bullseye mr-2"></i>Objective
                    </label>
                    <input type="text" name="objetivo" value="<?php echo $registroParaModificar['objetivos']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div>
                <label for="unidad" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-layer-group mr-2"></i>Unit
                </label>
                <select name="unidad" id="role" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="1"<?php echo $registroParaModificar['unidad'] == '1' ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo $registroParaModificar['unidad'] == '2' ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo $registroParaModificar['unidad'] == '3' ? 'selected' : ''; ?>>3</option>
                </select>
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


<!-- Scripts -->
<script>
    // Mostrar el modal de confirmación con el ID del usuario
    function mostrarModal(userId) {
        document.getElementById('deleteUserId').value = userId;
        document.getElementById('modalConfirmar').classList.remove('hidden');
    }

    // Ocultar el modal de confirmación
    function ocultarModal() {
        document.getElementById('modalConfirmar').classList.add('hidden');
    }
</script>
