<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Variable para controlar si se muestra el modal de éxito
$mostrarExito = false;
$mostrarExito1 = false;
$mostrarExito2 = false;

// Verificar si se ha presionado el botón de modificar
$registroParaModificar = null;
if (isset($_POST['modificarBtn']) && isset($_POST['idmodificar'])) {
    $idModificar = $_POST['idmodificar'];
    $resultadoModificar = $obj->obtenerPorId($idModificar);
    if ($resultadoModificar) {
        $registroParaModificar = $resultadoModificar->fetch_assoc();
    }
}

// Verificar si se ha enviado el formulario para modificar o crear una calificación
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $unidad_1 = $_POST['unidad_1'];
    $unidad_2 = $_POST['unidad_2'];
    $unidad_3 = $_POST['unidad_3'];

    if($unidad_1 <= 0 || $unidad_1 >= 100 || $unidad_2 <= 0 || $unidad_2 >= 100 || $unidad_3 <= 0 || $unidad_3 >= 100) {
        $mostrarExito1 = true;
    } else {
        // Verificar si ya existen las calificaciones del usuario
        $calificacionExistente = $obj->obtenerPorId($id);
        
        if ($calificacionExistente) {
            // Si ya existe, modificar la calificación
            $obj->modificar_calificacion($id, $nombre, $unidad_1, $unidad_2, $unidad_3);
            $mostrarExito2 = true;
        } else {
            // Si no existe, crear una nueva calificación
            $obj->crear_calificacion($unidad_1, $unidad_2, $unidad_3);
            $mostrarExito2 = true;
        }
    }
}

// Obtener solo los usuarios de tipo estudiante
$tipo_usuario = 'Student';
$resultado = $obj->consultaxtipo($tipo_usuario);
?>

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List Students</h1>

    <!-- Título para el input de búsqueda -->
    <label for="commandPalette" class="block text-sm font-medium text-gray-700 mb-2">Enter student name</label>
    <input type="text" id="commandPalette" placeholder="Search..." class="block w-full p-2 border border-gray-300 rounded mb-4">

    <table id="userTable" class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">E-mail</th>
                <th class="px-6 py-3 text-left">U1</th>
                <th class="px-6 py-3 text-left">U2</th>
                <th class="px-6 py-3 text-left">U3</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["correo"]); ?></td>
                    
                    <!-- Inputs de calificaciones bloqueados inicialmente -->
                    <td class="px-6 py-4">
                        <input type="number" class="w-20 border rounded-md calificacion" id="u1-<?php echo $registro['id']; ?>" value="<?php echo htmlspecialchars($registro['unidad_1'] ?? 0); ?>" disabled>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" class="w-20 border rounded-md calificacion" id="u2-<?php echo $registro['id']; ?>" value="<?php echo htmlspecialchars($registro['unidad_2'] ?? 0); ?>" disabled>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" class="w-20 border rounded-md calificacion" id="u3-<?php echo $registro['id']; ?>" value="<?php echo htmlspecialchars($registro['unidad_3'] ?? 0); ?>" disabled>
                    </td>
                    <td class="px-6 py-4">
                        <!-- Botón de Editar -->
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="idmodificar" value="<?php echo $registro['id']; ?>">
                            <button type="button" onclick="modificarCalificaciones(<?php echo $registro['id']; ?>)" class="text-blue-600 hover:text-blue-800 mr-2">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>

                        <!-- Botón de Confirmar -->
                        <a href="#" onclick="confirmarCambios(<?php echo $registro['id']; ?>)" class="text-green-600 hover:text-green-800 mr-2" id="confirmar-<?php echo $registro['id']; ?>" style="display:none;">
                            <i class="fa-solid fa-circle-check"></i> 
                        </a>
                         
                        <!-- Botón de Cancelar -->
                        <a href="#" onclick="cancelarCambios(<?php echo $registro['id']; ?>)" class="text-red-600 hover:text-red-800" id="cancelar-<?php echo $registro['id']; ?>" style="display:none;">
                            <i class="fa-solid fa-rectangle-xmark"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Script para la busqueda por Command Palette -->
<script>
    document.getElementById('commandPalette').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#userTable tbody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            row.style.display = rowText.includes(filter) ? '' : 'none';
        });
    });

// Almacenar los valores originales de las calificaciones
let valoresOriginales = {};

// Función para desbloquear los inputs del usuario específico
function modificarCalificaciones(id) {
    // Obtener los inputs de calificaciones
    const u1 = document.getElementById('u1-' + id);
    const u2 = document.getElementById('u2-' + id);
    const u3 = document.getElementById('u3-' + id);

    // Almacenar los valores originales
    valoresOriginales[id] = {
        u1: u1.value,
        u2: u2.value,
        u3: u3.value
    };

    // Desbloquear los inputs
    u1.disabled = false;
    u2.disabled = false;
    u3.disabled = false;

    // Mostrar botones de confirmar y cancelar
    document.getElementById('confirmar-' + id).style.display = 'inline';
    document.getElementById('cancelar-' + id).style.display = 'inline';
}

// Función para confirmar los cambios
function confirmarCambios(id) {
    // Bloquear nuevamente los inputs
    document.getElementById('u1-' + id).disabled = true;
    document.getElementById('u2-' + id).disabled = true;
    document.getElementById('u3-' + id).disabled = true;

    // Ocultar los botones de confirmar y cancelar
    document.getElementById('confirmar-' + id).style.display = 'none';
    document.getElementById('cancelar-' + id).style.display = 'none';

    // Mostrar mensaje de confirmación
    alert("Calificaciones confirmadas para el estudiante con ID " + id);
}

// Función para cancelar los cambios
function cancelarCambios(id) {
    // Obtener los inputs de calificaciones
    const u1 = document.getElementById('u1-' + id);
    const u2 = document.getElementById('u2-' + id);
    const u3 = document.getElementById('u3-' + id);

    // Restaurar los valores originales
    u1.value = valoresOriginales[id].u1;
    u2.value = valoresOriginales[id].u2;
    u3.value = valoresOriginales[id].u3;

    // Bloquear nuevamente los inputs
    u1.disabled = true;
    u2.disabled = true;
    u3.disabled = true;

    // Ocultar los botones de confirmar y cancelar
    document.getElementById('confirmar-' + id).style.display = 'none';
    document.getElementById('cancelar-' + id).style.display = 'none';
}
</script>

