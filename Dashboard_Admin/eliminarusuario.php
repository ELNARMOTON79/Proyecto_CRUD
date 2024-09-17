<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- Container for delete user form -->
<div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full mx-auto mt-10">
    <div class="text-center mb-6">
        <h2 class="text-3xl font-bold text-green-600">Eliminar Usuario</h2>
    </div>

    <!-- Delete User Form -->
    <form action="" method="post" class="space-y-6">
        <!-- User Selection -->
        <div>
            <label for="ideleminar" class="block mb-2 text-sm font-semibold text-gray-700">Selecciona un usuario</label>
            <select name="ideleminar" id="ideleminar" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                <?php

                    require_once("../Conexion/contacto.php");
                    $obj = new contacto();
                    if (isset($_POST["eliminar"])) {
                        $obj->eliminar($_POST["ideleminar"]);
                    }
                    $resultado = $obj->consultar();
                    while ($registro = $resultado->fetch_assoc()) {
                        echo "<option value='".$registro["id"]."'>".$registro["nombre"]."</option>";
                    }
                ?>
            </select>
        </div>

        <!-- Delete Button -->
        <div>
            <button type="submit" name="eliminar" 
                class="w-full bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300">
                Eliminar Contacto
            </button>
        </div>
    </form>

    <!-- Success Message -->
    <?php
// Simulación de eliminación
if(isset($_POST['eliminar'])){
    echo "<p id='success-message' class='mt-6 text-lg font-semibold text-center text-green-700 bg-green-100 p-4 rounded-lg'>
          Usuario eliminado correctamente</p>";
}
?>

<!-- Script para ocultar el mensaje después de 5 segundos -->
<script>
    // Espera 5 segundos y luego oculta el mensaje
    setTimeout(function() {
        var message = document.getElementById('success-message');
        if (message) {
            message.style.display = 'none';
        }
    }, 5000); // 5000 milisegundos = 5 segundos
</script>

</div>
