<?php
    if(isset($_POST['login']))
    {
        $correo = $_POST['email'];
        $password = $_POST['password'];

        require_once '../Conexion/contacto.php';
        $obj = new Contacto();
        $obj->login($correo, $password);
    }
?>