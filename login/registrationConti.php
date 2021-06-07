<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['OTPmail'])) {


    if (isset($_POST['submit'])) {
        $otp = $_SESSION['OTPmail'];
        $enterotp = $_POST['pass'];

        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $cpass = $_SESSION['pass'];
        $cmail = $_SESSION['mail'];
        $cmobile = $_SESSION['mobile'];
        $cdob = $_SESSION['dob'];
        $caddress = $_SESSION['address'];
        $ccity = $_SESSION['city'];
        $cstate = $_SESSION['state'];
        $cpincode = $_SESSION['pincode'];
        $cgender = $_SESSION['gender'];
        $name = $fname . " " . $lname;
        $date = date("Y-m-d");


        //  echo($otp."<br>");
        //  echo($fname."<br>");
        //  echo($lname."<br>");
        //  echo($cpass."<br>");
        //  echo($cmail."<br>");
        //  echo($cmobile."<br>");
        //  echo($cdob."<br>");
        //  echo($caddress."<br>");
        //  echo($ccity."<br>");
        //  echo($cstate."<br>");
        //  echo($cpincode."<br>");
        //  echo($cgender."<br>");
        if ($otp == $enterotp) {
            include('db.php');
            $sql1 = "INSERT INTO `customer_master`(`CUID`, `Name`, `Mobile`, `email`, `username`, `password`, `Address`, `city`, `state`, `pincode`, `DOB`, `Gender`) 
            VALUES (UUID(),'" . $name . "','" . $cmobile . "','" . $cmail . "','" . $cmail . "','" . $cpass . "','" . $caddress . "','" . $ccity . "','" . $cstate . "','" . $cpincode . "','" . $cdob . "','" . $cgender . "')";
            if (mysqli_query($con, $sql1)) {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'developernavya9@gmail.com';                     //SMTP username
                    $mail->Password   = 'Navyaraj123*';                                //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('gadgetsmart@info.in', 'Gadget Smart');
                    $mail->addAddress($cmail, $name);     //Add a recipient
                    $mail->addAddress($cmail);               //Name is optional
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Registration Successfull';
                    $mail->Body    = 'Dear ' . $fname . ' ' . $lname . ',<br><br>Thank you for Registering with GadgetSmart.<br> Your Account has now been activated.<br><hr><br><b>To Login :</b> Go to our <a href="#">Login Page</a><br><br>Thanks <br>Team GS<br><br>';

                    $mail->send();
                    header("location:registrationCompleted.php");
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                header("location:registrationConti.php?Error1=0");
            }
        } else {
            header("location:registrationConti.php?Error=0");
        }
    }


?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <title>Login #7</title>

    </head>

    <body style="background:purple;">

        <header id="header shadow" class="d-flex align-items-center" style="background: black;">
            <div class="container d-flex align-items-center justify-content-between" style="padding-top: 10px;">

                <div class="logo">
                    <!-- <h1><a href="index.html">Selecao</a></h1> -->
                    <!-- <img src="assets/img/logo-1png" style="height: 80px;"> -->
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                </div>

                <!-- <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="text-light" href="index.html">Home</a></li>
                    <li><a class="text-light" href="#jobs">Jobs</a></li>
                    <li><a class="text-light" href="https://unnathi.careers/public/">Training</a></li>
                    <li><a class="text-light" href="#about">About</a></li> -->
                <!-- <li><a class="text-light" href="#services">Services</a></li> -->
                <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
                <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
                <!-- <li><a class="text-light" href="#team">Team</a></li>
                    <li><a class="text-light" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav> -->
                <!-- .navbar -->
            </div>
        </header>


        <section style="padding-top: 50px;">


            <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

            <script>
                // Your web app's Firebase configuration
                var firebaseConfig = {
                    apiKey: "AIzaSyDZxIPHHcpbgvI46QI1-GkCpgw8qjfTmhw",
                    authDomain: "admin-project-5a9af.firebaseapp.com",
                    projectId: "admin-project-5a9af",
                    storageBucket: "admin-project-5a9af.appspot.com",
                    messagingSenderId: "111063204340",
                    appId: "1:111063204340:web:ca995a04a89cf0bcefb9a1"
                };
                // Initialize Firebase
                firebase.initializeApp(firebaseConfig);
            </script>

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST">
                                    <h3>
                                        <p style="font-weight: bolder;">Verify yourself </p>
                                    </h3>
                                    <?php
                                    if (isset($_GET['Error1'])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Sorry</strong>, Something when wrong Please try again later.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['Error'])) {
                                    ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>It looks like you have entered wrong OTP<strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['passwordE'])) {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>It looks like you haven't followed the password criteria. Please, try again. <strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['MobileE'])) {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>It looks like you have entered incorrect mobile number <strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['pincodeE'])) {
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>It looks like you have entered incorrect pincode <strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3 mx-auto">
                                            <center>
                                                <label for="validationCustom01" style="font-size: larger;"><b>Email OTP</b></label>
                                                <input type="password" class="form-control" id="password" placeholder="Email OTP" name="pass" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </center>
                                        </div>
                                    </div>

                                    <center>
                                        <button class="btn btn-dark" type="submit" name="submit">Complete Registration</button>
                                    </center>
                                </form>
                                <br>
                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                                <hr>
                                <center>
                                    <span class="ml-auto">Do you have an account?</span><br>
                                    <span class="ml-auto"><a href="index.html">Sign In</a></span>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>&nbsp;


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script type="text/javascript">
            var password = document.getElementById("password"),
                confirm_password = document.getElementById("confirm_password");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords Don't Match");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    </body>

    </html>
<?php
} else {
    header("location:registration.php?RegE=0");
}
?>