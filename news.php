
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <?php include ("navbar.php"); ?>
    <div class="pt-20"></div>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-center mb-6">All news</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <?php
                include ("Conexion/contacto.php");
                $contacto = new Contacto();
                $result = $contacto->buscarnews();
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='bg-white rounded-lg shadow-lg overflow-hidden'>";
                    echo "<img src='SRC/".$row['image']."' alt='Descripción de la imagen' class='w-full h-48 object-cover'>";
                    echo "<div class='p-4'>";
                    echo "<h2 class='text-xl font-bold'>".$row['titulo']."</h2>";
                    echo "<p class='text-gray-700 mb-4'>".$row['fecha_publi']."</p>";
                    echo "<a href='publicaciones.php?id=".$row['id']."'><button class='mt-2 bg-green-500 text-white px-4 py-2 rounded hover:bg-purple-700 focus:outline-none'>Read more</button></a>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
<?php include ("footer.php"); ?>
</html>
