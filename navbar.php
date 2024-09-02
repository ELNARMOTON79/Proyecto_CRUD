<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    function is_active($page_name) {
        global $current_page;
        return $current_page == $page_name ? 'bg-green-700' : '';
    }
    ?>

<div class="nav-bar">
      <a href="" class="logo">
      <img src="SRC/logo.png" class="scale-150 w-12 h-12 mr-2" alt="Edu4All">
        Edu4All</a>
      <div class="navigation">
        <div class="nav-items">
          <i class="uil uil-times nav-close-btn"></i>
          <a href="index.php"><i class="uil uil-home"></i> Home</a>
          <a href="#"><i class="uil uil-compass"></i> Explore</a>
          <a href="about.php"><i class="uil uil-info-circle"></i> About</a>
          <a href="Donate.html"><i class="uil uil-document-layout-left"></i> Donate</a>
          <a href="contact.php"><i class="uil uil-envelope"></i> Contact</a>
        </div>
      </div>
                </div>
                
                <div class="hidden md:flex items-center space-x-4">
                    <a href="index.php" class="text-white px-3 py-2 rounded-md hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('index.php'); ?>">
                    <i class="fa-solid fa-house"></i>    
                        Home
                    </a>
                    <a href="about.php" class="text-white px-3 py-2 rounded-md hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('about.php'); ?>">
                    <i class="fa-solid fa-users-gear"></i>
                    About Us
                    </a>
                    <a href="contact.php" class="text-white px-3 py-2 rounded-md hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('contact.php'); ?>">
                    <i class="fa-solid fa-phone"></i>
                    Contact
                    </a>
                    <a href="logins/login.php" class="text-white px-3 py-2 rounded-md hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('logins/login.php'); ?>">
                        <i class="fa-solid fa-user"></i>
                        Login
                    </a>
                </div>
                
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('index.php'); ?>">Home</a>
                <a href="about.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('about.php'); ?>">About Us</a>
                <a href="contact.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('contact.php'); ?>">Contact</a>
                <a href="logins/logins.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-green-700 transition duration-500 ease-in-out <?php echo is_active('logins/login.php'); ?>">
                    <i class="fa-solid fa-user mr-2"></i>Profile
                </a>
            </div>
        </div>
    </nav>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
    <p>
    </p>
</body>
</html>