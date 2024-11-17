
<?php

    include ("conexion.php");

    class Contacto extends Conexion {
        
        public function login($correo, $password)
        {
            // Sentencia SQL para buscar el usuario
            $this->sentencia = "SELECT id, nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();
    
            // Verificar si el usuario existe
            if ($row = $resultado->fetch_assoc()) {
                if ($row['correo'] == $correo && $row['password'] == $password) {
                    // Iniciar sesión y guardar variables de sesión
                    session_start();
                    $_SESSION['id'] = $row['id'];
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
        public function consultar_actividades($id) {
            // Modificar la consulta SQL para hacer un JOIN entre actividades y programas
            $this->sentencia = "SELECT a.id, u.nombre AS nombre_maestro, p.nombre_materia, a.nombre_actividad, a.descripcion, a.fecha
                FROM actividades a
                INNER JOIN programas p ON a.fk_materia = p.id
                INNER JOIN usuarios u ON p.mtimparte = u.id
                WHERE p.mtimparte = '$id';
                ";
                
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
            $this->sentencia = "SELECT id, nombre_materia,  objetivos, unidad FROM programas";
            return $this->obtener_sentencia();
        }
        public function listarcalificacionesxusuario($id){
            $this->sentencia = "SELECT u.id AS id_alumno, u.nombre AS nombre_alumno, m.nombre_materia AS materia, c.unidad_1 AS calificacion_unidad_1, c.unidad_2 AS calificacion_unidad_2, c.unidad_3 AS calificacion_unidad_3, c.promedio_final AS promedio FROM usuarios u JOIN calificaciones c ON u.id = c.fk_tipo_usuario JOIN programas m ON m.id = c.fk_materia JOIN grado g ON g.fk_usuario = u.id JOIN grupo gr ON gr.fk_usuario = u.id WHERE u.id = '$id'"; // Cambiado de g.grado a g.fk_usuario
            $result = $this->obtener_sentencia();
            return $result;
        }
        //Metodo para obtener materias de programas        
        public function obtenerMateriasid($id) {
            $this->sentencia = "SELECT id, nombre_materia,  objetivos, unidad FROM programas WHERE mtimparte = '$id'";
            return $this->obtener_sentencia();

        }
        //Metodo para crear materias
        public function crear_materias($nombre_materia, $objetivo, $unidad, $maestro) {
            $this->sentencia = "INSERT INTO programas (nombre_materia, objetivos, unidad, mtimparte) VALUES ('$nombre_materia', '$objetivo', '$unidad', '$maestro')";
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
    
        //Metodo para consultar por ID la calificación
        public function obtenerPorId_calificaion($id) {
            $this->sentencia = "SELECT * FROM calificaciones WHERE fk_tipo_usuario = $id";
            return $this->obtener_sentencia();
        }
        public function obtener_calificaciones()
        {
            $this->sentencia="SELECT * FROM calificaciones;";
            return $this->ejecutar_sentencia();

        }
         //metodo para crear calificacion
         public function crear_calificacion($id ,$unidad_1, $unidad_2, $unidad_3, $materia){
            $this->sentencia = "INSERT INTO calificaciones (fk_materia, unidad_1, unidad_2, unidad_3, fk_tipo_usuario) VALUES ('$materia', '$unidad_1', '$unidad_2', '$unidad_3', $id)";
            return $this->ejecutar_sentencia();
         }
         // Método para modificar calificación
        public function modificar_calificacion($id, $unidad_1, $unidad_2, $unidad_3, $materia) {
            $this->sentencia = "UPDATE calificaciones SET fk_materia = '$materia', unidad_1 = '$unidad_1', unidad_2 = '$unidad_2', unidad_3 = '$unidad_3' WHERE fk_tipo_usuario = $id";
            return $this->ejecutar_sentencia();
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
        public function obtenerMateriastodas() {
            $this->sentencia = "SELECT * FROM programas";
            return $this->obtener_sentencia();
        }
        public function consultaxtipousuario($tipo_usuario){
            $this->sentencia = "SELECT * FROM usuarios WHERE tipo_usuario = '$tipo_usuario'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function consultaxtipo($id)
        {
            $this->sentencia = "SELECT u.id, u.nombre, u.correo, g.grado FROM usuarios u INNER JOIN grado g ON u.id = g.fk_usuario WHERE u.tipo_usuario = 'Student' AND g.grado = ( SELECT g2.grado FROM grado g2 INNER JOIN usuarios u2 ON g2.fk_usuario = u2.id WHERE u2.id = '$id' LIMIT 1 );";
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
        public function consultarmateriasid($id) {
            $this->sentencia = "SELECT id, nombre_materia, objetivos, unidad FROM programas WHERE mtimparte = '$id';";
            return $this->obtener_sentencia();
        }
        public function consultarmateriaspormaestro() {
            $this->sentencia = "";
            return $this->obtener_sentencia();
        }
        public function eliminar_materias($idEliminar)
        {
            $this->sentencia = "DELETE FROM programas WHERE id = $idEliminar;";
            $this->sentencia = "DELETE FROM programas WHERE id = '$idEliminar';";     
            $resultado = $this->ejecutar_sentencia();
        }
        public function obtenerPorIdmateria($idModificar) {
            $this->sentencia = "SELECT * FROM programas WHERE id = $idModificar";
            return $this->obtener_sentencia();
        }
        public function modificar_materia($id, $nombre, $objetivo, $unidad)
        {
            $this->sentencia = "UPDATE programas SET nombre_materia = '$nombre', objetivos = '$objetivo', unidad = '$unidad' WHERE id = '$id'";
            return $this->ejecutar_sentencia();
        }
        public function donor ($cantidad1,$motivo,$fecha, $usuario)
        {
            $this->sentencia = "INSERT INTO donaciones (monto, motivo,fecha_don,fk_usuario) VALUES ('$cantidad1','$motivo','$fecha', '$usuario');";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function obtenerPorDonaciones() {
            $this->sentencia = "SELECT * FROM donaciones WHERE fk_usuario = '".$_SESSION['id']."'";
            return $this->obtener_sentencia();
        }
        //Obtener usuario logeado
        public function obtenerusuario(){
            // Obtener los datos del usuario utilizando su id en lugar del correo
            $this->sentencia = "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']."'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function modificar_datos($nombre, $correo, $password){
            $this->sentencia = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', password = '$password' WHERE id = '".$_SESSION['id']."'";
            $result = $this->obtener_sentencia();
            return $result;
        }  
        public function buscarnews(){
            $this->sentencia = "SELECT * FROM  reporte_gastos";
            $result = $this->obtener_sentencia();
            return $result;
        }   
        public function buscarPostPorId($id){
            $this->sentencia = "SELECT * FROM reporte_gastos WHERE id = '$id'";
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function crearnews($titulo, $contenido, $imagen, $date){
            $this->sentencia = "INSERT INTO reporte_gastos (titulo, fecha_publi, reporte, image) VALUES ('$titulo', '$date', '$contenido', '$imagen')";
            $result = $this->obtener_sentencia();
            return $result;
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
        
        // Contar el total de donadores
        public function contarTotalDonadores() {
            $this->sentencia = "SELECT COUNT(*) as total FROM donaciones";
            $resultado = $this->obtener_sentencia();
            return $resultado->fetch_assoc()['total'];
        }

        // Obtener el total de recursos donados
        public function obtenerTotalRecursos() {
            $this->sentencia = "SELECT SUM(monto) as total_recursos FROM donaciones";
            $resultado = $this->obtener_sentencia();
            return $resultado->fetch_assoc()['total_recursos'] ?? 0;
        }

        // Obtener el historial de las donaciones más recientes
        public function obtenerHistorialDonaciones($limite = 10) {
            // Construimos la sentencia SQL con el límite de donaciones
            $this->sentencia = "SELECT id, monto, motivo, fecha_don FROM donaciones ORDER BY id DESC LIMIT $limite";
            $resultado = $this->obtener_sentencia();

            $donaciones = [];
            while ($fila = $resultado->fetch_assoc()) {
                $donaciones[] = $fila;
            }
            return $donaciones;
        }
        public function obtenerHistorialRecursos($limite = 10){
            $this->sentencia = "SELECT id, nombre_recurso, cant FROM recursos_asignados ORDER BY id DESC LIMIT $limite";
            $resultado = $this->obtener_sentencia();

            $recursos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $recursos[] = $fila;
            }
            return $recursos;
        }

        // Asignar un nuevo recurso
        public function asignarRecurso($nombre_recurso, $cant) {
            $this->sentencia = "INSERT INTO recursos_asignados (nombre_recurso, cant) VALUES ('$nombre_recurso', $cant)";
            return $this->ejecutar_sentencia();
        }
        
        public function listaractividadesxalumno($id){
            $this->sentencia = "SELECT a.id AS actividad_id, a.nombre_actividad, a.descripcion, a.fecha, p.nombre_materia FROM actividades a JOIN programas p ON a.fk_materia = p.id JOIN grado g ON g.grado = p.unidad WHERE g.fk_usuario = '$id';"; // Cambiado de g.grado a g.fk_usuario
            $result = $this->obtener_sentencia();
            return $result;
        }
        public function listarmateriasxalumno($id){
            // Consulta SQL ajustada
            $this->sentencia = "
                SELECT 
                    p.id AS id_materia, 
                    p.nombre_materia, 
                    p.objetivos, 
                    p.unidad
                FROM 
                    programas p
                JOIN 
                    grado g ON g.fk_usuario = p.mtimparte
                WHERE 
                    g.grado = (
                        SELECT g2.grado 
                        FROM grado g2 
                        WHERE g2.fk_usuario = '$id'
                    );
            ";
            // Ejecutar la consulta y devolver los resultados
            $result = $this->obtener_sentencia();
            return $result;
        }
        
        public function forgotPassword($email)
        {
            $this->sentencia = "SELECT * FROM usuarios WHERE correo = '$email'";
            $result = $this->obtener_sentencia();
            return $result->fetch_assoc();
        }

        //Buscar obtener el id del correo
        public function obtenerIdPorCorreo($email)
        {
            $this->sentencia = "SELECT id FROM usuarios WHERE correo = '$email'";
            $result = $this->obtener_sentencia();
            return $result->fetch_assoc();
        }

        public function insertarCodigo($codigo, $id_user)
        {
            $this->sentencia = "INSERT INTO codes (code, id_user) VALUES ('$codigo', '$id_user')";
            return $this->ejecutar_sentencia();
        }

        public function checkCode($codigo)
        {
            $this->sentencia = "SELECT id_user FROM codes WHERE code = '$codigo'";
            $result = $this->obtener_sentencia();
        }

        public function listarmaestros(){
            $this->sentencia = "SELECT * FROM usuarios WHERE tipo_usuario = 'Teacher'";
            $result = $this->obtener_sentencia();
            return $result;
        }

        //crud noticias//
        public function eliminarnoticia($id) {  
            $this->sentencia = "DELETE FROM usuarios WHERE id = '$id'";
            $resultado = $this->ejecutar_sentencia();
            return $resultado;
        }
        public function consultarnoticia() {
            $this->sentencia = "SELECT * FROM reporte_gastos;";
            return $this->obtener_sentencia(); // Retorna el resultado de la consulta
        }
        public function eliminar_noticia($idEliminar)
        {
            $this->sentencia = "DELETE FROM reporte_gastos WHERE id = '$idEliminar';";     
            $resultado = $this->ejecutar_sentencia();
        }
        public function obtenerPorIdnoticia($idModificar) {
            $this->sentencia = "SELECT * FROM reporte_gastos WHERE id = '$idModificar'";
            return $this->obtener_sentencia();
        }
        public function modificar_noticia($titulo, $reporte,$image,$id)
        {
            $this->sentencia = "UPDATE reporte_gastos  SET titulo = '$titulo', reporte = '$reporte', image = '$image' WHERE id = '$id'";
            return $this->ejecutar_sentencia();
        }
        public function asignar_recursos($nombreRecurso, $cantidadRecurso){
            $this->sentencia = "INSERT INTO recursos_asignados (nombre_recurso, cant) VALUES ('$nombreRecurso', $cantidadRecurso)";
            return $this->ejecutar_sentencia();
        }   
    }
?>
