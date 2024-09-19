<?php
session_start();
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Actividad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex-shrink-0 h-10 w-10 relative">
            <img class="ml-3 h-10 w-10 rounded-full translate-y-2"
                src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png"
                alt="">
        </div>
        <div>
            <h4 class="font-bold text-gray-500 p-1 py-4">Usted ingresó como <?php echo "$tipo_usuario"; ?></h4>
        </div>

        <form action="" method="post" class="space-y-6">
            <div>
                <label for="nombre_actividad" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-tasks mr-2"></i>Nombre Actividad
                </label>
                <input type="text" name="nombre_actividad" id="nombre_actividad" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-align-left mr-2"></i>Descripción
                </label>
                <textarea name="descripcion" id="descripcion" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>

            <div>
                <label for="fk_materia" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-book mr-2"></i>Materia
                </label>
                <!-- Aqui pondremos las materias que habra en la tabla programa -->
                <select name="fk_materia" id="fk_materia" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <?php
                    require_once("../Conexion/contacto.php");
                    $obj = new Contacto();
                    $resultado = $obj->obtenerMaterias(); // Asegúrate de que este método devuelva las materias con sus IDs

                    if ($resultado) {
                        while ($materia = $resultado->fetch_assoc()) {
                            echo "<option value='" . $materia['id'] . "'>" . $materia['nombre_materia'] . "</option>";
                        }
                    } else {
                        echo "<option>No se encontraron materias</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <button type="button" onclick="window.location.href='http://localhost/Proyecto_CRUD/Dashboard_Admin/dashboard.php';"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition duration-500">
                    Cancelar
                </button>
                <input type="submit" name="crear" value="Crear Actividad"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-500">
            </div>
        </form>

        <?php
        if (isset($_POST['crear'])) {
            $nombre_actividad = $_POST['nombre_actividad'];
            $descripcion = $_POST['descripcion'];
            $fk_materia = $_POST['fk_materia'];

            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $obj->crear_actividades($nombre_actividad, $descripcion, $fk_materia);

            echo "<p class='text-green-600 mt-4'>Actividad creada exitosamente.</p>";
        }
        ?>
    </div>
</body>

</html>