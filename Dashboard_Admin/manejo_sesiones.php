<?php
    session_start();
    // Verifica si la sesión contiene los datos
    if (!isset($_SESSION['nombre'])) {
        // Si no existe una sesión válida, redirige al usuario a la página de login
        header('Location: ../index.php');
        exit();
    }
?>