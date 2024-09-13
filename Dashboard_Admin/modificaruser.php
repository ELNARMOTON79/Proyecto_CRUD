
<form action="" method="post">
    <select name="idmodificar">
        <?php
            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $resultado = $obj->consultar($id, $nombre, $correo, $genero, $tipo_usuario);

            // Verificar si $resultado no es null antes de iterar
            if ($resultado) {
                while ($registro = $resultado->fetch_assoc()) {
                    // Usar $registro["nombre"] para mostrar el nombre en la opción
                    echo "<option value='" . $registro["id"] . "'>" . $registro["nombre"] . "</option>";
                }
            } else {
                echo "<option>No se encontraron resultados</option>";
            }
        ?>
    </select>

    <input type="submit" name="cargar" value="Cargar Datos"><br><br>
</form>

<?php
    if (isset($_POST['cargar'])) {
        $id = $_POST['idmodificar'];
        $obj = new Contacto();
        
        // Crear una función específica para obtener un registro por ID
        $resultado = $obj->obtenerPorId($id);

        if ($resultado) {
            $registro = $resultado->fetch_assoc();
            echo "<form action='' method='post'>";
            echo "<input type='hidden' name='id' value='".$registro['id']."'>";
            echo "<label for='nombre'>Nombre</label>";
            echo "<input type='text' name='nombre' value='".$registro['nombre']."'>";
            echo "<label for='correo'>Correo</label>";
            echo "<input type='text' name='correo' value='".$registro['correo']."'>";
            echo "<label for='edad'>Edad</label>";
            echo "<input type='number' name='edad' value='".$registro['edad']."'>";
            echo "<label for='sexo'>Sexo</label>";
            echo "<select name='sexo'>";
            if ($registro['sexo'] == 'Hombre') {
                echo "<option value='Hombre' selected>Hombre</option>";
                echo "<option value='Mujer'>Mujer</option>";
            } else {
                echo "<option value='Hombre'>Hombre</option>";
                echo "<option value='Mujer' selected>Mujer</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='modificar' value='Modificar'>";
            echo "</form>";
        } else {
            echo "No se pudo encontrar el registro.";
        }
    }

    if(isset($_POST['modificar'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $obj = new Contacto();
        $obj->modificar($id, $nombre, $correo, $edad, $sexo);
        echo "Datos modificados";
    }
?>
