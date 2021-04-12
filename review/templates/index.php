<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>MeKaWei Dessert Menu</title>
    <link href="../style.css" rel="stylesheet" type="text/css" />
    <link href="../mobile.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;600;700&family=Raleway:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="menu.js" charset="utf-8"></script>
    <script language="javascript" type="text/javascript" src="jquery.js"></script>
  </head>

  <body>
  <header>
    <a href="index.html"> <img class="logo-top" src="../images/Logo.png"></a>

  </header>
  <nav class="sticky-bar" role="navigation">
    <!-- <button class="hamburger" id="hamburger">
      <i class="fas fa-bars"></i>
    </button> -->

    <ul id="nav-links">

      <li><a href="../index.html#about">About Us</a></li>
      <li><a href="../bbt-menu.html">Bubble Tea Menu</a></li>
      <li><a href="../dessert-menu.html">Dessert Menu</a></li>
      <li><a href="../index.html#register">Membership</a></li>
      <li><a href="index.php">Reviews</a></li>

    </ul>
  </nav>
    <main>
      <section>

            <h1> Customer Review </h1>
    
            <div class="write-comment">
      <h2>Post a Comment</h2>

     
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  

        <label>
          Email Address:
          <input type="email" name="email" required>
        </label>

        <label>
          Mood:
          <select name="mood">
            <option value="happy">Happy</option>
            <option value="sad">Sad</option>
            <option value="excited">Excited</option>
            <option value="bored">Bored</option>
            <option value="angry">Angry</option>
          </select>
        </label>

        <label>
          Enter a Comment:
          <textarea name="comment" required minlength="8"></textarea>
        </label>

        <button type="submit" name="button">Post Comment</button>

      </form>
    </div>
    <?php
      the_comments();
      the_commenters();
     ?>
  </body>


          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="footer-content">
        <div id="contact">
          <p>
            Location: 1111 W Media St #1111-1111 <br />
            in Royal Center, Vancouver, BC <br />
            Contact: 604-111-1111
          </p>
        </div>

        <div id="disclaimer">
          <p>
            For Educational Purposes Only <br />
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



    <script id="source" language="javascript" type="text/javascript">


  </script>
  </body>
</html>
