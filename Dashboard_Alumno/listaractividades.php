<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Obtener el ID del alumno (asegúrate de que $_SESSION['id'] está definido previamente)
$id = $_SESSION['id'];

// Asigna el resultado a la variable $resultado
$resultado = $obj->listaractividadesxalumno($id);
?>

<div class="max-w-6xl translate-x-32 mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Activities</h1>
    
    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-left">Subject</th> <!-- Mostrar nombre de la materia -->
                <th class="px-6 py-3 text-left">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_actividad"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td> <!-- Mostrar nombre de la materia -->
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
