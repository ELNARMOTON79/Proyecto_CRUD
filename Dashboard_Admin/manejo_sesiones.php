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
            if($row['tipo_usuario'] == 'teacher'){
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
            if($row['tipo_usuario'] == 'student'){
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
            if($row['tipo_usuario'] == 'donator'){
                $total_donadores++;
            }
        }
        return $total_donadores;
    }
?>