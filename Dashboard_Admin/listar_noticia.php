<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

$resultado = $obj->consultarnoticia();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;
$mostrarExito2 = false;

// Verificar si se ha enviado el formulario para eliminar una actividad
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar_noticia($idEliminar);    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}

// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->consultarnoticia($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $reporte = $_POST['reporte'];
    $image = $_FILES['image']['name'];
    $ruta = "../SRC/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $ruta);
    $obj->modificar_noticia($titulo, $reporte, $image, $id);
    $mostrarExito2 = true;
}

?>
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <script src="https://cdn.tiny.cloud/1/x4b91kvixh7fmccnyfjphsxtknbb4avtj26jad4uje896w2w/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <h1 class="text-2xl font-bold mb-6">List news</h1>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Title</th>
                <th class="px-6 py-3 text-left">Action</th> 
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["titulo"]); ?></td>
                    <td class="px-6 py-4">

                        <!-- Botón de Editar con ícono -->
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="idmodificar" value="<?php echo $registro['id']; ?>">
                            <button type="submit" name="modificarBtn" class="relative group text-blue-600 hover:text-blue-800 mr-2">
                                <i class="fas fa-edit"></i>
                                <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                    Edit
                                </span>
                            </button>
                        </form>
                        <!-- Botón de Eliminar con ícono -->
                        <a href="#" onclick="mostrarModal(<?php echo $registro['id']; ?>)" class="relative group text-red-600 hover:text-red-800">
                            <i class="fas fa-trash-alt"></i>
                            <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                Delete
                            </span>
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
        <p class="mb-6 text-gray-600">Are you sure you want to delete this news?</p>
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

<!-- Modal para Confirmar modificacion -->
<div id="modalConfirmar2" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirmation of the change</h2>
        <p class="mb-6 text-gray-600">Are you sure you want to modify this news?</p>
        <div class="flex justify-end space-x-4">
            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600" 
                    onclick="ocultarModal()">Cancel</button>
            <form method="POST">
                <input type="hidden" name="id" id="modify" value="">
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
        <h2 class="text-xl font-semibold mb-4">News successfully deleted</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>
<!-- Modal para Mensaje de Éxito -->
<?php if ($mostrarExito2): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">News successfully modified</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<?php if ($registroParaModificar): ?>
<!-- Modal para Editar actividades -->
    <?php 
    // Asegurarse de obtener las materias para el modal
    $noticia = $obj->obtenerPorIdnoticia($idModificar); 
    ?>
    <div id="modalEditar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h2 class="text-xl text-green-600 font-semibold mb-4">Edit News</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $registroParaModificar['id']; ?>">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-clipboard mr-2"></i>Title
                    </label>
                    <input type="text" name="titulo" value="<?php echo $registroParaModificar['titulo']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-calendar-alt mr-2"></i>Report
                </label>
                <textarea id="contenido" name="reporte" class="shadow appearance-none border rounded w-full py-2 px-3 text-primary leading-tight focus:outline-none focus:shadow-outline h-40"><?php echo $registroParaModificar['reporte']; ?></textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-clipboard mr-2"></i>Image
                </label>
                <input type="file" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Botones Editar y Cancelar al lado del formulario -->
            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="ocultarModalEditar()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200">
                    Cancel
                </button>
                <input type="submit" onclick="mostrarModal1()" name="modificar" value="Edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
            </div>
        </form>
    </div>
</div>
<script>
    function ocultarModalEditar() {
        document.getElementById('modalEditar').classList.add('hidden');
    }
</script>
<?php endif; ?>
<script>
    // Mostrar el modal de confirmación con el ID de la actividad
    function mostrarModal(activityId) {
        document.getElementById('deleteUserId').value = activityId;
        document.getElementById('modalConfirmar').classList.remove('hidden');
    }

    // Ocultar el modal de confirmación
    function ocultarModal() {
        document.getElementById('modalConfirmar').classList.add('hidden');
    }

    // Mostrar el modal de confirmación con el ID de la actividad
    function mostrarModal1(activityId) {
        document.getElementById('modify').value = activityId;
        document.getElementById('modalConfirmar2').classList.remove('hidden');
    }
    // Ocultar el modal de confirmación
    function ocultarModal1() {
        document.getElementById('modalConfirmar2').classList.add('hidden');
    }
    tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

