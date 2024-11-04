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
                        case 'Administrator':
                            header("location: ../Dashboard_Admin/dashboard.php");
                            break;
                        case 'Student':
                            header("location: ../Dashboard_Alumno/dashboard.php");
                            break;
                        case 'Teacher':
                            header("location: ../Dashboard_Maestro/dashboard.php");
                            break;
                        case 'Donor':
                            header("location: ../Dashboard_Donacion/dashboard.php");
                            break;
                        case 'Cordinator':
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
            // Modificar la consulta SQL para hacer un JOIN entre actividades y programas
            $this->sentencia = "
                SELECT actividades.*, programas.nombre_materia 
                FROM actividades 
                JOIN programas ON actividades.fk_materia = programas.id";
                
            // Ejecutar la consulta y obtener los resultados
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
            $this->sentencia = "SELECT id, nombre_materia,  objetivos, actividades, unidad FROM programas";
            return $this->obtener_sentencia();

        }
        //Metodo para crear materias
        public function crear_materias($nombre_materia, $objetivo, $unidad) {
            $this->sentencia = "INSERT INTO programas (nombre_materia, objetivos, unidad) VALUES ('$nombre_materia', '$objetivo', '$unidad')";
            return $this->ejecutar_sentencia();
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
        
        //metodo para eliminar actividades.
        public function eliminar_actividades($id){
            $this->sentencia = "DELETE FROM actividades WHERE id = '$id'";
             return $this->ejecutar_sentencia();
        }
        public function modificar_actividades($id, $nombre_actividad, $descripcion, $fk_materia, $fecha) {
            $this->sentencia = "UPDATE actividades SET nombre_actividad = '$nombre_actividad', descripcion = '$descripcion', fk_materia = '$fk_materia', fecha = '$fecha' WHERE id = '$id'";
            return $this->ejecutar_sentencia();
        }
        public function obtenerPorIdactividades($id) {
            $this->sentencia = "SELECT actividades.*, programas.nombre_materia FROM actividades JOIN programas ON actividades.fk_materia = programas.id WHERE actividades.id = '$id'";
            return $this->obtener_sentencia();
        }
        
        public function subir($name, $age, $email, $password, $gender, $role)
        {
            $this->sentencia = "INSERT INTO usuarios (nombre, correo, password, genero, edad, tipo_usuario) VALUES ('$name', '$email', '$password', '$gender', '$age', '$role')";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function subir_users($name, $age, $email, $password, $gender, $role, $grade, $group)
        {
            // Insertar el usuario en la tabla usuarios
            $this->sentencia = "INSERT INTO usuarios (nombre, correo, password, genero, edad, tipo_usuario) VALUES ('$name', '$email', '$password', '$gender', '$age', '$role')";
            $result = $this->obtener_sentencia();
            
            // Obtener el ID del usuario recién creado
            $id = $this->obtener_ultimo_id(); // Ahora puedes llamar a este método

            // Verificar si la inserción del usuario fue exitosa
            if ($result) {
                // Insertar el grado junto al id del usuario registrado en la tabla grado
                $this->sentencia = "INSERT INTO grado (grado, fk_usuario) VALUES ('$grade', '$id')";
                $this->obtener_sentencia();
                
                // Insertar el grupo junto al id del usuario registrado en la tabla grupo
                $this->sentencia = "INSERT INTO grupo (grupo, fk_usuario) VALUES ('$group', '$id')";
                $this->obtener_sentencia();
            }
            
            return $result; // Devuelve el resultado de la inserción del usuario
        }
        
        public function consultaxtipo($tipo_usuario)
        {
            $this->sentencia = "SELECT * FROM usuarios WHERE tipo_usuario = '$tipo_usuario'";
            $result = $this->obtener_sentencia();
            return $result;

        }
        public function consultar_actividades_por_materia($materia_id) {
            $this->sentencia = "
                SELECT actividades.*, programas.nombre_materia 
                FROM actividades 
                JOIN programas ON actividades.fk_materia = programas.id
                WHERE actividades.fk_materia = $materia_id";  // Filtrar por el ID de la materia seleccionada
            return $this->obtener_sentencia();  // Usando el mismo método que ya tienes
        }
        //Contar total de maestros
        public function total_maestros(){
            $this->sentencia = "SELECT COUNT(*) as total_maestros FROM usuarios WHERE tipo_usuario = 'Teacher';";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Contar total de estudiantes
        public function total_estudiantes(){
            $this->sentencia = "SELECT COUNT(*) as total_estudiantes FROM usuarios WHERE tipo_usuario = 'Student';";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Contar total de donadores
        public function total_donadores(){
            $this->sentencia = "SELECT COUNT(*) as total_donadores FROM usuarios WHERE tipo_usuario = 'Donor';";
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Funcion para obtener las materias de 5 en 5
        public function consultarmaterias() {
            $this->sentencia = "SELECT * FROM programas;";
            return $this->obtener_sentencia();
        }
        public function eliminar_materias($idEliminar)
        {
            $this->sentencia = "DELETE FROM programas WHERE id = '$idEliminar';";
            $resultado = $this->ejecutar_sentencia();
        }
        public function obtenerPorIdmateria($idModificar) {
            $this->sentencia = "SELECT * FROM programas WHERE id = '$idModificar'";
            return $this->obtener_sentencia();
        }
        public function modificar_materia($id, $nombre, $objetivo, $unidad)
        {
            $this->sentencia = "UPDATE programas SET nombre_materia = '$nombre', objetivos = '$objetivo', unidad = '$unidad' WHERE id = '$id'";
            return $this->ejecutar_sentencia();
        }

        //obtener las materias
        public function obtenerMateriasConLimite1($offset, $limite) {
            $this->sentencia = "SELECT * FROM programas LIMIT $offset, $limite";
            return $this->obtener_sentencia();
        }
        
        public function contarTotalMaterias1() {
            $this->sentencia = "SELECT COUNT(*) as total FROM programas";
            $resultado = $this->obtener_sentencia();
            return $resultado->fetch_assoc()['total'];
        }

        
        // Obtener las actividades con paginación
        public function obtenerActividadesConLimite($offset, $limite) {
            $this->sentencia = "SELECT actividades.*, programas.nombre_materia FROM actividades 
                                INNER JOIN programas ON actividades.fk_materia = programas.id 
                                LIMIT $offset, $limite";
            return $this->obtener_sentencia();
        }
        
        // Contar el total de actividades
        public function contarTotalActividades() {
            $this->sentencia = "SELECT COUNT(*) as total FROM actividades";
            $resultado = $this->obtener_sentencia();
            return $resultado->fetch_assoc()['total'];
        }
        
        public function forgotPassword($email)
        {
            $this->sentencia = "SELECT * FROM usuarios WHERE correo = '$email'";
            $result = $this->obtener_sentencia();
            
            if ($result->num_rows > 0) {
                return $result->fetch_assoc(); // Devuelve un arreglo asociativo
            } else {
                return null; // Devuelve null si no se encuentran resultados
            }
        }

    }
?>