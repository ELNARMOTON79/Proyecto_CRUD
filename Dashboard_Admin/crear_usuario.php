
      <form action="" method="post" class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow space-y-6">
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
            <option value="Man">Man</option>
            <option value="Woman">Woman</option>
          </select>
        </div>
        <div>
          <label for="role" class="block text-sm font-medium text-green-600">Role:</label>
          <select name="role" id="role" required class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            <option value="" disabled selected>Select an option</option>
            <option value="volunteer">Volunteer</option>
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


<?php
  if (isset($_POST['enviar'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    require_once("../Conexion/contacto.php");
    $obj = new contacto();
    $obj-> subir_users($name, $age, $email, $password, $gender, $role);
    echo "Datos Guardados";
  }
?>