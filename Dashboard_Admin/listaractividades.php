<?php
require_once("../Conexion/contacto.php");
$obj = new actividades();
$resultado = $obj->consultar_actividades();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de actividades</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;

        }
        th {
            background-color: #f2f2f2;
            text-align: left;

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
    <div></div>
    <table>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>fk_materia</th>
            <th>fecha</th>
            <th>duracion</th>
        </tr>
        <?php while ($registro = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $registro["nombre_actividad"]; ?></td>
                <td><?php echo $registro["descripcion"]; ?></td>
                <td><?php echo $registro["fk_materia"]; ?></td>
                <td><?php echo $registro["fecha"]; ?></td>
                <td><?php echo $registro["duracion"]; ?></td>
            
            </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p>No se encontraron actividades.</p>
<?php endif; ?>
</body>
</html>