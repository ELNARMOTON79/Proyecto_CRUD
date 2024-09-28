<?php
    if(isset($_POST['login']))
    {
        $correo = $_POST['email'];
        $password = $_POST['password'];
        echo $correo;
        echo $password;
        require_once '../Conexion/contacto.php';
        $obj = new Contacto();
        $obj->login($correo, $password);
    }
?>