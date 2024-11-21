<?php
require_once("../Conexion/contacto.php");
$obj = new Contacto();
$resultado = $obj->obtenerusuario();
$registro = $resultado->fetch_assoc();
?>
<form action="" method="POST" onsubmit="return validateForm()">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 gap-4">

            <!-- Support the School Section (misma altura y ancho) -->
            <div class="bg-white rounded-lg shadow p-6 max-w-lg mx-auto min-h-[400px] w-full">
                <h2 class="text-2xl font-bold mb-6 text-green-600">Donate to School</h2>
                <div class="flex items-center mb-4">
                    <i class="fa-solid fa-circle-dollar-to-slot text-2xl text-green-500"></i>
                    <div class="ml-4 flex space-x-3">
                        <!-- Botones de cantidad -->
                        <button type="button" onclick="selectAmount(5, this)"
                            class="w-8 h-8 bg-transparent border border-green-600 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white"
                            name="cantidad" value="5">5$
                        </button>
                        <button type="button" onclick="selectAmount(10, this)"
                            class="w-8 h-8 bg-transparent border border-green-600 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white"
                            name="cantidad" value="10">10$
                        </button>
                        <button type="button" onclick="selectAmount(15, this)"
                            class="w-8 h-8 bg-transparent border border-green-600 rounded-full flex items-center justify-center text-green-600 hover:bg-green-600 hover:text-white"
                            name="cantidad" value="15">15$
                        </button>
                        <input type="number" id="otherAmount" min="1" placeholder="Other" oninput="selectOtherAmount(this.value)"
                            class="w-14 h-8 bg-gray-200 rounded-full flex items-center justify-center text-center text-gray-500"
                            name="cantidad">
                    </div>
                </div>
                
                <input type="hidden" id="selectedAmount" name="selectedAmount" value="">
                Name
                <input type="text" id="name" placeholder="Name" required
                    value="<?php echo $registro['nombre']; ?>" class= "border border-gray-300 rounded-lg p-2 w-full mb-3" style= "resize: 10;" disabled>
                Reason
                <textarea placeholder="Reason" id="motivo" name="motivo" required
                    class="border border-gray-300 rounded-lg p-2 w-full mb-3 h-24 resize-none"></textarea>
                <!--Recuperar fecha-->
                <input type="hidden" name="fecha" value="<?php echo date('d/m/Y'); ?>">

                Card Holders Name
                <input type="text" id="cardname" placeholder="Juan Carlos" required
                    class="border border-gray-300 rounded-lg p-2 w-full mb-3" style= "resize: 10;">
                Card Number
                <input type="text" id="card" placeholder="1234 5678 9012 3456" required
                    class="border border-gray-300 rounded-lg p-2 w-full mb-3" style= "resize: 10;">
                CVC/CVV
                <input type="text" id="cvc" placeholder="000" required
                    class="border border-gray-300 rounded-lg p-2 w-full mb-3" style= "resize: 10;">
                Expiration Date
                <input type="text" id="vence" placeholder="MM/YY" required
                    class="border border-gray-300 rounded-lg p-2 w-full mb-3" style= "resize: 10;">
                <input type="submit"
                    class="bg-green-500 text-white rounded-lg py-2 px-4 w-full hover:bg-green-600" name="donor" value="Donate">
            </div>

        </div>
    </div>
</form>

<?php
    $mostrarMensaje = false;
    $showConfirmModal = false;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $showConfirmModal = true;
        
        if (isset($_POST['confirm'])) {
            $cantidad1 = $_POST['selectedAmount'];
            $motivo = $_POST['motivo'];
            $fecha = $_POST['fecha'];
            $usuario = $_SESSION['id'];
            $showConfirmModal = false;
            require_once("../Conexion/contacto.php");
            $obj = new Contacto();
            $obj->donor($cantidad1, $motivo, $fecha, $usuario);  // Enviar la fecha a la función donor

            $mostrarMensaje = true;
        } else {
            $showConfirmModal = true;
        }
    }

    if ($mostrarMensaje): ?>
        <div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
            <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
                <h2 class="text-xl font-semibold mb-4">¡Thank you for donating!</h2>
            </div>
            <script>
                // Mostrar el modal de éxito por 2 segundos
                setTimeout(function() {
                    document.getElementById('modalExito').classList.add('hidden');
                }, 2000);
            </script>
        </div>
<?php endif; ?>

<?php if ($showConfirmModal): ?>
    <div class="container mx-auto p-4 fixed inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Confirm donation</h2>
            <p class="mb-6 text-gray-600">Are you sure you want to donation?</p>
            <div class="flex justify-end space-x-4">
                <!-- Botón Cancelar (vuelve a cargar el formulario sin modificar) -->
                <form method="GET">
                    <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                </form>
                
                <!-- Botón Confirmar (envía los datos para procesar la modificación) -->
                <form method="POST">
                    <input type="hidden" name="motivo" value="<?php echo htmlspecialchars($_POST['motivo']); ?>">
                    <input type="hidden" name="selectedAmount" value="<?php echo htmlspecialchars($_POST['selectedAmount']); ?>">
                    <input type="hidden" name="fecha" value="<?php echo htmlspecialchars($_POST['fecha']); ?>">
                    <input type="hidden" name="confirm" value="1">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Confirm</button>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    
