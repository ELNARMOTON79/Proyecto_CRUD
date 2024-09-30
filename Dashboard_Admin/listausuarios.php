<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;

// Verificar si se ha enviado el formulario para eliminar un usuario
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar($idEliminar);
    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}

$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';

if ($tipo_usuario !== '') {
    $resultado = $obj->consultaxtipo($tipo_usuario);
} else {
    $resultado = $obj->consultar();
}

// Verificar si el resultado no es nulo
if ($resultado === null) {
    die("Error al ejecutar la consulta.");
}
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List user</h1>
    
    <!-- Formulario de filtro -->
    <form method="POST" class="mb-4" id="filterForm">
        <label for="tipo_usuario" class="block mb-2 text-gray-700">Filter by user role:</label>
        <select name="tipo_usuario" id="tipo_usuario" class="block w-full p-2 border border-gray-300 rounded" onchange="document.getElementById('filterForm').submit();">
            <option value="">All Roles</option>
            <option value="Admin" <?php echo $tipo_usuario == 'Admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="Teacher" <?php echo $tipo_usuario == 'Teacher' ? 'selected' : ''; ?>>Teacher</option>
            <option value="Student" <?php echo $tipo_usuario == 'Student' ? 'selected' : ''; ?>>Student</option>
        </select>
    </form>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">E-mail</th>
                <th class="px-6 py-3 text-left">Age</th>
                <th class="px-6 py-3 text-left">Gender</th>
                <th class="px-6 py-3 text-left">Rol</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["correo"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["edad"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["genero"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["tipo_usuario"]);?></td>
                    <td class="px-6 py-4">
                        <!-- Botón de Editar con ícono -->
                        <a href="edit_user.php?id=<?php echo $registro['id']; ?>" class="text-blue-600 hover:text-blue-800 mr-2">
                            <i class="fas fa-edit"></i> <!-- Ícono de editar -->
                        </a>
                        <!-- Botón de Eliminar con ícono, activando modal -->
                        <a href="#" onclick="mostrarModal(<?php echo $registro['id']; ?>)" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i> <!-- Ícono de eliminar -->
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
        <h2 class="text-xl font-semibold mb-4">User successfully deleted</h2>
    </div>
</div>
<script>
    // Mostrar el modal de éxito por 2 segundos
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000); // 2000 milisegundos = 2 segundos
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
