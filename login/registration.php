<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$indianStates = array(
    "Andhra Pradesh",
    "Arunachal Pradesh",
    "Assam",
    "Bihar",
    "Chhattisgarh",
    "Goa",
    "Gujarat",
    "Haryana",
    "Himachal Pradesh",
    "Jammu and Kashmir",
    "Jharkhand",
    "Karnataka",
    "Kerala",
    "Madhya Pradesh",
    "Maharashtra",
    "Manipur",
    "Meghalaya",
    "Mizoram",
    "Nagaland",
    "Odisha",
    "Punjab",
    "Rajasthan",
    "Sikkim",
    "Tamil Nadu",
    "Telangana",
    "Tripura",
    "Uttar Pradesh",
    "Uttarakhand",
    "West Bengal",
    "Andaman and Nicobar Islands",
    "Chandigarh",
    "Dadra and Nagar Haveli",
    "Daman and Diu",
    "Lakshadweep",
    "Ladakh",
    "National Capital Territory of Delhi",
    "Puducherry"
);

session_start();
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cmail = $_POST['email'];
    $cmobile = $_POST['mobile'];
    $cgender = $_POST['gender'];
    $cdob = $_POST['dob'];
    $today = date("Y/m/d");
    $diff = date_diff(date_create($cdob), date_create($today));
    $tage = $diff->format('%y');
    $age = (int)$tage;

    $caddress = $_POST['address'];
    $ccity = $_POST['city'];
    $cstate = $_POST['state'];
    $cpincode = $_POST['pincode'];
    $cpass = $_POST['cpass'];
    $pass = $_POST['pass'];
    $name = $fname . " " . $lname;

    $number = preg_match('@[0-9]@', $cpass);
    $uppercase = preg_match('@[A-Z]@', $cpass);
    $lowercase = preg_match('@[a-z]@', $cpass);
    $specialChars = preg_match('@[^\w]@', $cpass);

    $lengthMobile = strlen($cmobile);

    $lengthPincode = strlen($cpincode);

    if (strlen($cpass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        header("location:registration.php?passwordE=0");
    } else {
        if ($lengthMobile != 10) {
            header("location:registration.php?MobileE=0");
        } else {
            if ($lengthPincode != 6) {
                header("location:registration.php?pincodeE=0");
            } else {

                $otpEmail = rand(000001, 999999);
                // echo ($fname . "<br>");
                // echo ($lname . "<br>");
                // echo ($cmail . "<br>");
                // echo ($cmobile . "<br>");
                // echo ($cdob . "<br>");
                // echo ($age . "<br>");
                // echo ($caddress . "<br>");
                // echo ($ccity . "<br>");
                // echo ($cstate . "<br>");
                // echo ($cpincode . "<br>");
                // echo ($pass . "<br>");
                // echo ($otpEmail . "<br>");

                if ($age < 18) {
                    header("location:registration.php?ageE=0");
                } else {

                    include('db.php');
                    $query2 = "SELECT  `Email` FROM `customer_master` WHERE `email` = '" . $cmail . "'";
                    $result2 = mysqli_query($con, $query2);
                    if ($row = mysqli_fetch_assoc($result2)) {
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
                        header("location:registration.php?emaillE=0");
                    } else {

                        //Instantiation and passing `true` enables exceptions
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
                            $mail->addAddress($cmail, $name);       //Add a recipient
                            $mail->addAddress($cmail);               //Name is optional
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'OTP for registration';
                            $mail->Body    = 'Dear ' . $fname . ' ' . $lname . ',<br><br>Please use the following OTP : <b  style="color:blue">' . $otpEmail . '</b> to complete your online registration.<br><br><b>This email is automatically generated. Please do not respond to this.</b>';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send();
                            $_SESSION['OTPmail'] = $otpEmail;
                            $_SESSION['fname'] = $fname;
                            $_SESSION['lname'] = $lname;
                            $_SESSION['pass'] = $cpass;
                            $_SESSION['mail'] = $cmail;
                            $_SESSION['mobile'] = $cmobile;
                            $_SESSION['dob'] = $cdob;
                            $_SESSION['address'] = $caddress;
                            $_SESSION['city'] = $ccity;
                            $_SESSION['state'] = $cstate;
                            $_SESSION['pincode'] = $cpincode;
                            $_SESSION['gender'] = $cgender;
                            header("location:registrationConti.php?success=0");
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    }
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="asset/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body style="background-color: purple;background: purple;">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
                <div class="card card-signin1 my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registration form</h5>
                        <form class="needs-validation" novalidate method="POST">
                        <?php
                                if (isset($_GET['ageE'])) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Sorry</strong>, looks like your not eligible for registration, but thanks for checking out
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                        <?php
                                if (isset($_GET['emaillE'])) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Sorry</strong>, looks like this email is already registered
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_GET['success'])) {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>OTP has been Send to Email</strong>
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
                                        <strong>It looks like you haven't followed the password criteria. Please, try again. </strong>
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
                                        <strong>It looks like you have entered incorrect mobile number </strong>
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
                                        <strong>It looks like you have entered incorrect pincode </strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                    </div>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($_GET['RegE'])) {
                                ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Kindly fill in your details first </strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                    </div>
                                <?php
                                }
                                ?>
                            <hr>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required name="fname">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" required name="lname">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="validationCustomUsername" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>*Note :<br>
                                Password should fit the following criteria :<br>
                                1. Atleast one number.<br>
                                2. Atleast one lowercase character.<br>
                                3. Atleast one uppercase character.<br>
                                4. Atleast one special character.<br>
                                5. Password should be more than 8 characters.
                            </p>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="pass" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Confirm Password</label>
                                    <span id='message' style="float: right;"></span>
                                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="cpass" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <script>
                                    $('#password, #confirm_password').on('keyup', function() {
                                        if ($('#password').val() == $('#confirm_password').val()) {
                                            $('#message').html('Matching').css('color', 'green');
                                        } else
                                            $('#message').html('Not Matching').css('color', 'red');
                                    });
                                </script>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Mobile Number</label>
                                    <input type="text" class="form-control" id="number" placeholder="Mobile Number" name="mobile" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" min="10">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Date of Birth</label>
                                    <input type="date" class="form-control" id="validationCustom02" placeholder="Last name" name="dob" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Gender</label>
                                    <div class="input-group">
                                        <select class="form-control" id="exampleFormControlSelect1" required name="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a company.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom03">Address</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Address" name="address" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">City</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City" name="city" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">State</label>
                                    <select class="form-control" id="exampleFormControlSelect1" required name="state">
                                        <?php
                                        for ($x = 0; $x <= sizeof($indianStates) - 1; $x++) {
                                        ?>
                                            <option><?php echo ($indianStates[$x]) ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Pincode</label>
                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Pincode" name="pincode" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6">
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="E" id="invalidCheck" name="atc" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        &nbsp;Agree to <a href="#" class="text-dark" style="text-decoration: underline;">Terms & Condition</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                            <div id="recaptcha-container"></div>
                            <button class="btn btn-dark" type="submit" name="submit" onclick="phoneAuth()">Register</button>
                        </form>

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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>