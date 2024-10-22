<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;
$mostrarExito2 = false;

// Número de filas por página
$limite = 5;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $limite; // Calcular el offset

// Obtener el número total de registros de actividades
$totalRegistros = $obj->contarTotalActividades();
$totalPaginas = ceil($totalRegistros / $limite);

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

// Obtener las actividades con límite y offset
$resultado = $obj->obtenerActividadesConLimite($offset, $limite);

// Conservar los parámetros de la URL, excepto el de la página
$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString, $queryArray);
unset($queryArray['pagina']); // Eliminar el parámetro 'pagina' de la URL
$queryString = http_build_query($queryArray);
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Activities</h1>

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
            <?php if ($resultado): ?>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_actividad"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["descripcion"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["fecha"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center">No activities found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        <?php if ($totalPaginas > 1): ?>
            <nav class="flex justify-center">
                <!-- Botón de página anterior -->
                <?php if ($paginaActual > 1): ?>
                    <a href="?<?php echo $queryString ? $queryString . '&' : ''; ?>pagina=<?php echo $paginaActual - 1; ?>" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-500">
                        &laquo;
                    </a>
                <?php endif; ?>

                <!-- Mostrar las primeras páginas -->
                <?php if ($paginaActual > 3): ?>
                    <a href="?<?php echo $queryString ? $queryString . '&' : ''; ?>pagina=1" class="px-4 py-2 mx-1 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-500">1</a>
                    <span class="px-4 py-2">...</span>
                <?php endif; ?>

                <!-- Mostrar las páginas cercanas a la página actual -->
                <?php for ($i = max(1, $paginaActual - 2); $i <= min($paginaActual + 2, $totalPaginas); $i++): ?>
                    <a href="?<?php echo $queryString ? $queryString . '&' : ''; ?>pagina=<?php echo $i; ?>" class="px-4 py-2 mx-1 <?php echo ($i == $paginaActual) ? 'bg-green-600 text-white' : 'bg-gray-300 text-gray-700'; ?> rounded-lg hover:bg-gray-400 transition duration-500">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <!-- Mostrar las últimas páginas -->
                <?php if ($paginaActual < $totalPaginas - 2): ?>
                    <span class="px-4 py-2">...</span>
                    <a href="?<?php echo $queryString ? $queryString . '&' : ''; ?>pagina=<?php echo $totalPaginas; ?>" class="px-4 py-2 mx-1 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-500">
                        <?php echo $totalPaginas; ?>
                    </a>
                <?php endif; ?>

                <!-- Botón de página siguiente -->
                <?php if ($paginaActual < $totalPaginas): ?>
                    <a href="?<?php echo $queryString ? $queryString . '&' : ''; ?>pagina=<?php echo $paginaActual + 1; ?>" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-500">
                        &raquo;
                    </a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </div>
</div>
