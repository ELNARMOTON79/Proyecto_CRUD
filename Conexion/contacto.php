<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include ("conexion.php");

    class Contacto extends Conexion {
        
        //login
        public function login($correo, $password)
        {
            //Sentencia SQL de como funciona
            $this->sentencia = "SELECT nombre, correo, password, tipo_usuario FROM usuarios WHERE correo = '$correo' AND password = '$password';";
            $resultado = $this->ejecutar_sentencia();
        }
        //Metodo para consultar usuarios
        public function consultar($id, $nombre, $correo, $genero, $tipo_usuario){
            $this->sentencia = "SELECT * FROM usuarios";
            $result = $this->obtener_sentencia();
            return $result;
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
    }
?>