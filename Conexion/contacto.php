<?php

    include ("conexion.php");

    class Contacto extends Conexion {
        
        //login
        public function login($correo, $password)
        {
            //Sentencia SQL de como funciona
            $this->sentencia = "SELECT nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();

            //Redirecciones de acuerdo al tipo de usuario
            if($row = $resultado->fetch_assoc()){
                if($row['correo'] == $correo && $row['password'] == $password){
                    //Guardar datos del usaurio en variables de sesion
                    session_start();
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

                    //Redirigir al dashboard de acuerdo al tipo_usuario
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

        public function eliminar ($id){  
            $this->sentencia = "DELETE FROM usuarios WHERE id = '$id'";
            $resultado = $this->ejecutar_sentencia();
            
        }
        
        public function consultar(){
            $this->sentencia = "SELECT * FROM usuarios";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function consultar_actividades() {
            $this->sentencia = "SELECT * FROM actividades";
            $resultado = $this->obtener_sentencia();
            return $resultado;
        }

        //Metodo para consultar por ID
        public function obtenerPorId($id) {
            $this->sentencia = "SELECT * FROM usuarios WHERE id = '$id'";
            return $this->obtener_sentencia();
        }
        //Metodo para modificar
        public function modificar($id, $nombre, $correo, $edad, $sexo) {
            $this->sentencia = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', edad = '$edad', genero = '$sexo' WHERE id = '$id'";
            return $this->ejecutar_sentencia();
        }
        //Metodo para crear actividades
        public function crear_actividades($nombre_actividad, $descripcion, $fk_materia, $fecha, $duracion) {
            $this->sentencia = "INSERT INTO actividades (nombre_actividad, descripcion, fk_materia, fecha, duracion) VALUES ('$nombre_actividad', '$descripcion', '$fk_materia', '$fecha', '$duracion')";
            return $this->ejecutar_sentencia();
        }
        //Metodo para obtener materias de programas        
        public function obtenerMaterias() {
            $this->sentencia = "SELECT id, nombre_materia FROM programas";
            return $this->obtener_sentencia();
        }
        //metodo para eliminar actividades.
        public function eliminar_actividades($id){
            $this->sentencia = "DELETE FROM actividades WHERE id = '$id'";
             return $this->ejecutar_sentencia();
        }
        
            
    }
    
    
?>