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

<div class="max-w-6xl translate-x-32 mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Ratings</h1>
    
    

        
    <input type="text" id="commandPalette" placeholder="Search..." class="block w-1/5 p-2 border border-gray-300 rounded mb-4">
    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left"> Subjet</th>
                <th class="px-6 py-3 text-left">Rating</th> <!-- Mostrar nombre de la materia -->
            </tr>
        </thead>
        <tbody id="userTable">
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td> <!-- Mostrar nombre de la materia -->
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
                    
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>