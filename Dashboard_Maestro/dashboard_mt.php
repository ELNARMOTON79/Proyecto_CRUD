<?php
include 'manejo_sesiones_mt.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../SRC/EDU4ALL..png" class="w-25 h-17 mr-2">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="grafica.js" defer></script> <!-- Enlace al archivo JS -->
</head>
<body>
    <div class="flex flex-row">
        <!-- Aqui va el menu -->
        <?php
        include 'menu_mt.php';
        ?>
        <main class="flex-1 p-6">
            <?php
            if ((!$showForm0 && !$showForm3 && !$showForm5 && !$showForm6 && !$showForm7 && !$showForm8 && !$showForm10 && !$showForm11 && !$showForm12) || $showForm0):
                include 'mensaje_bienvenida_mt.php';
            endif;

            if ($showForm3):
                include 'lista_alumnos_mt.php';
            endif;

            if ($showForm5):
                include 'crear_actividades_mt.php';
            endif;

            if ($showForm6):
                include 'lista_actividades_mt.php';
            endif;

            if ($showForm10):
                include 'lista_materias_mt.php';
            endif;
            ?>
        </main>
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts_dmt.js"></script>
</body>
</html>
