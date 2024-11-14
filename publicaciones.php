<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <?php include ("navbar.php"); ?>
    <div class="pt-20"></div>
    <?php
        include ("Conexion/contacto.php");

        $contacto = new Contacto();
        $id = $_GET['id'];
        $result = $contacto->buscarPostPorId($id);
        //Mostrar post de acuerdo al id recibido
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container mx-auto px-4 py-6'>";
            echo "<div class='bg-white rounded-lg shadow-lg overflow-hidden'>";
            echo "</div>";
            echo "<div class='p-4'>";
            echo "<h2 class='text-3xl font-bold'>".$row['titulo']."</h2>";
            echo "<p class='text-gray-700 mb-4'>".$row['fecha_publi']."</p>";
            echo "<p class='text-gray-700 mb-4'>".$row['reporte']."</p>";
            echo "<div class='relative w-full' style='padding-bottom: 56.25%;'>"; // Mantener la proporción 16:9
            echo "<img src='SRC/".$row['image']."' alt='Descripción de la imagen' class='absolute inset-0 w-full h-full object-contain'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
    <style>
        #disqus_thread {
            width: 80%; /* Ajusta el ancho según tu preferencia */
            display: flex;
            justify-content: center; /* Centra el contenido horizontalmente */
            align-items: center; /* Centra el contenido verticalmente */
            margin: 0 auto; /* Centra el contenido horizontalmente */
        }
    </style>

</body>
<?php include ("footer.php"); ?>
</html>
