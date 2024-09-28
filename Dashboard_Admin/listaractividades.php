<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();
$resultado = $obj->consultar_actividades();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List activities</title>
    <!-- Script para usar tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script para usar la biblioteca de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<<<<<<< HEAD
<body>
    <div></div>
    <table>
        <tr>
            <th>name</th>
            <th>Description</th>
            <th>Subject</th>
            <th>Date</th>
        </tr>
        <?php while ($registro = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $registro["nombre_actividad"]; ?></td>
                <td><?php echo $registro["descripcion"]; ?></td>
                <td><?php echo $registro["fk_materia"]; ?></td>
                <td><?php echo $registro["fecha"]; ?></td>
            
            </tr>
        <?php endwhile; ?>
    </table>
=======
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6">List activities</h1>
        <table class="min-w-full table-auto border-collapse border border-gray-300 rounded-lg overflow-hidden shadow">
            <thead>
                <tr class="bg-green-600 text-white">
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Subject</th>
                    <th class="px-6 py-3 text-left">Date</th>
                    <th class="px-6 py-3 text-left">Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($registro = $resultado->fetch_assoc()): ?>
                    <tr class="even:bg-gray-100 hover:bg-gray-200">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["Name"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["Description"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["Subject"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["Date"]); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($registro["Duration"]); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p>No activities found.</p>
        <br>
        <a href="dashboard.php" class="inline-block mt-4">
            <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                <i class="fa-solid fa-arrow-left"></i>
                Go back
            </button>
        </a>
    </div>
>>>>>>> 127a1ee3a8e78be47dbdda75328b50c4b5a1706d
</body>
</html>
