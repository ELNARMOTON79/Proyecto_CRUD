<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();

// Obtener los usuarios
$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : '';
if ($tipo_usuario !== '') {
    $resultado = $obj->consultaxtipo($tipo_usuario);
} else {
    $resultado = $obj->consultar();
}
?>

<div class="max-w-6xl translate-x-32 mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">List user</h1>

    <!-- Command Palette para filtrar -->
    <input type="text" id="commandPalette" placeholder="Search..." class="block w-1/5 p-2 border border-gray-300 rounded mb-4">

    <table class="min-w-full mx-auto table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
        <thead>
            <tr class="bg-green-600 text-white">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">E-mail</th>
                <th class="px-6 py-3 text-left">Age</th>
                <th class="px-6 py-3 text-left">Gender</th>
                <th class="px-6 py-3 text-left">Role</th>
            </tr>
        </thead>
        <tbody id="userTable">
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr class="even:bg-gray-100 hover:bg-gray-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["nombre"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["correo"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["edad"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["genero"]); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($registro["tipo_usuario"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<!-- Script para la busqueda por Command Palette -->
<script>
    document.getElementById('commandPalette').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#userTable tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const rowText = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
            row.style.display = rowText.includes(filter) ? '' : 'none';
        });
    });
</script>