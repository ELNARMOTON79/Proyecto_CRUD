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

    if ($age <= 17 || $age > 60)
    {
        $mostrarExito1 =true;
    }else
    {
        // Simulando la subida de los datos
        require_once("../Conexion/contacto.php");
        $obj = new contacto();
        $obj->subir_users($name, $age, $email, $password, $gender, $role);

        // Mostrar el modal de éxito
        $mostrarExito = true;
    }
  }
?>

<!-- Formulario de Creación de Usuario -->
<form action="" method="post" class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow space-y-6">
    <h1 class="text-2xl font-bold mb-6">Create User</h1>
    <div>
        <label for="name" class="block text-sm font-medium text-green-600">Name:</label>
        <input type="text" name="name" id="name" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    </div>
    <div>
        <label for="age" class="block text-sm font-medium text-green-600">Age:</label>
        <input type="number" name="age" id="age" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-green-600">Email:</label>
        <input type="email" name="email" id="email" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
    </div>
    <div class="relative">
        <label for="password" class="block text-sm font-medium text-green-600">Password:</label>
        <input type="password" name="password" id="password" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password absolute right-3 top-10 cursor-pointer"></span>
    </div>
    <div>
        <label for="gender" class="block text-sm font-medium text-green-600">Gender:</label>
        <select name="gender" id="gender" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            <option value="" disabled selected>Select an option</option>
            <option value="Hombre">Man</option>
            <option value="Mujer">Woman</option>
        </select>
    </div>
    <div>
        <label for="role" class="block text-sm font-medium text-green-600">Role:</label>
        <select name="role" id="role" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            <option value="" disabled selected>Select an option</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
            <option value="donator">Donator</option>
            <option value="coordinator">Coordinator</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="flex justify-center">
        <button type="submit" name="enviar" class="mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Submit</button>
    </div>
</form>

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
        }, 5000);
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

<script>
    // Script para mostrar/ocultar la contraseña
    document.querySelector('.toggle-password').addEventListener('click', function (e) {
        const passwordField = document.querySelector('#password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
</script>

<!-- Incluir FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
