<?php
session_start();
//Aqui estoy usando Invitado como ejemplo pero se va a cambiar 
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <form action="" method="post" class="space-y-6">
            <div>
                <div class="flex-shrink-0 h-10 w-10 relative">
                    <img class="ml-3 h-10 w-10 rounded-full translate-y-2" 
                        src="https://cdn.icon-icons.com/icons2/2104/PNG/512/manager_icon_129392.png" 
                        alt="">
                </div>
                <div>
                    <h4 class="fa-2x font-bold text-gray-500 p-1 py-4">Usted ingreso como <?php echo "$tipo_usuario" ?> </h4> 
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="idmodificar" class="block text-sm font-medium text-gray-700">Seleccionar usuario</label>
                    <select name="idmodificar" id="idmodificar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <?php
                            require_once("../Conexion/contacto.php");
                            $obj = new Contacto();
                            $resultado = $obj->consultar($id, $nombre, $correo, $genero, $tipo_usuario);

                            if ($resultado) {
                                while ($registro = $resultado->fetch_assoc()) {
                                    echo "<option value='" . $registro["id"] . "'>" . $registro["nombre"] . "</option>";
                                }
                            } else {
                                echo "<option>No se encontraron resultados</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <input type="submit" name="cargar" value="Cargar Datos" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-500">
                    <button type='button' onclick="window.location.href='http://localhost/Proyecto_CRUD/Dashboard_Admin/dashboard.php';" class='inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition duration-500 ml-4'>Salir</button>
                </div>
            </div>
        </form>

        <?php
            if (isset($_POST['cargar'])) {
                $id = $_POST['idmodificar'];
                $obj = new Contacto();
                $resultado = $obj->obtenerPorId($id);

                if ($resultado) {
                    $registro = $resultado->fetch_assoc();
                    echo "<form action='' method='post' class='space-y-6 mt-8'>";
                    echo "<input type='hidden' name='id' value='".$registro['id']."'>";

                    echo "<div class='grid grid-cols-1 gap-6 sm:grid-cols-2'>";
                    echo "<div>";
                    echo "<label for='nombre' class='block text-sm font-medium text-gray-700'>Nombre</label>";
                    echo "<input type='text' name='nombre' value='".$registro['nombre']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
                    echo "</div>";

                    echo "<div>";
                    echo "<label for='correo' class='block text-sm font-medium text-gray-700'>Correo</label>";
                    echo "<input type='text' name='correo' value='".$registro['correo']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
                    echo "</div>";
                    echo "</div>";

                    echo "<div>";
                    echo "<label for='edad' class='block text-sm font-medium text-gray-700'>Edad</label>";
                    echo "<input type='number' name='edad' value='".$registro['edad']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
                    echo "</div>";

                    echo "<div>";
                    echo "<label for='sexo' class='block text-sm font-medium text-gray-700'>Sexo</label>";
                    echo "<select name='sexo' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
                    if ($registro['sexo'] == 'Hombre') {
                        echo "<option value='Hombre' selected>Hombre</option>";
                        echo "<option value='Mujer'>Mujer</option>";
                    } else {
                        echo "<option value='Hombre'>Hombre</option>";
                        echo "<option value='Mujer' selected>Mujer</option>";
                    }
                    echo "</select>";
                    echo "</div>";

                    echo "<div class='flex justify-end space-x-4 mt-6'>";
                    echo "<button type='button' onclick=\"if (confirm('¿Estás seguro de que deseas cancelar?')) { window.location.href='http://localhost/Proyecto_CRUD/Dashboard_Admin/dashboard.php'; }\" class='inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition duration-500'>Cancelar</button>";
                    echo "<input type='submit' name='modificar' value='Modificar' class='inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none transition duration-500'>";
                    echo "</div>";
                    echo "</form>";
                } else {
                    echo "<p class='text-red-600 mt-4'>No se pudo encontrar el registro.</p>";
                }
            }

            if (isset($_POST['modificar'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $edad = $_POST['edad'];
                $sexo = $_POST['sexo'];
                $obj = new Contacto();
                $obj->modificar($id, $nombre, $correo, $edad, $sexo);
                echo "<p class='text-green-600 mt-4'>Datos modificados</p>";
            }
        ?>
    </div>
</body>
</html>
