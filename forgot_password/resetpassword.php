<?php
    if (isset($_GET['code'])) {
        $codigo = htmlspecialchars($_GET['code']);
        echo $codigo;
        //verificar codigo con la base de datos
        include_once '../Conexion/contacto.php';
        $obj = new Contacto();
        $id = $obj->checkCode($codigo);
    }
?>