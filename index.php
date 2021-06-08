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

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url(assets/img/vi.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>GADGET SAMRT</span></h2>
                <p class="animate__animated animate__fadeInUp">
                <h4 style="padding-left:40px;color: rgb(0, 0, 0); font-weight: bolder;font-family: 'Times New Roman', Times, serif">Mi authorized store in managlore</h4>
                </p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url(assets/img/15.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown"><span> GRAB NOW !</span></h2>
                <p class="animate__animated animate__fadeInUp">
                <h4 style="padding-left:40px;color: rgb(31, 5, 48); font-weight: bolder;font-family: 'Times New Roman', Times, serif">Gadget smart is up with exciting Deals . What you waiting for grab this amazing offer <br>5 days more for this amazing deal to be out.</h4>
                </p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">VIEW MORE </a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <!-- <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi
                  ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea
                  voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div> -->

          <!-- Slide 3 -->
          <!-- <div class="carousel-item" style="background: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi
                  ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea
                  voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

        </div> -->

          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>

          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>

        </div>
      </div>
  </section><!-- End Hero -->

  <main id="main">

  <section id="featured" class="featured">
      <div class="row row-cols-1 row-cols-md-1 g-4">
        <div class="col">
          <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
            <h5 style="padding-left:30px; font-weight: bolder;font-family: Berkshire Swash;" class="text-dark">Newly Releases
            </h5>
            <div class="card-body">
              <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php
                include('db.php');
                $query15 = "SELECT * FROM `stock_master` WHERE quantity > 0 LIMIT 5";
                $result15 = mysqli_query($con, $query15);
                while ($row = mysqli_fetch_assoc($result15)) {
                ?>
                  <div class="col">
                    <div class="card h-100 shadow">
                      <div class="row row-cols-1 row-cols-md-1 g-1">
                        <div class="col">
                          <div class="card" style="border: none;">
                            <img src="admin/<?php echo $row['Imagepath'] ?>" class="card-img-top image-fluid mx-auto mt-3 mb-2" style="width: 150px;height: 100px;">
                          </div>
                        </div>
                        <div class="col">
                          <div class="card" style="border: none;">
                            <div class="card-body" style="min-height: 90px;max-height: 90px;">
                              <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram']?> <?php echo $row['Storage'] ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo $row['price'] ?></h5>
                      <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                        <button class="btn btn-dark" type="button">View</button>
                      </div>
                    </div>
                  </div>

                <?php
                }
                ?>





              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="border-color: transparent;">
            <div class="card-body">
              <section id="clients" class="clients">
                <div class="container">

                  <div class="section-title">
                    <h2 style="color:#7B1FA2">Buy Products by Brands</h2>
                  </div>

                  <div class="clients-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">
                      <?php
                      include('db.php');
                      $query11 = "SELECT * FROM `company_master`";
                      $result11 = mysqli_query($con, $query11);
                      while ($row = mysqli_fetch_assoc($result11)) {
                      ?>
                        <div class="swiper-slide"><a href="viewcompany.php?id=<?php echo $row['ComUID']?>"> <img src="admin/<?php echo $row['logo'] ?>" class="img-fluid" style="filter: none;" alt="mi.jpg"></a></div>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="swiper-pagination"></div>
                  </div>

                </div>
              </section><!-- End Clients Section -->
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card" style="background-color: #f1f1f1;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">

              <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                  <div class="card" style="background-color: transparent;border-color: transparent;">
                    <div class="card-body">
                      <h5 class="card-title" style="color: black;font-size: xx-large;padding-left: 20px;font-family:Noto Serif;">COMPARE
                      </h5>
                      <p class="card-text" style="padding-left: 20px;color: black;">Get one that is best for you !</p>
                      <div class="btn" style="padding-left: 20px;">
                        <button class="btn btn-dark" type="button"><i class='bx bxs-grid'></i>&nbsp;View More</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card" style="background-color: transparent;border-color: transparent;">
                    <!-- 
                    <img src="assets/img/10.jpeg" class="card-img-top" alt="..." style="width: 20%;"> -->
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                      <div class="col">
                        <div class="card" style="background-color: transparent;border-color: transparent;">
                          <center>
                            <img src="assets/img/9.jpeg" class="card-img-top" alt="..." style="width: 20%;">
                            <br><br>
                            <h6 class="card-title text-center" style="color: black;">Samsung Galexy S20FE</h6>
                          </center>
                        </div>
                      </div>
                      <div class="col">
                        <div class="card" style="background-color: transparent;border-color: transparent;">
                          <center>
                            <img src="assets/img/1.jpeg" class="card-img-top" alt="..." style="width: 20%;"><br><br>
                            <h6 class="card-title text-center" style="color: black;">Xiaomi Redmi Note 9 Pro Max</h6>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                  content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- -->

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