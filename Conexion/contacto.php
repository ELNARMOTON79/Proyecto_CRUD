<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include ("conexion.php");

    class Contacto extends Conexion {
        
        //login
        public function login($correo, $password) {
            $this->sentencia = "SELECT nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();
            if ($row = $resultado->fetch_assoc()) {
                if ($row['correo'] == $correo && $row['password'] == $password) {
                    session_start();
                    $_SESSION['nombre'] = $row['nombre']; // Agregar nombre a la sesión
                    $_SESSION['correo'] = $correo;
                    $_SESSION['password'] = $password;
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
        
                    if ($row['tipo_usuario'] == 'admin') {
                        header("location: ../Dashboard_Admin/dashboard.php");
                    } else if ($row['tipo_usuario'] == 'student') {
                        header("location: ../Dashboard_Alumno/dashboard.php");
                    } else if ($row['tipo_usuario'] == 'teacher') {
                        header("location: ../Dashboard_Maestro/dashboard.php");
                    } else if ($row['tipo_usuario'] == 'donation') {
                        header("location: ../Dashboard_Donacion/dashboard.php");
                    } else if ($row['tipo_usuario'] == 'cordinator') {
                        header("location: ../Dashboard_Cordinador/dashboard.php");
                    }
                }
            }
        }        
    }
?>