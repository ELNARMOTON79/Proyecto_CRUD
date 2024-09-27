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
    <link rel="stylesheet" href="styles/style_about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-cover bg-center" style="background-image: url('SRC/About/about1.png');">
    <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero"></section> <br><br><br>

    <!-- Mission Statement -->
    <section class="mission">
        <div class="container text-center">
            <h2>Our Mission</h2>
            <p>At Edu 4 All, we believe that quality education should be accessible to everyone, regardless of their background or location. Our mission is to break down barriers to learning and create a global community of lifelong learners.</p>
        </div>
    </section>

    <section class="features">
    <div class="container">
        <div class="text-center bg-white/30 backdrop-blur-lg p-4 rounded-lg">
        <h2 class="text-center text-4xl font-bold mb-8">what we offer</h2>
           
        </div>
        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-icon">📚</div>
                <h3>Diverse Courses</h3>
                <p>Wide range of subjects for all interests and skill levels</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">👥</div>
                <h3>Global Community</h3>
                <p>Connect with learners and educators worldwide</p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">🌐</div>
                <h3>Accessible Learning</h3>
                <p>Learn anytime, anywhere with our flexible online platform</p>
            </div>
        </div>
    </div>
</section>


    <!-- Team Section -->
<section class="team py-12">
    <div class="container mx-auto">
    <div class="text-center bg-white/30 backdrop-blur-lg p-4 rounded-lg">
    <h2 class="text-center text-4xl font-bold mb-8">Meet Our Team</h2> 
 </div>
 <br></br>
        <div class="flex flex-wrap justify-center items-center gap-8">
        <div class="team-member text-center">
                <img src="SRC/rafa.jpg" alt="Rafa" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Rafael Alexandro Vuelvas Pérez</h3>
                <p class="text-gray-600">programmer</p>
            </div>
            <div class="team-member text-center">
                <img src="SRC/heidy.jpg" alt="Heidy" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Heidy Samantha Guzmán Márquez</h3>
                <p class="text-gray-600">Programmer</p>
            </div>
            <div class="team-member text-center">
                <img src="" alt="Gerardo" height="200" width="200" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Gerardo Adonai Gutierrez Rúa</h3>
                <p class="text-gray-600">Programmer</p>
            </div>
            <div class="team-member text-center">
                <img src="" alt="Luis" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Luis Angel Alaniz Murguia</h3>
                <p class="text-gray-600">Programmer</p>
            </div>
            <div class="team-member text-center">
                <img src="SRC/jesus.jpg" alt="Jesus" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Jesus Guadalupe Rivera Meza</h3>
                <p class="text-gray-600">Programmer</p>
            </div>
        </div>
    </div>
</section>
    
    <?php include 'footer.php'; ?>

</body>

</html>
