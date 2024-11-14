<?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        require_once("../Conexion/contacto.php");
        $obj = new Contacto();
        $usuario = $obj->forgotPassword($email); // Asignar el resultado a $usuario
        if (!$usuario) {
            ?>
                <!-- Mensaje de error con tailwind css -->
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">The email is not registered</span>
                </div>
            <?php
        } else {
            $email = $usuario['correo'];
            $nombreDeUsuario = $usuario['nombre'];
            include 'crearcod.php';
            $codigo = codigo_aleatorio();
            $id_user = $obj->obtenerIdPorCorreo($email)['id'];

            //Imprime el id obtenido junto con el codigo generado
            echo $id_user . " " . $codigo;
            //ingresar el codigo en la bd 
            $obj->insertarCodigo($codigo, $id_user);
            include 'sendmail.php';
        }
    }
?>