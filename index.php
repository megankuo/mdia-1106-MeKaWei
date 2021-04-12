<?php
  // error reporting
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  // Import functions
  include './review/database.php/database.php';

  // Validate form submission
  register_user();
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>MeKaWei Bubble Tea Cafe</title>
  <script src="scripts/jquery.js" charset="utf-8"></script>
  <!-- <link href="style.css" rel="stylesheet" type="text/css" /> -->
  <link href="mobile.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;600;700&family=Raleway:wght@400;700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/738c285426.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <header>
    <a href="index.html"> <img class="logo-top" src="images/Logo.png"></a>

  </header>
  <nav class="sticky-bar" role="navigation">
    <!-- <button class="hamburger" id="hamburger">
      <i class="fas fa-bars"></i>
    </button> -->

    <ul id="nav-links">

      <li><a href="#about">About Us</a></li>
      <li><a href="bbt-menu.html">Bubble Tea Menu</a></li>
      <li><a href="dessert-menu.html">Dessert Menu</a></li>
      <li><a href="#register">Membership</a></li>
      <li><a href="review/index.php">Reviews</a></li>

    </ul>
  </nav>
  <main class="main-home">
    <section class="grid-area-photos" id="features">
      <div class="grid-container-home">

        <div class="grid-item-home">
          <img class="image-home" src="./images/home-cake.png" alt="layered cake">

          <h2 class="card-header"><a href="dessert-menu.html">Desserts <i class="fas fa-arrow-circle-right"></i></a>
          </h2>

        </div>

        <div class="grid-item-home">
          <img class="image-home" src="./images/home-tea.png" alt="bubble tea">

          <h2 class="card-header"><a href="bbt-menu.html">Bubble Teas <i class="fas fa-arrow-circle-right"></i></a></h2>

        </div>

        <!-- <div class="grid-item-home room">
          <img class="image-home" src="./images/home-area.png" alt="work space">

          <h2 class="card-header"><a href="membership.html">Study and Work <i class="fas fa-arrow-circle-right"></i></a></h2></a></h2>

        </div> -->
      </div>
    </section>
    <section class="grid-area-desc" id="about">

      <h1>Make your way to <br><span class="blue">&nbsp;MeKaWei</span></h1>
      <div class="description">
        <p>At MeKaWei Bubble Tea Cafe, we provide luxury bubble tea services to both customers who want a place to
          relax or work. Here you can lookout over the bustling downtown Vancouver, as well as the peaceful mountain
          and ocean views.</p>
        <p>Socialize on our casual floor with a cup of specialty bubble tea and dessert. We use organic and whole
          ingredients to provide a guilt-free experience. Our teas use tea blends from the Hawaiian Islands to
          create a fragrant base.</p>
        <p>Monthly membership to MeKaWei gives you access to our work floor, conference room booking, and discounts
          to our menu. </p>

      </div>
      <span class="slideInLeft"><a href="#register"><strong>Visit today for a free trial.</strong></a></span>
      </div>


    </section>

    <section id="rooms">
      <h2 class="card-header">Study and Work</h2>
      <!-- The dots/circles -->
      <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
      </div>
      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="carousel fade">

          <img src="./images/work/conference.png" style="width:100%">
          <div class="room-desc conference">
            <h3>CONFERENCE ROOMS:</h3>
            <p>
              3 Soundproof conference rooms.<br>
              Each conference room can hold up to 10 people. <br>
              Each room has 2 HDTVs and a White Board. <br>
            </p>
            <!-- <img class="btn-booking" src="./images/btn-book.png" alt="btn-booking"> -->
          </div>
        </div>

        <div class="carousel fade">

          <img src="./images/work/study.png" style="width:100%">
          <div class="room-desc indep">
            <h3>INDEPENDENT QUIET FLOOR:</h3>
            <p>
              Public area for studying or working. <br>
              Shared desks and booths are available.<br>
              This area can hold 15 people.<br>
            </p>
            <!-- <img class="btn-booking" src="./images/btn-book.png" alt="btn-booking"> -->
          </div>
        </div>

        <div class="carousel fade">

          <img src="./images/work/talkingroom.png" style="width:100%">
          <div class="room-desc casual">
            <h3>CASUAL FLOOR:</h3>
            <p>
              People can enjoy their time, catching up with their friends. <br>
              The space is designed for comfort and relaxation.
              </>
          </div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>



    </section>

    <section id="register">
      <h2>Become a Member</h2>
      <div class="container">
        <p>We always welcome new friends to join our membership! With membership, you can book conference rooms, study
          area, and enjoy drinks and desserts with membership discounts!</p>
        <ul>
          <li> Student Membership: $65/month
          <li> Normal Membership: $100/month
        </ul>
      </div>
      <form class="registerForm" action="index.php" method="POST">
        <h3>Sign-up here </h3>
        <div class="container">
          <label for="email"><b>Enter Your Email </b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
          <?php the_validation_message('email'); ?>
          <label for="psw"><b>Enter Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
          <?php the_validation_message('psw'); ?>
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
          <?php the_validation_message('psw-repeat'); ?>
          <button type="submit">Sign up now</button>
        </div>

      </form>
    </section>

  </main>
  <footer>
    <div class="footer-content">
      <div id="contact">
        <p> Location: 1111 W Media St #1111-1111 <br> in Royal Center, Vancouver, BC <br>
          Contact: 604-111-1111
        </p>
      </div>

      <div id="disclaimer">
        <p>For Educational Purposes Only <br>
          <a href="https://www.vecteezy.com/free-vector/icons">Icons Vectors by Vecteezy</a>
        </p>

      </div>

      <div id="social">
        <img src="images/icon-fb.png" alt="Facebook" class="social-icon" />
        <img src="images/icon-ig.png" alt="Instagram" class="social-icon" />
        <img src="images/icon-twitter.png" alt="Twitter" class="social-icon" />
      </div>

    </div>


  </footer>
  <script src="script.js" charset="utf-8"></script>
</body>

</html>