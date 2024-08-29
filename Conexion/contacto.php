<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include ("conexion.php");

    class Contacto extends Conexion {
        
        //login
        public function login() {
            $this->sentencia = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
            $result = $this->obtener_sentencia();
            return $result;
        }
    }
?>