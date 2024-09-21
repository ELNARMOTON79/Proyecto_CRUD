<?php
include ("conexion.php");

class Contacto extends Conexion {
    
    public function login($correo, $password) {
        $stmt = $this->conexion->prepare("SELECT id, nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

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
                }
                exit();
            }
        }
        return false;
    }

    public function eliminar($id) {  
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function consultar() {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->get_result();
    }

    public function crearUsuario($name, $age, $email, $password, $gender, $role) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, correo, password, genero, edad, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $hashed_password, $gender, $age, $role);
        return $stmt->execute();
    }

    public function modificar_actividades($id, $nombre_actividad, $descripcion, $fk_materia, $fecha, $duracion) {
        $stmt = $this->conexion->prepare("UPDATE actividades SET nombre_actividad = ?, descripcion = ?, fk_materia = ?, fecha = ?, duracion = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $nombre_actividad, $descripcion, $fk_materia, $fecha, $duracion, $id);
        return $stmt->execute();
    }
}
?>