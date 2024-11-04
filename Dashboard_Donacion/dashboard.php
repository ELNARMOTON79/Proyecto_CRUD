<?php
    include 'manejo_sesiones.php';
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
    <link rel="icon" href="../SRC/EDU4ALL..png"  class="w-25 h-17 mr-2">
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
                if ((!$showForm0 && !$showForm1 && !$showForm2 && !$showForm3) || $showForm0):
                    include 'mensaje_bienvenida.php';
                endif;
                if ($showForm0):
                    include 'mensaje_bienvenida.php';
                endif;
                if ($showForm1):
                    include 'Donor.php';
                endif;
                if ($showForm2):
                    include 'Donation tracking.php';
                endif;
                if ($showForm3):
                    include 'Setting.php';
                endif;
            ?>
        </main>
        
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
    
</body>
</html>

