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

    function total_donadores() {
        $contacto = new Contacto();
        // Obtenemos el total directamente sin hacer iteraciones
        $total_donadores = $contacto->contarTotalDonadores();
        return $total_donadores;
    }
    

    //Show forms para cada acción
    $showForm0 = isset($_GET['action']) && $_GET['action'] == 'dashboard';
    $showForm1 = isset($_GET['action']) && $_GET['action'] == 'listar_usuarios';
    $showForm2 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm3 = isset($_GET['action']) && $_GET['action'] == 'listar_actividades';
    $showForm4 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm5 = isset($_GET['action']) && $_GET['action'] == 'listar_materias';
    $showForm6 = isset($_GET['action']) && $_GET['action'] == 'resources';
    $showForm7 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm8 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm9 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm10 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm11 = isset($_GET['action']) && $_GET['action'] == '#';
    $showForm12 = isset($_GET['action']) && $_GET['action'] == '#';
?>