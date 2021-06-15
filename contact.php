<?php
session_start();
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['cuname'])) {
  $displayContent = "block";
  $displayContent1 = "none";
  $contentBlock = " ";
  $custEmail = $_SESSION['email'];
  $custMobile = $_SESSION['phone'];
  $custName = $_SESSION['name'];
} else {
  $displayContent = "none";
  $displayContent1 = "block";
  $contentBlock = "disabled";
  $custEmail = "abc";
  $custMobile = "abc";
  $custName = "abc";
}
if (isset($_POST['submit'])) {
  $qname = $_POST['Qname'];
  $qemail = $_POST['Qemail'];
  $qsubject = $_POST['Qsubject'];
  $qmobile = $_POST['Qmobile'];
  $qmessage = $_POST['Qmessage'];
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'developernavya9@gmail.com';                     //SMTP username
    $mail->Password   = 'Navyaraj123*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('gadgetsmart@info.in', 'Gadget Smart');
    $mail->addAddress('Navyaraj526@gmail.com');       //Add a recipient              //Name is optional
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '' . $qsubject . '';
    $mail->Body    = 'Query Generated <br><br><b>Name : </b>' . $qname . '<br><b>Mobile:</b>+91 ' . $qmobile . '<br><b>Email : </b>' . $qemail . '<br><b>Message :</b>' . $qmessage . '';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location:contact.php?success=0");
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location:contact.php?FAILDE=0");
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.0.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section> -->

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
          <li><a href="index.php" style="font-weight: bolder;"><span>HOME</span></a></li>

          <li><a href="contact.html" style="font-weight: bolder;">Book Appointment</a></li>
          <li><a href="contact.php" style="font-weight: bolder;">Contact US</a></li>
          <!--<li><a href="services.html" style="font-weight: bolder;">SERVICES</a></li>-->
          <li class="dropdown" style="display:<?php echo $displayContent ?>"><a href="" style="font-weight: bolder;"><span>ACCOUNT</span>
              <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="Custorder.php" style="font-weight: bolder;"><span>Order</span></a></li>
              <li class="dropdown"><a href="Custpay.php" style="font-weight: bolder;"><span>Payment </span></a></li>
              <li class="dropdown"><a href="Custprofile.php" style="font-weight: bolder;"><span>Profile</span></a></li>

            </ul>
          </li>



          <li style="display:<?php echo $displayContent ?>"><a href="logout.php" class="text-danger" style="font-weight: bolder;">LOGOUT</a></li>
          <li style="display:<?php echo $displayContent1 ?>"><a href="login/index.php" class="text-light" style="font-weight: bolder;">LOGIN</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <h2 style="padding-left:30px;color: black; font-weight: bolder;font-family: Berkshire Swash;"> CONTACT</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p> K.S.R Road <br>
                Hampankatta,Managlore<br>
                Karnataka 575001 <br><br>
                <br>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p> @gadget-smart-mangalore</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p> <strong>Phone:</strong> 08105572368 , +91 8244280428</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">

            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.5646625022555!2d74.83964871466652!3d12.87137052055258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35b058cfecc75%3A0xafdfa4846fbdd0a3!2sGadget%20smart!5e0!3m2!1sen!2sin!4v1623143560806!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>


          </div>

          <div class="col-lg-6">
            <form method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="Qname" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="Qemail" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="Qmobile" id="mobile" placeholder="Mobile Number" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="Qsubject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="Qmessage" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


</body>

</html>