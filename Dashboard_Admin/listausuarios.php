<?php
    require_once("../Conexion/contacto.php");
    $obj = new Contacto();

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
                        <!-- Botón de Eliminar con ícono -->
                        <a href="delete_user.php?id=<?php echo $registro['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash-alt"></i> <!-- Ícono de eliminar -->
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>