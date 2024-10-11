<?php
  $mostrarExito = false; // Variable para controlar si se muestra el modal de éxito
  $mostrarExito1 = false;

  if (isset($_POST['enviar'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    if ($age <= 17 || $age > 99)
    {
        $mostrarExito1 =true;
    } else {
        // Simulando la subida de los datos
        require_once("../Conexion/contacto.php");
        $obj = new contacto();
        $obj->subir_users($name, $age, $email, $password, $gender, $role);

        // Mostrar el modal de éxito
        $mostrarExito = true;
    }
  }
?>

<div class="inset-0 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Create User</h2>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-user mr-2"></i>Name:
                    </label>
                    <input type="text" name="name" id="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Name">
                </div>
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-hashtag mr-2"></i>Age:
                    </label>
                    <input type="number" name="age" id="age" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Age">
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-envelope mr-2"></i>Email:
                    </label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="youremail@gmail.com">
                </div>
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        <i class="fa-solid fa-lock mr-2"></i>Password:
                    </label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm pr-10" placeholder="Password">
                    <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password absolute right-2 top-7 cursor-pointer"></span>
                </div>

            </div>

            <div class="mt-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-venus-mars mr-2"></i>Gender:
                </label>
                <select name="gender" id="gender" required class="block w-full p-2 border border-gray-300 rounded">
                    <option value="" disabled selected>Select an option</option>
                    <option value="Hombre">Man</option>
                    <option value="Mujer">Woman</option>
                </select>
            </div>

            <div class="mt-4">
                <label for="role" class="block text-sm font-medium text-gray-700">
                    <i class="fa-solid fa-user-tag mr-2"></i>Role:
                </label>
                <select name="role" id="role" required class="block w-full p-2 border border-gray-300 rounded">
                    <option value="" disabled selected>Select an option</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Student">Student</option>
                    <option value="Sonator">Donator</option>
                    <option value="Cordinator">Coordinator</option>
                    <option value="Administrator">Administrator</option>
                </select>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <input type="submit" name="enviar" value="Submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700">
            </div>
        </form>
    </div>
</div>

<!-- Modal para Mensaje de Éxito -->
<?php if ($mostrarExito): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">User created successfully</h2>
    </div>
    <script>
        // Mostrar el modal de éxito por 2 segundos
        setTimeout(function() {
            document.getElementById('modalExito').classList.add('hidden');
        }, 2000);
    </script>
</div>
<?php endif; ?>

<!-- Modal para Mensaje de Error en Edad -->
<?php if ($mostrarExito1): ?>
<div id="modalExito" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
    <div class="bg-green-500 rounded-lg shadow-lg max-w-sm w-full p-8 text-white">
        <h2 class="text-xl font-semibold mb-4">Enter a valid age</h2>
    </div>
</div>
<script>
    // Mostrar el modal de error por 2 segundos
    setTimeout(function() {
        document.getElementById('modalExito').classList.add('hidden');
    }, 2000);
</script>
<?php endif;?>

<!-- Incluir FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script>
    // Bloquear números en el campo de nombre
    document.getElementById('name').addEventListener('keypress', function (e) {
        const char = String.fromCharCode(e.keyCode);
        if (!/^[a-zA-Z\s]+$/.test(char)) {
            e.preventDefault();
        }
    });

    // Bloquear letras en el campo de edad
    document.getElementById('age').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    // Validar el formulario antes de enviar
    function validateForm() {
        const name = document.getElementById('name').value;
        const age = document.getElementById('age').value;

        const nameRegex = /^[A-Za-z\s]+$/; // Solo letras y espacios
        const ageRegex = /^[0-9]+$/; // Solo números

        // Validar el campo de nombre
        if (!nameRegex.test(name)) {
            alert('Please enter a valid name (letters only).');
            return false;
        }

        // Validar el campo de edad
        if (!ageRegex.test(age)) {
            alert('Please enter a valid age (numbers only).');
            return false;
        }

        return true; // Si todo está bien, enviar el formulario
    }

    // Script para mostrar/ocultar la contraseña
    document.querySelector('.toggle-password').addEventListener('click', function (e) {
        const passwordField = document.querySelector('#password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
</script>
