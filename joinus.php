<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edu4All Join Us</title>
  <!-- Agregar enlace de Font Awesome para los iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center h-screen" style="background-image: url('SRC/EDU4ALL 2.png');">
<div class="flex items-center justify-center h-full bg-black bg-opacity-50">
    <div class="relative bg-white p-8 rounded-lg shadow-md max-w-md w-full">
      <!-- Iconos de casita y tacha -->
      <div class="absolute top-0 right-0 mt-2 mr-2 flex space-x-4">
          <!-- Icono de casita en color verde -->
          <a href="logins/login.php" class="text-green-500 hover:text-green-700">
              <i class="fas fa-home fa-lg"></i>
          </a>
      </div>

      <!-- Título del formulario -->
      <h1 class="text-2xl font-bold text-green-600 mb-6 text-center">Join Us</h1>

      <!-- Formulario -->
      <form action="" method="post" class="space-y-4">
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
        <div>
          <label for="password" class="block text-sm font-medium text-green-600">Password:</label>
          <input type="password" name="password" id="password" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
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
            <option value="volunteer">Volunteer</option>
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
          </select>
        </div>
        <div class="mt-4 flex items-center">
          <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-green-500">
          <label for="terms" class="ml-2 text-gray-700">I accept the <a href="SRC/Politica_de_privacidad_Edu4All.pdf" class="text-green-500 underline">Terms and Conditions</a></label>
        </div>
        <div class="flex justify-center">
          <button type="submit" name="enviar" class="mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

<?php
  if (isset($_POST['enviar'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    require_once("Conexion/contacto.php");
    $obj = new contacto();
    $obj-> subir($name, $age, $email, $password, $gender, $role);
    echo "Datos Guardados";
  }
?>

<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_90eabc8cd0c4b5bafabb42bb6dd7d8899'
    });
</script>