<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;
$mostrarExito1 = false;
$mostrarExito2 = false;

// Verificar si se ha enviado el formulario para eliminar un usuario
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    $idEliminar = $_POST['id'];
    $obj->eliminar($idEliminar);
    
    // Activar la variable para mostrar el modal de éxito
    $mostrarExito = true;
}

// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->obtenerPorId($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

// Verificar si se ha enviado el formulario para modificar un usuario
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    if($edad <=0 || $edad > 99)
    {
        $mostrarExito1 = true;
    }else{
        $obj->modificar($id, $nombre, $correo, $edad, $sexo);
        $mostrarExito2 = true;
    }
}

// Obtener los usuarios
$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';
if ($tipo_usuario !== '') {
    $resultado = $obj->consultaxtipo($tipo_usuario);
} else {
    $resultado = $obj->consultar();
}
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List user</h1>
    
    <!-- Formulario de filtro -->
    <form method="POST" class="mb-4" id="filterForm">
        <label for="tipo_usuario" class="block mb-2 text-gray-700">Filter by user role:</label>
        <select name="tipo_usuario" id="tipo_usuario" class="block w-full p-2 border border-gray-300 rounded" onchange="document.getElementById('filterForm').submit();">
            <option value="">All Roles</option>
            <option value="Admin" <?php echo $tipo_usuario == 'Admin' ? 'selected' : ''; ?>>Administrator</option>
            <option value="Teacher" <?php echo $tipo_usuario == 'Teacher' ? 'selected' : ''; ?>>Teacher</option>
            <option value="Student" <?php echo $tipo_usuario == 'Student' ? 'selected' : ''; ?>>Student</option>
            <option value="donator" <?php echo $tipo_usuario == 'donator' ? 'selected' : ''; ?>>Donator</option>
            <option value="coordinator" <?php echo $tipo_usuario == 'coordinator' ? 'selected' : ''; ?>>Cordinator</option>
        </select>
    </form>

    <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">E-mail</th>
                <th class="px-6 py-3 text-left">Age</th>
                <th class="px-6 py-3 text-left">Gender</th>
                <th class="px-6 py-3 text-left">Role</th>
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
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="idmodificar" value="<?php echo $registro['id']; ?>">
                            <button type="submit" name="modificarBtn" class="relative group text-blue-600 hover:text-blue-800 mr-2">
                                <i class="fas fa-edit"></i>
                                <span class="absolute bottom-full mb-2 hidden w-max p-2 text-xs text-white bg-gray-700 rounded opacity-0 group-hover:block group-hover:opacity-100">
                                    Edit
                                </span>
                            </button>
                        </form>
                        <!-- Botón de Eliminar con ícono, activando modal -->
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
        <p class="mb-6 text-gray-600">Are you sure you want to delete this user?</p>
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

<!-- Modal para Mensaje de Éxito -->
<?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">User successfully deleted</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<?php if ($mostrarExito2): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">User successfully modified</h2>
    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif; ?>

<!-- Modal para Editar Usuario -->
<?php if ($registroParaModificar): ?>
<div id="modalEditar" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit User</h2>
        <form action="" method="POST" onsubmit="return validateEditForm()">
            <input type="hidden" name="id" value="<?php echo $registroParaModificar['id']; ?>">

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-user mr-2"></i>Name
                    </label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $registroParaModificar['nombre']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-envelope mr-2"></i>Email
                    </label>
                    <input type="text" name="correo" value="<?php echo $registroParaModificar['correo']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <div>
                <label for="edad" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-cake-candles mr-2"></i>Age
                </label>
                <input type="number" name="edad" id="edad" value="<?php echo $registroParaModificar['edad']; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div>
                <label for="sexo" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-venus-mars mr-2"></i>Gender
                </label>
                <select name="sexo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="Hombre" <?php echo $registroParaModificar['genero'] == 'Hombre' ? 'selected' : ''; ?>>Man</option>
                    <option value="Mujer" <?php echo $registroParaModificar['genero'] == 'Mujer' ? 'selected' : ''; ?>>Woman</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="ocultarModalEditar()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200">Cancel</button>
                <input type="submit" name="modificar" value="Edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
            </div>
        </form>
    </div>
</div>
<script>
    function ocultarModalEditar() {
        document.getElementById('modalEditar').classList.add('hidden');
    }

    // Bloquear números en el campo de nombre
    document.getElementById('nombre').addEventListener('keypress', function (e) {
        const char = String.fromCharCode(e.keyCode);
        if (!/^[a-zA-Z\s]+$/.test(char)) {
            e.preventDefault();
        }
    });

    // Bloquear letras en el campo de edad
    document.getElementById('edad').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Validar el formulario antes de enviar
    function validateEditForm() {
        const nombre = document.getElementById('nombre').value;
        const edad = document.getElementById('edad').value;

        const nameRegex = /^[A-Za-z\s]+$/; // Solo letras y espacios
        const ageRegex = /^[0-9]+$/; // Solo números

        // Validar el campo de nombre
        if (!nameRegex.test(nombre)) {
            alert('Please enter a valid name (letters only).');
            return false;
        }

        // Validar el campo de edad
        if (!ageRegex.test(edad)) {
            alert('Please enter a valid age (numbers only).');
            return false;
        }

        return true; // Si todo está bien, enviar el formulario
    }
</script>
<?php endif; ?>


<!-- Scripts -->
<script>
    // Mostrar el modal de confirmación con el ID del usuario
    function mostrarModal(userId) {
        document.getElementById('deleteUserId').value = userId;
        document.getElementById('modalConfirmar').classList.remove('hidden');
    }

    // Ocultar el modal de confirmación
    function ocultarModal() {
        document.getElementById('modalConfirmar').classList.add('hidden');
    }
</script>
<!-- Modal para Mensaje de Error en Edad -->
<?php if ($mostrarExito1): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Enter a valid age</h2>
    </div>
</div>
<script>
    // Mostrar el modal de error por 2 segundos
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif;?>