<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();
$resultado = $obj->consultar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
      <!-- Script para usar tailwind -->
      <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script para usar la biblioteca de Fon Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .table-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: justify;
        }
        th {
            background-color: #16A34A;
            color: white;
        }
        td {
            background-color: white;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Edad</th>
                <th>Genero</th>
            </tr>
            <?php while ($registro = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($registro["nombre"]); ?></td>
                    <td><?php echo htmlspecialchars($registro["correo"]); ?></td>
                    <td><?php echo htmlspecialchars($registro["edad"]); ?></td>
                    <td><?php echo htmlspecialchars($registro["genero"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <a href="dashboard.php" style="text-decoration: none;">
            <button style="padding: 10px 15px; background-color: #16A34A; color: white; border: none; border-radius: 5px; cursor: pointer;">
                <i class="fa-solid fa-arrow-left"></i>
                Regresar
                
            </button>
        </a>
    </div>
</body>
</html>
