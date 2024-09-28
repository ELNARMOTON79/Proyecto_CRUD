<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();
$resultado = $obj->consultar_actividades();
?>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">List user</h1>
        <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Subject</th>
                    <th class="px-6 py-3 text-left">Date</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_actividad"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fk_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
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
