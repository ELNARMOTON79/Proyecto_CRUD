<?php

if (isset($_POST['reset']) && isset($_POST['codigo']) && isset($_POST['password'])) {
    $codigo = $_POST['codigo'];
    $nuevaPassword = $_POST['password'];

    $contacto = new Contacto();
    $usuario = $contacto->checkCode($codigo);

    if ($usuario) {
        // Actualizar la contraseña del usuario
        if ($contacto->actualizarPassword($usuario['id_user'], $nuevaPassword)) {
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
