<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="flex flex-col min-h-screen">
    <?php include 'navbar.php'; ?>

    <div class="flex-grow flex justify-center items-center">
        <form class="bg-white p-8 custom-box-shadow rounded-2xl w-[300px] text-center">
            <h2 class="text-[#283629] text-[28px] font-bold mb-6">Contact us</h2>
            
            <div class="input-group flex flex-col text-left mb-4">
                <label class="text-[#283629] text-[15px] font-semibold mb-2" for="name">Nombre</label>
                <input class="w-full p-2 rounded-full bg-[#edfff0] border-2 border-[#f0faf1] text-[#283629] placeholder-[#b5cab5] focus:outline-none focus:ring-2 focus:ring-green-300" type="text" id="name" placeholder="Name">
            </div>
            
            <div class="input-group flex flex-col text-left mb-4">
                <label class="text-[#283629] text-[15px] font-semibold mb-2" for="phone">Telefono</label>
                <input class="w-full p-2 rounded-full bg-[#edfff0] border-2 border-[#f0faf1] text-[#283629] placeholder-[#b5cab5] focus:outline-none focus:ring-2 focus:ring-green-300" type="text" id="phone" placeholder="Phone number">
            </div>
            
            <div class="input-group flex flex-col text-left mb-4">
                <label class="text-[#283629] text-[15px] font-semibold mb-2" for="email">Email</label>
                <input class="w-full p-2 rounded-full bg-[#edfff0] border-2 border-[#f0faf1] text-[#283629] placeholder-[#b5cab5] focus:outline-none focus:ring-2 focus:ring-green-300" type="email" id="email" placeholder="Email">
            </div>
            
            <div class="input-group flex flex-col text-left mb-6">
                <label class="text-[#283629] text-[15px] font-semibold mb-2" for="message">Mensaje</label>
                <textarea class="w-full p-2 rounded-2xl bg-[#edfff0] border-2 border-[#f0faf1] text-[#283629] placeholder-[#b5cab5] focus:outline-none focus:ring-2 focus:ring-green-300" id="message" rows="4" placeholder="Message"></textarea>
            </div>
            
            <button class="btn w-full p-3 rounded-full text-white font-bold custom-input-box-shadow bg-[#51D94C] hover:bg-[#50E048] transition duration-300 focus:outline-none focus:ring-2 focus:ring-green-300" type="submit">Send</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>