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

<body class="flex flex-col min-h-screen bg-cover bg-center" style="background-image: url('SRC/About/background.jpg');">
    <?php include 'navbar.php'; ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .mission, .features, .team {
            padding: 60px 0;
        }

        .mission {
            background-color: #ADD8E6;
            font-size: 1.25rem; /* Aumenta el tamaño del texto en toda la sección */
        }

        .mission h2 {
            font-size: 2.5rem; /* Ajusta el tamaño del título */
        }

        .mission p {
            font-size: 1.5rem; /* Ajusta el tamaño del párrafo */
        }

        .feature-grid, .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item, .team-member {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2em;
            color: #2e7d32;
            margin-bottom: 15px;
        }

        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        h2 {
            color: #1b5e20;
        }

        h3 {
            color: #2e7d32;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero"></section> <br><br><br>

    <!-- Mission Statement -->
    <section class="mission">
        <div class="container text-center">
            <h2>Our Mission</h2>
            <p>At Edu 4 All, we believe that quality education should be accessible to everyone, regardless of their background or location. Our mission is to break down barriers to learning and create a global community of lifelong learners.</p>
        </div>
    </section>

    <!-- Key Features -->
    <section class="features">
        <div class="container">
            <h2 class="text-center">What We Offer</h2>
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
        <h2 class="text-center text-4xl font-bold mb-8">Meet Our Team</h2>
        <div class="flex flex-wrap justify-center items-center gap-8">
        <div class="team-member text-center">
                <img src="/placeholder.svg?height=200&width=200" alt="Heydi la Cpera" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Rafa (Lider)</h3>
                <p class="text-gray-600">Experta creadora de CP y co Founder</p>
            </div>
            <div class="team-member text-center">
                <img src="/placeholder.svg?height=200&width=200" alt="Heydi la Cpera" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Heydi</h3>
                <p class="text-gray-600">Experta creadora de CP y co Founder</p>
            </div>
            <div class="team-member text-center">
                <img src="SRC/About/imagen9.jpg" alt="ToolKid" height="200" width="200" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">ToolKid</h3>
                <p class="text-gray-600">Director of Global Partnerships de CP</p>
            </div>
            <div class="team-member text-center">
                <img src="/placeholder.svg?height=200&width=200" alt="Heydi la Cpera" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Luis</h3>
                <p class="text-gray-600">Experta creadora de CP y co Founder</p>
            </div>
            <div class="team-member text-center">
                <img src="/placeholder.svg?height=200&width=200" alt="Heydi la Cpera" class="mx-auto rounded-full">
                <h3 class="text-2xl mt-4">Jesus</h3>
                <p class="text-gray-600">Experta creadora de CP y co Founder</p>
            </div>
        </div>
    </div>
</section>

    <?php include 'footer.php'; ?>

</body>

</html>
