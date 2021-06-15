<?php
session_start();

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

$ComID = $_GET['id'];

include('db.php');
$query11 = "SELECT * FROM `company_master` where ComUID = '" . $ComID . "'";
$result11 = mysqli_query($con, $query11);
while ($row = mysqli_fetch_assoc($result11)) {
    $comDesc = $row['Description'];
    $comImage = $row['logo'];
    $comName = $row['Name'];
    // echo($comDesc."<br>");
    // echo($comImage."<br>");
    // echo($comName."<br>");
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

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">


</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center" style="background-color: #7B1FA2;">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="logo">
                <h1><a href="index.php" style="color: rgb(255, 255, 255);">GADGET SMART</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <form class="d-flex" method="GET" action="search.php">
                <input class="form-control me-2" type="search" name="s" placeholder="Search Product" aria-label="Search">
                <button class="btn btn-light fw-bolder" type="submit">Search</button>
            </form>
            <!-- navigation bar -->
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
            <!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <main id="main">
        <section id="hero1" class="d-flex flex-column justify-content-end" style="background-color: lightgrey;background-size: cover;padding-right: 50px;padding-left:50px ;padding-bottom: 10px;"><br>

            <div class="row row-cols-1 row-cols-md-2 g-3" style="padding-top: 20px;">
                <div class="col-md-3" class="align-item-center">
                    <div class="card h-100" style="background-color: transparent;border-color: transparent">
                        <img src="admin/<?php echo $comImage ?>" class="card-img-top mx-auto" alt="...">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card h-100" style="background-color: transparent;border-color: transparent;">
                        <div class="card-body">
                            <h3 style="color: black;float: left;font-size: 35px;font-family: Roboto Slab;"><b>&nbsp;<?php echo $comName ?></b></h3>
                            <br><br><br>
                            <h5 style="color: gray; text-align: justify;padding-left: 10px;"><?php echo $comDesc ?></h5>
                        </div>
                    </div>
                </div>
            </div>

            <br>&nbsp;
        </section>

        <!-- Mobile Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Mobile' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $MobileDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $MobileDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $MobileDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Mobile
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Mobile' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                                <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
        </section>


        <!-- Laptop Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Laptop' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $LaptopDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $LaptopDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $LaptopDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Laptop
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Laptop' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                                <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
        </section>


        <!-- Television Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Television' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $TelevisionDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $TelevisionDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $TelevisionDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Television
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Television' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                               <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
        </section>


        <!-- Tablets Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Tablets' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $TabletsDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $TabletsDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $TabletsDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Tablets
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Tablets' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                                <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
        </section>


        <!-- Accessories Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Accessories' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $AccessoriesDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $AccessoriesDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $AccessoriesDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Accessories
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Accessories' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                                <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
        </section>


        <!-- Other Section -->
        <?php
        include('db.php');
        $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Other' ";
        $result15 = mysqli_query($con, $query15);
        while ($row = mysqli_fetch_assoc($result15)) {
            $OtherDisplay = "block";
        }
        if (mysqli_num_rows($result15) == 0) {
            $OtherDisplay = "none";
        }
        ?>

        <section id="featured" class="featured" style="display:<?php echo $OtherDisplay ?>">
            <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                    <div class="card" style="background-color: #f1f1f1;;padding-top: 20px;">
                        <h5 style="padding-left:30px; font-weight: bolder;font-family: Times New Roman;" class="text-dark">Other
                        </h5>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-5 g-4">
                                <?php
                                include('db.php');
                                $query15 = "SELECT * FROM `stock_master` WHERE `companyid`= '" . $ComID . "' and `type` = 'Other' ";
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
                                                            <div class="card-title text-center" style="color: black;font-size: large;"><?php echo $row['Name'] ?> <?php echo $row['Ram'] ?> <?php echo $row['Storage'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title text-center" style="color: black;font-family: Arial, Helvetica, sans-serif;"><b style="color: #7B1FA2;">Price :</b>₹<?php echo number_format($row['price']) ?></h5>
                                            <div class="d-grid gap-2 p-3" style="border-top: 2px solid grey">
                                                <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>
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
            </div>
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
                            <?php include('components/payGateway.php') ?>

</body>

</html>