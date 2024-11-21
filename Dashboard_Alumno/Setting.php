<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();
$resultado = $obj->obtenerusuario();
$registro = $resultado->fetch_assoc();

$showConfirmModal = false; // Modal inicialmente oculto
$datosModificados = false; // Para mostrar mensaje de confirmación después de modificar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        // Procesar la modificación solo después de la confirmación
        $nombre = $_POST['name'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        
        // Aquí realizas la modificación en la base de datos
        $obj->modificar_datos($nombre, $correo, $password);

        // Actualizar las variables de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $correo;

        $datosModificados = true;
    } else {
        // Si el usuario aún no ha confirmado, se muestra el modal
        $showConfirmModal = true;
    }
}
?>

<!-- Formulario -->
<form action="" method="POST">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 gap-4">
            <div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto min-h-[400px] w-full">
                <h2 class="text-2xl font-bold mb-6 text-green-600">Setting</h2>

                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name" required
                       class="border border-gray-300 rounded-lg p-2 w-full mb-3" 
                       value="<?php echo $registro['nombre']; ?>">

                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Jcarlos@ucol.mx" required
                       class="border border-gray-300 rounded-lg p-2 w-full mb-3" 
                       value="<?php echo $registro['correo']; ?>">

                <label for="password">Password</label>
                <div class="mb-6 relative">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                           id="password" name="password" type="password" placeholder="Password" required>
                </div>

                <input type="submit" value="Save" class="bg-green-500 text-white rounded-lg py-2 px-4 w-full hover:bg-green-600">
            </div>
        </div>
    </div>
</form>

<!-- Modal de confirmación -->
<?php if ($showConfirmModal): ?>
    <div class="container mx-auto p-4 fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirm Changes</h2>
            <p class="mb-6 text-gray-600">Are you sure you want to modify the data?</p>
            <div class="flex justify-end space-x-4">
                <!-- Botón Cancelar (vuelve a cargar el formulario sin modificar) -->
                <form method="GET">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                </form>
                
                <!-- Botón Confirmar (envía los datos para procesar la modificación) -->
                <form method="POST">
                    <!-- Mantener los datos ingresados -->
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <input type="hidden" name="password" value="<?php echo htmlspecialchars($_POST['password']); ?>">
                    <input type="hidden" name="confirm" value="1">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Confirm</button>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Mostrar mensaje de confirmación si se modificaron los datos -->
<?php if ($datosModificados): ?>
    <div class="container mx-auto p-4 fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Data modified successfully</h2>
            <form method="GET">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">OK</button>
            </form>
        </div>
    </div>
<?php endif; ?>
