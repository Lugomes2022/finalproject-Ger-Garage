<?php
include_once('Databaseconection.php');


?>

  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ger's Garage</title>
    <link rel="stylesheet" href="mainpage.css" />
  </head>
  <body>  
    <header>
      <div class="content">
        <nav>
          <p class="brand">Welcome to <strong> Ger's Garage</strong></p>
          <ul>
            <li><a href="Register.php">Register </a></li>
            <li><a href="#about" onclick="goToAbout()">About</a></li>
            <button><a href="Login.php">Already a member? Log in here!</a></button>
          </ul>
        </nav>
        <div class="header-block">
          <div class="text">
            <h2>Always where you need</h2>
            <h2>When do you want</h2>
            <p> Since 1973</p>
          </div>
          <img src="Image/car-header.png" alt="Car" />
        </div>
      </div>
    </header>
    <section class="about" id="about">
      <div class="content">
        <div class="title-wrapper-about">
          <p>Know about us</p>
          <h3>About</h3>
        </div>
        <div class="about-content">
          <div class="left">
            <img src="Image/about.png" alt="About" />
          </div>
          <div class="right">
            <h3>Constatly making history</h3>
            <p>
            Ger's Garage was founded in 1979 by Gerard Smith, a talented mechanic with a passion for repairing and maintaining cars. In the early days, Ger's Garage was a small operation, serving only a few local customers.

However, as word of Ger's exceptional service and attention to detail spread, the business began to grow. Soon, Ger's Garage was attracting customers from all over the city, and Gerard found himself in need of additional help to keep up with demand.

.Today, Ger's Garage is a well-respected and trusted name in the automotive industry, known for its high-quality work and excellent customer service.

Despite its success, Ger's Garage remains true to its roots, with Gerard and his team continuing to deliver the same level of personal attention and care to each and every customer that they did when the business was first established.

            </p>
          </div>
        </div>
      </div>
    </section>

   
    <footer>
      <div class="main">
        <div class="content footer-links">
          
          <div class="footer-social">
            <h4>Follow </h4>
            <div class="social-icons">
              <img src="Image/instagram.png" alt="Instagram" />
              <img src="Image/facebook.png" alt="Facebook" />
            </div>
          </div>
          <div class="footer-contact">
            <h4>Contact </h4>
            <h6>+353 01 873840132</h6>
            <h6>info@gergarage.com.ie</h6>
            <h6>DO9D144 Dublin, Ireland</h6>
          </div>
        </div>
      </div>
      <div class="last">Ger Garage 2022 - Talk to us</div>
    </footer>
  </body>
</html>