<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen">
    <?php include 'navbar.php'; ?>

    <div class="flex-grow">

    <section class="bg-gray-100 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">Sobre Nosotros</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Un equipo comprometido con la excelencia
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
        En [Nombre de la Empresa], nos dedicamos a ofrecer soluciones innovadoras para nuestros clientes, brindando servicios de calidad y atención personalizada.
      </p>
    </div>
  </div>

  <div class="mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Primer Bloque -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Nuestra Misión</h3>
        <p class="mt-4 text-base text-gray-500">
          Nuestra misión es ofrecer soluciones innovadoras que ayuden a nuestros clientes a superar sus retos y alcanzar sus objetivos. 
        </p>
      </div>

      <!-- Segundo Bloque -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Nuestros Valores</h3>
        <p class="mt-4 text-base text-gray-500">
          Creemos en la transparencia, el compromiso, y la dedicación a largo plazo. Estos valores nos guían en cada proyecto que emprendemos.
        </p>
      </div>

      <!-- Tercer Bloque -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Nuestro Equipo</h3>
        <p class="mt-4 text-base text-gray-500">
          Contamos con un equipo diverso y altamente capacitado, comprometido con entregar soluciones personalizadas para cada cliente.
        </p>
      </div>

      <!-- Cuarto Bloque -->
      <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Visión a Futuro</h3>
        <p class="mt-4 text-base text-gray-500">
          Nos proyectamos como una empresa líder en el sector, innovando continuamente y adaptándonos a las necesidades cambiantes del mercado global.
        </p>
      </div>
    </div>
  </div>
</section>

    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
