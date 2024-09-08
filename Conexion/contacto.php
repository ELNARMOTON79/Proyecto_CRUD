<?php

    include ("conexion.php");

    class Contacto extends Conexion {
        
        //login
        public function login($correo, $password)
        {
            $this->sentencia = "SELECT nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();

            //Redirecciones de acuerdo al tipo de usuario
            if($row = $resultado->fetch_assoc()){
                if($row['correo'] == $correo && $row['password'] == $password){
                    session_start();
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

                    if($row['tipo_usuario'] == 'admin')
                    {
                        header("location: ../Dashboard_Admin/dashboard.php");
                    }
                    if($row['tipo_usuario'] == 'student')
                    {
                        header("location: ../Dashboard_Alumno/dashboard.php");
                    }
                    if($row['tipo_usuario'] == 'teacher')
                    {
                        header("location: ../Dashboard_Maestro/dashboard.php");
                    }
                    if($row['tipo_usuario'] == 'donation')
                    {
                        header("location: ../Dashboard_Donacion/dashboard.php");
                    }
                    if($row['tipo_usuario'] == 'cordinator')
                    {
                        header("location: ../Dashboard_Cordinador/dashboard.php");
                    }
                }
            }
        }
    }
?>