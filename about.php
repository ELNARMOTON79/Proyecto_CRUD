<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Edu 4 All</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-cover bg-center bg-no-repeat text-gray-800" style="background-image: url('SRC/About/about1.png');">
    <!-- Navbar (Incluido desde PHP) -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main class="container mx-auto bg-white bg-opacity-80 rounded-lg p-6 mt-20 mb-20 shadow-md">
        <!-- Our Mission Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-4 text-green-600">Our Mission</h2>
            <p class="text-lg text-center text-gray-700">
                At Edu 4 All, we believe that quality education should be accessible to everyone, regardless of their background or location. Our mission is to break down barriers to learning and create a global community of lifelong learners.
            </p>
        </section>

        <!-- What We Offer Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-green-600">What We Offer</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Diverse Courses -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <div class="text-6xl mb-4 text-green-600">📚</div>
                    <h3 class="text-xl font-bold mb-2 text-green-700">Diverse Courses</h3>
                    <p class="text-gray-600">Wide range of subjects for all interests and skill levels</p>
                </div>
                <!-- Global Community -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <div class="text-6xl mb-4 text-green-600">👥</div>
                    <h3 class="text-xl font-bold mb-2 text-green-800">Global Community</h3>
                    <p class="text-gray-600">Connect with learners and educators worldwide</p>
                </div>
                <!-- Accessible Learning -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <div class="text-6xl mb-4 text-green-600">🌐</div>
                    <h3 class="text-xl font-bold mb-2 text-green-800">Accessible Learning</h3>
                    <p class="text-gray-600">Learn anytime, anywhere with our flexible online platform</p>
                </div>
            </div>
        </section>

        <!-- Meet Our Team Section -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold text-center mb-8 text-green-600">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <img src="SRC/rafa.jpg" alt="Rafael Alexandro Vuelvas Pérez" class="w-32 h-32 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-green-800">Rafael Alexandro Vuelvas Pérez</h3>
                    <p class="text-gray-600">Programmer</p>
                </div>
                <!-- Team Member 2 -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <img src="SRC/heidy.jpg" alt="Heidy Samantha Guzmán Márquez" class="w-32 h-32 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-green-800">Heidy Samantha Guzmán Márquez</h3>
                    <p class="text-gray-600">Programmer</p>
                </div>
                <!-- Team Member 3 -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md">
                    <img src="SRC/gerardo.jpg" alt="Gerardo Adonai Gutierrez Rúa" class="w-32 h-32 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-green-800">Gerardo Adonai Gutierrez Rúa</h3>
                    <p class="text-gray-600">Programmer</p>
                </div>
                <!-- Team Member 4 -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md lg:col-span-1 lg:col-start-2">
                    <img src="SRC/luis.jpg" alt="Luis Angel Alaniz Murguia" class="w-32 h-32 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-green-800">Luis Angel Alaniz Murguia</h3>
                    <p class="text-gray-600">Programmer</p>
                </div>
                <!-- Team Member 5 -->
                <div class="text-center p-6 bg-white bg-opacity-80 rounded-lg shadow-md lg:col-span-1 lg:col-start-3">
                    <img src="SRC/jesus.jpg" alt="Jesus Guadalupe Rivera Meza" class="w-32 h-32 mx-auto rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2 text-green-800">Jesus Guadalupe Rivera Meza</h3>
                    <p class="text-gray-600">Programmer</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer (Incluido desde PHP) -->
    <?php include 'footer.php'; ?>
</body>

</html>

<script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_90eabc8cd0c4b5bafabb42bb6dd7d8899'
    });
</script>