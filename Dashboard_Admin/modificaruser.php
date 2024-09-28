<form action="" method="post" class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow space-y-6">
    <div class="flex items-center">
        <h2 class="text-2xl font-semibold text-gray-700 ml-4">Modificar Usuario</h2>
    </div>
    
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <label for="idmodificar" class="block text-sm font-medium text-gray-700">
                <i class="fa-solid fa-user mr-2"></i>    
                Seleccionar usuario
            </label>
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

    <div class="flex justify-start space-x-4">
        <input type="submit" name="cargar" value="Cargar Datos" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-500">
    </div>
</form>

<?php
    if (isset($_POST['cargar'])) {
        $id = $_POST['idmodificar'];
        $obj = new Contacto();
        $resultado = $obj->obtenerPorId($id);

        if ($resultado) {
            $registro = $resultado->fetch_assoc();
            echo "<form action='' method='post' class='max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow space-y-6'>";
            echo "<input type='hidden' name='id' value='".$registro['id']."'>";

            echo "<div class='grid grid-cols-1 gap-6 sm:grid-cols-2'>";
            echo "<div>";
            echo "<label for='nombre' class='block text-sm font-medium text-gray-700'>";
            echo "<i class='fa-solid fa-user mr-2'></i>Nombre";
            echo "</label>";
            echo "<input type='text' name='nombre' value='".$registro['nombre']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
            echo "</div>";

            echo "<div>";
            echo "<label for='correo' class='block text-sm font-medium text-gray-700'>";
            echo "<i class='fa-solid fa-envelope mr-2'></i>Correo";
            echo "</label>";
            echo "<input type='text' name='correo' value='".$registro['correo']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
            echo "</div>";
            echo "</div>";

            echo "<div>";
            echo "<label for='edad' class='block text-sm font-medium text-gray-700'>";
            echo "<i class='fa-solid fa-cake-candles mr-2'></i>Edad";
            echo "</label>";
            echo "<input type='number' name='edad' value='".$registro['edad']."' class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'>";
            echo "</div>";

            echo "<div>";
            echo "<label for='sexo' class='block text-sm font-medium text-gray-700'>";
            echo "<i class='fa-solid fa-venus-mars mr-2'></i>Sexo";
            echo "</label>";
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
            echo "<button type='button' onclick=\"if (confirm('¿Estás seguro de que deseas cancelar?')) { window.location.href='?action=dashboards'; }\" class='inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-200 focus:outline-none transition duration-500'>Cancelar</button>";
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
