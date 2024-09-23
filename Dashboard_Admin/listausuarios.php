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
    <title>Lista de Usuarios.</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .table-container {
            max-width: 900px; /* Limita el ancho de la tabla */
            margin: 0 auto; /* Centra la tabla horizontalmente */
            padding: 20px; /* Espacio alrededor de la tabla */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px; /* Bordes redondeados */
            overflow: hidden; /* Para que los bordes redondeados se apliquen bien */
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para darle algo de profundidad */
        }
        th, td {
            padding: 12px 15px;
            text-align: justify; /* Justificación del contenido */
        }
        th {
            background-color: #16A34A; /* Color de fondo de la cabecera */
            color: white;
        }
        td {
            background-color: white; /* Color de las celdas de datos */
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Alternancia de color para filas pares */
        }
        tr:hover {
            background-color: #ddd; /* Color al hacer hover sobre las filas */
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
    </div>
</body>
</html>
