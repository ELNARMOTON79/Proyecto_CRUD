<?php
    session_start();
    
    // Verifica si la sesión contiene los datos
    if (!isset($_SESSION['nombre'])) {
        // Si no existe una sesión válida, redirige al usuario a la página de login
        header('Location: ../index.php');
        exit();
    }
    include '../Conexion/contacto.php';


    //Show forms para cada acción
    $showForm0 = isset($_GET['action']) && $_GET['action'] == 'dashboard';
    $showForm1 = isset($_GET['action']) && $_GET['action'] == 'donar';
    $showForm2 = isset($_GET['action']) && $_GET['action'] == 'tracking';
    $showForm3 = isset($_GET['action']) && $_GET['action'] == 'settings';
?>