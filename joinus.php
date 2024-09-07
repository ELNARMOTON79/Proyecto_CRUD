<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edu4All Join Us</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center h-screen" style="background-image: url('SRC/fondo.jpg');">
  <div class="flex items-center justify-center h-full">
    <div class="relative bg-white bg-opacity-90 p-8 rounded-lg shadow-md max-w-md w-full">
      <a href="index.php" class="absolute top-0 right-0 mt-2 mr-2 text-gray-600 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </a>

      <h1 class="text-2xl font-bold text-green-600 mb-6 text-center">Join Us</h1>
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
          </select>
        </div>
        <div class="flex justify-center">
          <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
