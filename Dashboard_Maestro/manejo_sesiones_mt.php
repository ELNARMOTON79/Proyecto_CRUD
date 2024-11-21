<?php
    session_start();
    // Verifica si la sesión contiene los datos
    if (!isset($_SESSION['nombre'])) {
        // Si no existe una sesión válida, redirige al usuario a la página de login
        header('Location: ../index.php');
        exit();
    }
    include '../Conexion/contacto.php';

    // Funcion para obtener el total de maestros
    function total_maestros(){
        $contacto = new Contacto();
        $result = $contacto->consultar();
        $total_maestros = 0;
        return $total_maestros;
    }

    function total_estudiantes(){
        $contacto = new Contacto();
        $id = $_SESSION['id'];
        $result = $contacto->consultar_alumnos($id);
        return $result->num_rows; // Simplemente retorna el número total de filas
    }

    // Funcion para obtener el total de donadores
    function total_donadores(){
        $contacto = new Contacto();
        $result = $contacto->consultar();
        $total_donadores = 0;
        while($row = $result->fetch_assoc()){
            if($row['tipo_usuario'] == 'Donors'){
                $total_donadores++;
            }
        }
        return $total_donadores;
    }

    //Show forms para cada acción
    $showForm0 = isset($_GET['action']) && $_GET['action'] == 'dashboard';
    $showForm3 = isset($_GET['action']) && $_GET['action'] == 'listar_usuarios';
    $showForm5 = isset($_GET['action']) && $_GET['action'] == 'crear_actividades';
    $showForm6 = isset($_GET['action']) && $_GET['action'] == 'listar_actividades';
    $showForm7 = isset($_GET['action']) && $_GET['action'] == 'modificar_actividades';
    $showForm8 = isset($_GET['action']) && $_GET['action'] == 'eliminar_actividades';
    $showForm10 = isset($_GET['action']) && $_GET['action'] == 'listar_materias';
    $showForm11 = isset($_GET['action']) && $_GET['action'] == 'modificar_materias';
    $showForm12 = isset($_GET['action']) && $_GET['action'] == 'eliminar_materias';
    $showForm13 = isset($_GET['action']) && $_GET['action'] == 'settings';
    $showForm14 = isset($_GET['action']) && $_GET['action'] == 'comunicacion';
?>