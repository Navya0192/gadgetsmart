<?php
session_start();

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    include('db.php');
    $query = "SELECT * FROM `admin_master` WHERE `username` ='" . $uname . "' AND `Passowrd` = '" . $pass . "'";
    $result2 = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result2)) {
        $_SESSION['AUID'] = $row['AUID'];
        header("location:customer.php");
    } else {
        header("location:index.php?invalid=0");
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="assets/css/loginpage.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Hello, world!</title>
</head>

<body style="background-color: blueviolet;">

    <body class="text-center">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->


                <!-- Login Form -->
                <form method="POST">
                    <input type="email" id="login" class="fadeIn second" name="uname" placeholder="Login">
                    <input type="password" id="password" class="fadeIn third" name="pass" placeholder="Password">
                    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Log In" style="font-weight: bolder;">
                </form>
            </div>
        </div>


    </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>