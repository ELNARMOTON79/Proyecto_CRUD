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
        while($row = $result->fetch_assoc()){
            if($row['tipo_usuario'] == 'Teacher'){
                $total_maestros++;
            }
        }
        return $total_maestros;
    }

    // Funcion para obtener el total de estudiantes
    function total_estudiantes(){
        $contacto = new Contacto();
        $result = $contacto->consultar();
        $total_estudiantes = 0;
        while($row = $result->fetch_assoc()){
            if($row['tipo_usuario'] == 'Student'){
                $total_estudiantes++;
            }
        }
        return $total_estudiantes;
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
    $showForm1 = isset($_GET['action']) && $_GET['action'] == 'crear_usuario';
    $showForm2 = isset($_GET['action']) && $_GET['action'] == 'modificar_usuario';
    $showForm3 = isset($_GET['action']) && $_GET['action'] == 'listar_usuarios';
    $showForm4 = isset($_GET['action']) && $_GET['action'] == 'eliminar_usuario';
    $showForm5 = isset($_GET['action']) && $_GET['action'] == 'crear_actividades';
    $showForm6 = isset($_GET['action']) && $_GET['action'] == 'listar_actividades';
    $showForm7 = isset($_GET['action']) && $_GET['action'] == 'modificar_actividades';
    $showForm8 = isset($_GET['action']) && $_GET['action'] == 'eliminar_actividades';
    $showForm9 = isset($_GET['action']) && $_GET['action'] == 'crear_materias';
    $showForm10 = isset($_GET['action']) && $_GET['action'] == 'listar_materias';
    $showForm11 = isset($_GET['action']) && $_GET['action'] == 'modificar_materias';
    $showForm12 = isset($_GET['action']) && $_GET['action'] == 'eliminar_materias';
?>