function selectAmount(amount, button) {
    // Establecer la cantidad seleccionada en el campo oculto
    document.getElementById('selectedAmount').value = amount;

    // Remover la clase "activo" de todos los botones
    const buttons = document.querySelectorAll('button[name="cantidad"]');
    buttons.forEach(btn => {
        btn.classList.remove('bg-green-600', 'text-white');
        btn.classList.add('bg-transparent', 'text-green-600');
    });

    // Agregar la clase "activo" al botón seleccionado
    button.classList.add('bg-green-600', 'text-white');
    button.classList.remove('bg-transparent', 'text-green-600');

    // Limpiar el campo de "Other" si se selecciona un botón
    document.getElementById('otherAmount').value = '';
}

function selectOtherAmount(amount) {
    // Establecer la cantidad "Other" en el campo oculto
    document.getElementById('selectedAmount').value = amount;

    // Remover la clase "activo" de todos los botones
    const buttons = document.querySelectorAll('button[name="cantidad"]');
    buttons.forEach(btn => {
        btn.classList.remove('bg-green-600', 'text-white');
        btn.classList.add('bg-transparent', 'text-green-600');
    });
}

// Bloquear números en el campo de nombre
document.getElementById('name').addEventListener('keypress', function (e) {
    const char = String.fromCharCode(e.keyCode);
    if (!/^[a-zA-Z\s]+$/.test(char)) {
        e.preventDefault();
    } else if (this.value.length > 50) {
        this.value = this.value.slice(0, 50);
    }
});

// Bloquear números en el campo de motivo
document.getElementById('motivo').addEventListener('keypress', function (e) {
    const char = String.fromCharCode(e.keyCode);
    if (!/^[a-zA-Z\s]+$/.test(char)) {
        e.preventDefault();
    } else if (this.value.length > 50) {
        this.value = this.value.slice(0, 50);
    }
});

// Bloquear letras en el campo de cantidad (input "other") y limitar a 4 dígitos
document.getElementById('otherAmount').addEventListener('input', function (e) {
    // Reemplazar cualquier carácter que no sea un número
    this.value = this.value.replace(/[^0-9]/g, '');
    
    // Limitar el valor a un máximo de 4 dígitos
    if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
});

// Validar el formulario antes de enviar
function validateForm() {
    const name = document.getElementById('name').value;
    const amount = document.getElementById('selectedAmount').value;
    const motivo = document.getElementById('motivo').value;

    const nameRegex = /^[A-Za-z\s]+$/; // Solo letras y espacios
    const amountRegex = /^[0-9]{1,4}$/; // Solo números de hasta 4 dígitos

    // Validar el campo de nombre
    if (!nameRegex.test(name)) {
        alert('Please enter a valid name.');
        return false;
    }

    // Validar el campo de motivo
    if (!nameRegex.test(motivo)) {
        alert('Please enter a valid reason.');
        return false;
    }

    // Validar el campo de cantidad
    if (!amountRegex.test(amount)) {
        alert('Please enter a valid amount.');
        return false;
    }

    if (amount > 9000 || amount < 5) {
        alert('Please enter an amount between 5 and 9000.');
        return false;
    }
    

    return true; // Si todo está bien, enviar el formulario
}
//validar tarjeta como los otros imputs
document.getElementById('cardname').addEventListener('keypress', function (e) {
    const char = String.fromCharCode(e.keyCode);
    if (!/^[a-zA-Z\s]+$/.test(char)) {
        e.preventDefault();
    }
    else if (this.value.length > 50) {
        this.value = this.value.slice(0, 50);
    }
});
document.getElementById('card').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 16) {
        this.value = this.value.slice(0, 16);
    }
});
document.getElementById('cvc').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 3) {
        this.value = this.value.slice(0, 3);
    }
});
document.getElementById('vence').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9/]/g, '');
    if (this.value.length > 5) {
        this.value = this.value.slice(0, 5);
    }
});
document.getElementById('vence').addEventListener('input', function (e) {
    let value = this.value.replace(/[^0-9]/g, ''); // Solo permitir números

    // Verificar si el usuario está eliminando hacia atrás
    if (e.inputType === 'deleteContentBackward') {
        // Si se borra justo después de la barra o cuando solo hay dos dígitos y la barra
        if (this.value.length === 3 && this.value.includes('/')) {
            this.value = this.value.slice(0, 2); // Eliminar la barra "/" automáticamente
            return;
        }
    }

    // Insertar la barra "/" después de los primeros dos dígitos si hay más de dos dígitos
    if (value.length >= 2) {
        this.value = value.slice(0, 2) + '/' + value.slice(2);
    } else {
        this.value = value; // Si el valor es menor a 2 dígitos, solo mostrar los números ingresados
    }

    // Limitar a un máximo de 5 caracteres (MM/YY)
    if (this.value.length > 5) {
        this.value = this.value.slice(0, 5);
    }
});
// Función para formatear el número de tarjeta
document.getElementById('card').addEventListener('input', function (e) {
    // Reemplazar cualquier carácter que no sea un número
    let value = this.value.replace(/\D/g, ''); // Solo números
    let formattedValue = '';

    // Formatear en grupos de 4 dígitos
    for (let i = 0; i < value.length; i += 4) {
        formattedValue += value.substring(i, i + 4) + ' '; // Agregar espacio después de cada grupo de 4
    }

    // Actualizar el valor del campo y eliminar el espacio al final
    this.value = formattedValue.trim();

    // Limitar a un máximo de 19 caracteres (16 números y 3 espacios)
    if (this.value.length > 19) {
        this.value = this.value.slice(0, 19);
    }
});


</script>