<?php
session_start();
if (isset($_SESSION['OTPmail'])) {
    $mail = $_SESSION['mail'];
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();


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
        <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        

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
                    <!-- <span class="text-uppercase font-weight-bold text-light">Acme</span> -->
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
                <!-- <a href="index.php" class="btn1 effect01 bg-light text-dark text-center" style="margin-left: 20px;"><span><b style="font-family: Bree Serif;font-size: large;">Login</b></span></a> -->
            </div>
        </header>


        <section style="padding-top: 50px;">

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" novalidate method="POST">
                                    <h3>
                                        <p style="font-weight: bolder;">Registration Completed</p>
                                    </h3>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-3 mx-auto">
                                            <center>
                                                <i class='bx bxs-badge-check bx-md' style="color: green; "></i><br>
                                                <h3><b>Registration Completed</b></h3>
                                                <p style="font-size: larger;color: gray;">Thank you, we have sent you email to <?php echo $mail ?><br> Please check your email for futher instructions<br><br>
                                                    <a href="index.php"><b>Login Page</b></a>
                                                </p>
                                            </center>
                                        </div>
                                    </div>


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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>&nbsp;


        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
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