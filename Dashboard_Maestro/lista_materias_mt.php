<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Realizar la consulta para obtener todas las materias
$id = $_SESSION['id'];
$resultado = $obj->consultarmateriasid($id); // No se pasa offset ni límite
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">Subjects List</h1>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Subject</th>
                <th class="px-6 py-3 text-left">Objective</th>
                <th class="px-6 py-3 text-left">Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($resultado): // Verificar si hay resultados ?>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["objetivos"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["unidad"]); ?></td>
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
