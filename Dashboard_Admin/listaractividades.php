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
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_actividad"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fk_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="dashboard.php" class="inline-block mt-4">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <i class="fa-solid fa-arrow-left"></i>
                Go back
            </button>
        </a>
    </div>
