<?php
    include 'manejo_sesiones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dash Board</title>
    <!-- Script para usar tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script para usar la biblioteca de Fon Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Es el CDN para mostrar la grafica chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>
<body>
    <div class="flex flex-row">
        <!-- Aqui va el menu -->
        <?php
            include 'menu.php';
        ?>

        <!-- Aqui va el contenido -->
        <?php
            include 'mensaje_bienvenida.php';
        ?>
        
    </div>
    <!-- Script para jalar el javascripts.js-->
    <script src="javascripts.js"></script>
    
</body>
</html>