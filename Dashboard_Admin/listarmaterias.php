<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Número de registros por página
$registrosPorPagina = 5;

// Obtener el número de página actual de la URL, o asignar la página 1 por defecto
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

// Calcular el offset (desde qué registro comenzar)
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Modificar la consulta para la paginación
$resultado = $obj->obtenerMateriasConLimite($offset, $registrosPorPagina);

// Contar el total de registros
$totalRegistros = $obj->contarTotalMaterias();

// Calcular el número total de páginas
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);
?>

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Listar programas</h1>
        <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="px-6 py-3 text-left">ID</th>
                    <th class="px-6 py-3 text-left">Materia</th>
                    <th class="px-6 py-3 text-left">Objetivos</th>
                    <th class="px-6 py-3 text-left">Actividades</th>
                    <th class="px-6 py-3 text-left">Unidad</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["id"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre_materia"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["objetivos"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["actividades"] ?? ''); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["unidad"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table> 
        

        <!-- Paginación -->
        <div class="flex justify-between mt-4">
            <?php if ($paginaActual > 1): ?>
                <a href="?pagina=<?php echo $paginaActual - 1; ?>" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Anterior</a>
            <?php endif; ?>

            <span>Página <?php echo $paginaActual; ?> de <?php echo $totalPaginas; ?></span>

            <?php if ($paginaActual < $totalPaginas): ?>
                <a href="?pagina=<?php echo $paginaActual + 1; ?>" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Siguiente</a>
            <?php endif; ?>
        </div>

        <br>
        <a href="dashboard.php" class="inline-block mt-4">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-500 ease-in-out">
                <i class="fa-solid fa-arrow-left"></i>
                Regresar
            </button>
        </a>
    </div>  

