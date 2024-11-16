<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

$id = $_SESSION['id']; 
// Consulta para obtener las materias disponibles
$materias = $obj->listarcalificacionesxusuario($id);

?>

<div class="max-w-6xl translate-x-32 mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Ratings</h1>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left"> Subjet</th>
                <th class="px-6 py-3 text-left">Unit 1</th>
                <th class="px-6 py-3 text-left">Unit 2</th>
                <th class="px-6 py-3 text-left">Unit 3</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <?php while ($registro = $materias->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["materia"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["calificacion_unidad_1"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["calificacion_unidad_2"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["calificacion_unidad_3"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>