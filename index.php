<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Website Landing Page With Full Screen Draggable Image Slider - Html, Css & Javascript</title>
  <link rel="stylesheet" href="styles/swiper-bundle.min.css">
  <link rel="stylesheet" href="styles/carrucel.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

  <header>
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
      <i class="uil uil-apps nav-menu-btn"></i>
    </div>
  </header>

  <section class="home">
    <div class="media-icons">
      <a href="#"><i class="uil uil-facebook-f"></i></a>
      <a href="#"><i class="uil uil-instagram"></i></a>
      <a href="#"><i class="uil uil-twitter"></i></a>
    </div>

    <div class="swiper bg-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="SRC/Carrucel/imagen1.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Edu4All <span>Season</span></h2>
            <p>Edu4All es un proyecto generado por estudiates de la Universidad de Colima con la finalidad de darle una educacion pareja a los niños</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="SRC/Carrucel/imagen5.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Winter <span>Season</span></h2>
            <p>Winter is the coldest season of the year in polar and temperate zones. It occurs
            between autumn and spring.The tilt of Earth's axis causes seasons; winter occurs
            when a hemisphere is oriented away from the Sun. Different cultures define different
            dates as the start of winter, and some use a definition based on weather.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide dark-layer">
          <img src="SRC/Carrucel/imagen3.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Summer <span>Season</span></h2>
            <p>Summer is the hottest of the four temperate seasons, occurring after spring and
            before autumn. At or aroundthe summer solstice, the earliest sunrise and latest
            sunset occurs, daylight hours are longest and dark hours are shortest, with day
            length decreasing as the season progresses after the solstice.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
        <div class="swiper-slide">
          <img src="SRC/Carrucel/imagen4.jpg" alt="">
          <div class="text-content">
            <h2 class="title">Spring <span>Season</span></h2>
            <p>Spring, also known as springtime, is one of the four temperate seasons, succeeding
            winter and preceding summer. There are various technical definitions of spring, but
            local usage of the term varies according to local climate, cultures and customs. When
            it is spring in the Northern Hemisphere, it is autumn in the Southern Hemisphere and
            vice versa.</p>
            <button class="read-btn">Read More <i class="uil uil-arrow-right"></i></button>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-slider-thumbs">
      <div class="swiper-wrapper thumbs-container">
        <img src="SRC/Carrucel/imagen1.jpg" class="swiper-slide" alt="">
        <img src="SRC/Carrucel/imagen5.jpg" class="swiper-slide" alt="">
        <img src="SRC/Carrucel/imagen3.jpg" class="swiper-slide" alt="">
        <img src="SRC/Carrucel/imagen4.jpg" class="swiper-slide" alt="">
      </div>
    </div>
  </section>

  <section class="about section">
    <h2>Seasons of the year</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
    occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </section>

  <script src="swiper-bundle.min.js"></script>
  <script src="main.js"></script>

</body>
</html>