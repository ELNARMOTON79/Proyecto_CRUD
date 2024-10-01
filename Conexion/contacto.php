<?php

    include ("conexion.php");

    class Contacto extends Conexion {
        
        public function login($correo, $password)
        {
            // Sentencia SQL para buscar el usuario
            $this->sentencia = "SELECT nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();
    
            // Verificar si el usuario existe
            if ($row = $resultado->fetch_assoc()) {
                if ($row['correo'] == $correo && $row['password'] == $password) {
                    // Iniciar sesión y guardar variables de sesión
                    session_start();
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
    
                    // Redirigir al dashboard de acuerdo al tipo_usuario
                    switch ($row['tipo_usuario']) {
                        case 'admin':
                            header("location: ../Dashboard_Admin/dashboard.php");
                            break;
                        case 'student':
                            header("location: ../Dashboard_Alumno/dashboard.php");
                            break;
                        case 'teacher':
                            header("location: ../Dashboard_Maestro/dashboard.php");
                            break;
                        case 'donation':
                            header("location: ../Dashboard_Donacion/dashboard.php");
                            break;
                        case 'cordinator':
                            header("location: ../Dashboard_Cordinador/dashboard.php");
                            break;
                        default:
                            header("location: login.php?error=1");
                            break;
                    }
                    exit(); // Detener ejecución después de la redirección
                }
            } else {
                // Si no se encuentra el usuario, redirigir con un error
                header("location: login.php?error=1");
                exit();
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
        public function crear_actividades($nombre_actividad, $descripcion, $fk_materia, $fecha_fin) {
            $this->sentencia = "INSERT INTO actividades (nombre_actividad, descripcion, fk_materia, fecha) VALUES ('$nombre_actividad', '$descripcion', '$fk_materia', '$fecha_fin')";
            return $this->ejecutar_sentencia();
        }
        //Metodo para obtener materias de programas        
        public function obtenerMaterias() {
            $this->sentencia = "SELECT id, nombre_materia FROM programas";
            return $this->obtener_sentencia();

        }
        //Metodo para crear materias
        public function crear_materias($nombre_materia, $objetivo, $unidad) {
            $this->sentencia = "INSERT INTO programas (nombre_materia, objetivos, unidad) VALUES ('$nombre_materia', '$objetivo', '$unidad')";
            return $this->ejecutar_sentencia();
        }
        //metodo para eliminar actividades.
        public function eliminar_actividades($id){
            $this->sentencia = "DELETE FROM actividades WHERE id = '$id'";
             return $this->ejecutar_sentencia();
        }
        public function modificar_actividades($nombre_actividad, $descripcion, $fk_materia, $fecha, $duracion) {
            $this->sentencia = "UPDATE actividades SET descripcion = '$descripcion', fk_materia = '$fk_materia', fecha = '$fecha' WHERE nombre_actividad = '$nombre_actividad'";
            return $this->ejecutar_sentencia();
        }
        public function subir($name, $age, $email, $password, $gender, $role)
        {
            $this->sentencia = "INSERT INTO usuarios (nombre, correo, password, genero, edad, tipo_usuario) VALUES ('$name', '$email', '$password', '$gender', '$age', '$role')";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function subir_users($name, $age, $email, $password, $gender, $role)
        {
            $this->sentencia = "INSERT INTO usuarios (nombre, correo, password, genero, edad, tipo_usuario) VALUES ('$name', '$email', '$password', '$gender', '$age', '$role')";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function consultaxtipo($tipo_usuario)
        {
            $this->sentencia = "SELECT * FROM usuarios WHERE tipo_usuario = '$tipo_usuario'";
            $result = $this->obtener_sentencia();
            return $result;

        }
        //Contar total de maestros
        public function total_maestros(){
            $this->sentencia = "SELECT COUNT(*) as total_maestros FROM usuarios WHERE tipo_usuario = 'teacher'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Contar total de estudiantes
        public function total_estudiantes(){
            $this->sentencia = "SELECT COUNT(*) as total_estudiantes FROM usuarios WHERE tipo_usuario = 'student'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Contar total de donadores
        public function total_donadores(){
            $this->sentencia = "SELECT COUNT(*) as total_donadores FROM usuarios WHERE tipo_usuario = 'donator'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Funcion para obtener las materias de 5 en 5
        public function obtenerMateriasConLimite($offset, $limite) {
            $this->sentencia = "SELECT id, nombre_materia, objetivos, actividades, unidad FROM programas LIMIT $offset, $limite";
            return $this->obtener_sentencia();
        }
        public function contarTotalMaterias() {
            $this->sentencia = "SELECT COUNT(*) as total FROM programas";
            $resultado = $this->obtener_sentencia();
            return $resultado->fetch_assoc()['total'];
        }
    }
    
    
?>