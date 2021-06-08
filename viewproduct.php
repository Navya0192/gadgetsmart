<?php
session_start();

if (isset($_SESSION['cuname'])) {
  $displayContent = "block";
  $displayContent1 = "none";
} else {
  $displayContent = "none";
  $displayContent1 = "block";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Box Icon -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <!-- =======================================================
  * Template Name: Eterna - v4.0.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="background-color: #7B1FA2;">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html" style="color: rgb(255, 255, 255);">GADGET SMART</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" style="font-weight: bolder;"><span>HOME</span></a></li>
          <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>PRODUCTS</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>Mobiles</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="mi.html">Mi</a></li>
                  <li><a href="samsung.html">Samsung</a></li>
                  <li><a href="vivo.html">Vivo</a></li>
                  <li><a href="oppo.html">Oppo</a></li>
                  <li><a href="oneplus.html">Oneplus</a></li>

                </ul>
              </li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>Laptops</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="hp.html">HP</a></li>
                  <li><a href="asusdell.html">Dell</a></li>
                  <li><a href="lenovo.html">Lenovo</a></li>
                  <li><a href="acer.html">Acer</a></li>
                  <li><a href="asusdell.html">Asus</a></li>
                  <li><a href="mi.html">Mi</a></li>

                </ul>
              </li>

              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>TV & Tablets</span> <i class="bi bi-chevron-right"></i></a>
                <ul>

                  <li><a href="mi.html">Mi</a></li>
                  <li><a href="oneplus.html">Oneplus</a></li>
                  <li><a href="samsung.html">SAMSUNG</a></li>

                </ul>
              </li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>Accessories</span> <i class="bi bi-chevron-right"></i></a>
                <ul>

                  <li><a href="#">earphones</a></li>

                </ul>
            </ul>
          </li>

          <li><a href="services.html" style="font-weight: bolder;">SERVICES</a></li>
          <li class="dropdown"><a href="pricing.html" style="font-weight: bolder;"><span>PRICE RANGE</span>
              <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>Below ₹ 10,000</span></a></li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>₹ 10,000 - ₹ 20,000 </span></a></li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>₹ 20,000 - ₹ 30,000</span></a></li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>₹ 30,000 -₹ 40,000</span></a></li>
              <li class="dropdown"><a href="#" style="font-weight: bolder;"><span>Above ₹ 40,000</span></a></li>
            </ul>
          </li>


          <li><a href="contact.html" style="font-weight: bolder;">CONTACT</a></li>
          <li style="display:<?php echo $displayContent ?>"><a href="logout.php" class="text-danger" style="font-weight: bolder;">LOGOUT</a></li>
          <li style="display:<?php echo $displayContent1 ?>"><a href="login/index.php" class="text-light" style="font-weight: bolder;">LOGIN</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">

  <section id="featured" class="featured">


  </section>
   



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Want to Get notification about Great Deals ?</h4>
            <h6><b>Enter your e-mail and Subscribe . We will give you a notification about Great deals and offers . </b></h6>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" placeholder=" Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              K.S.R Road <br>
              Hampankatta,Managlore<br>
              Karnataka 575001 <br><br>
              <strong>Phone:</strong> 08105572368 , +91 8244280428<br>
              <strong>Email:</strong> @gadget-smart-mangalore<br>
            </p>

          </div>

          <!-- <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Eterna</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
              darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div> -->

        </div>
      </div>
    </div>


  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>