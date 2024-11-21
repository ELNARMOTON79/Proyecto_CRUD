<?php

if (isset($_POST['reset']) && isset($_POST['codigo']) && isset($_POST['password'])) {
    $codigo = $_POST['codigo'];
    $nuevaPassword = $_POST['password'];

    $contacto = new Contacto();
    $usuario = $contacto->checkCode($codigo);

    $mostrarExito = false;
    if ($usuario) {
        // Actualizar la contraseña del usuario
        if ($contacto->actualizarPassword($usuario['id_user'], $nuevaPassword)) {
            $mostrarExito = true;
            // Eliminar el código de la base de datos
            if ($contacto->eliminarCodigo($codigo)) {
                echo "<div class='error-message mt-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-md'>Password reset successfully</div>";
                header("Location: ../logins/login.php");
                exit;
            } else {
                echo "<div class='error-message mt-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded-md'>Error deleting the recovery code</div>";
            }
        } else {
            echo "<div class='error-message mt-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded-md'>Password recovery error</div>";
        }
    } else {
        echo "<div class='error-message mt-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded-md'>Invalid recovery code</div>";
    }
} else {
    echo "<div class='error-message mt-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded-md'>Incomplete data</div>";
}
?>
<?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Password Recovery</h2>
    </div>
    <script>
        // Mostrar el modal de éxito por 2 segundos
        setTimeout(function() {
            document.getElementById('modalExito').classList.add('hidden');
        }, 2000);
    </script>
</div>
<?php endif; ?>
