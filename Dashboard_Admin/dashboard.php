<?php
    include 'manejo_sesiones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>
<body>
    <div class="flex flex-row">
        <!-- Aqui va el menu -->
        <?php
            include 'menu.php';
        ?>
        <main class="flex-1 p-6">
            <?php
                if ((!$showForm0 && !$showForm1 && !$showForm2 && !$showForm3 && !$showForm4 && !$showForm5 && !$showForm6 && !$showForm7 && !$showForm8 && !$showForm9 && !$showForm10 && !$showForm11 && !$showForm12) || $showForm0):
                    include 'mensaje_bienvenida.php';
                endif;

                if ($showForm1):
                    include 'crear_usuario.php';
                endif;

                if ($showForm2):
                    include 'modificaruser.php';
                endif;

                if ($showForm3):
                    include 'listausuarios.php';
                endif;

                if ($showForm4):
                    include 'eliminarusuario.php';
                endif;

                if ($showForm5):
                    include 'crear_actividades.php';
                endif;

                if ($showForm6):
                    include 'listaractividades.php';
                endif;

                if ($showForm7):
                    include 'modificar_actividades.php';
                endif;

                if ($showForm8):
                    include 'eliminaractividad.php';
                endif;

                if ($showForm9):
                    include 'crear_materias.php';
                endif;

                if ($showForm10):
                    include '#';
                endif;

                if ($showForm11):
                    include '#';
                endif;

                if ($showForm12):
                    include 'eliminar_materias.php';
                endif;
            ?>
        </main>
        
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
    
</body>
</html>