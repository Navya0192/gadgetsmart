<?php
session_start();



if (isset($_GET['s'])) {
    $search = $_GET['s'];


    if (isset($_SESSION['cuname'])) {
        $displayContent = "block";
        $displayContent1 = "none";
        $contentBlock = "enabled";
        $custEmail = $_SESSION['email'] ;
        $custMobile = $_SESSION['phone'] ;
        $custName = $_SESSION['name'] ;
    
    } else {
        $displayContent = "none";
        $displayContent1 = "block";
        $contentBlock = "Disabled";
        $custEmail = "abc" ;
$custMobile = "abc" ;
$custName ="abc" ;
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

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

        <!-- Box Icon -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

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
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->

        </section><!-- End Hero -->

        <main id="main">
            <section class="text-Light bg-dark" style="margin-bottom: -90px;">
                <div class="row row-cols-1 row-cols-md-1 g-4">
                    <div class="col">
                        <div class="card h-100" style="background-color: transparent;border: none;">
                            <div class="card-body">
                                <div class="section-title" data-aos="zoom-out">
                                    <div class="container my-auto">
                                        <form method="GET" action="search.php">
                                            <br><br>
                                            <input class="form-control" list="datalistOptions2" name="s" id="exampleDataList" placeholder="&nbsp;Type to search..." autocomplete="off">&nbsp;
                                            <br>
                                            <input type="submit" class="btn btn-outline-light " style="float: right;font-weight: bolder;" value="Search"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <center>
                        <?php
                        include('db.php');
                        $query15 = "SELECT count(`PUID`)as pcount FROM `stock_master` WHERE quantity > 0 and Name like '%" . $search . "%' ";
                        $result15 = mysqli_query($con, $query15);
                        while ($row = mysqli_fetch_assoc($result15)) {
                        ?>
                            <h3 style="color: gray;"><span style="font-family: Arial, Helvetica, sans-serif;color: gray;"><?php echo $row['pcount'] ?></span> results found for "<span style="color: white;"><?php echo $search ?></span>"
                            </h3>
                        <?php
                        }
                        ?>

                    </center>
                </div>
            </section>

            <section id="featured" class="featured text-dark">
                <div class="row row-cols-1 row-cols-md-1 g-4">
                    <div class="col">
                        <div class="card" style="background-color:lightgray;padding-top: 20px;">
                            <div class="card-body">
                                <div class="row row-cols-1 row-cols-md-2 g-2">
                                    <div class="col-md-2">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <p style="color: black;float: left;font-size: medium;font-family: Bree Serif;"><b>FILTERS</b></p><br>
                                                <hr style="background-color: black;height: 4px;">
                                                <div>
                                                    <h6><b><u>Company</u></b></h6>
                                                    <div class="overflow-auto filters" style="padding-left: 5px;">
                                                        <?php
                                                        include('db.php');
                                                        $query15 = "SELECT DISTINCT(sm.companyid),cm.Name FROM stock_master sm,company_master cm WHERE sm.companyid = cm.ComUID ";
                                                        $result15 = mysqli_query($con, $query15);
                                                        while ($row = mysqli_fetch_assoc($result15)) {
                                                        ?>
                                                            <input class="comman_selector company" type="checkbox" id="company-<?php echo $row['companyid'] ?>" value="<?php echo $row['companyid'] ?>">
                                                            <label for="company-<?php echo $row['companyid'] ?>"><?php echo $row['Name'] ?></label><br>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr style="color: grey;height: 3px;">
                                                    <h6><b><u>Ram</u></b></h6>
                                                    <div class="overflow-auto filters" style="padding-left: 5px;">
                                                        <?php
                                                        include('db.php');
                                                        $query15 = "SELECT DISTINCT(`Ram`) FROM `stock_master` WHERE 1 ";
                                                        $result15 = mysqli_query($con, $query15);
                                                        while ($row = mysqli_fetch_assoc($result15)) {
                                                        ?>
                                                            <input class="comman_selector ram" type="checkbox" id="ram-<?php echo $row['Ram'] ?>" value="<?php echo $row['Ram'] ?>">
                                                            <label for="ram-<?php echo $row['Ram'] ?>"><?php echo $row['Ram'] ?></label><br>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr style="color: grey;height: 3px;">
                                                    <h6><b><u>Storage</u></b></h6>
                                                    <div class="overflow-auto filters" style="padding-left: 5px;">
                                                        <?php
                                                        include('db.php');
                                                        $query15 = "SELECT DISTINCT(`Storage`) FROM `stock_master` WHERE 1 ";
                                                        $result15 = mysqli_query($con, $query15);
                                                        while ($row = mysqli_fetch_assoc($result15)) {
                                                        ?>
                                                            <input class="comman_selector storage" type="checkbox" id="Storage-<?php echo $row['Storage'] ?>" value="<?php echo $row['Storage'] ?>">
                                                            <label for="Storage-<?php echo $row['Storage'] ?>"><?php echo $row['Storage'] ?></label><br>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr style="color: grey;height: 3px;">
                                                </div>
                                                <a href="search.php?s=" class="btn btn-danger btn-sm" style="float: right;font-weight: bolder;">Reset Filters</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <p style="color: black;float: left;font-size: medium;font-family: Bree Serif;"><b>SEARCH RESULTS</b></p>
                                                <br>
                                                <hr style="background-color: black;height: 4px;">
                                                <div class="row row-cols-1 row-cols-md-1 g-2 filter_data1">
                                                    <?php
                                                    include('db.php');
                                                    $query15 = "SELECT sm.PUID, sm.Name, sm.Imagepath, sm.price, sm.type, sm.quantity, sm.companyid, sm.Ram, sm.Storage,cm.Name as cname FROM stock_master sm, company_master cm WHERE sm.companyid = cm.ComUID and sm.quantity > 0 and sm.Name like '%" . $search . "%'  ";
                                                    $result15 = mysqli_query($con, $query15);
                                                    while ($row = mysqli_fetch_assoc($result15)) {
                                                    ?>
                                                        <div class="col">
                                                            <div class="card shadow" style="border-radius: 10px;">
                                                                <div class="row row-cols-1 row-cols-md-2 g-1">
                                                                    <div class="col-md-3 p-2">
                                                                        <div class="card h-100" style="border: none;">
                                                                            <img src="admin/<?php echo $row['Imagepath'] ?>" class="card-img-top mx-auto my-auto" alt="..." style="width: 200px;height: auto;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-9 p-2">
                                                                        <div class="card h-100" style="border: none;">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title"><b><?php echo $row['Name'] ?><br><span style="font-size: medium;color: grey;"><?php echo $row['cname'] ?></span></b></h5>
                                                                                <p class="card-text">
                                                                                <table>
                                                                                    <tr>
                                                                                        <td><b>Product Category</b></td>
                                                                                        <td><b>&nbsp;:&nbsp;</b></td>
                                                                                        <td><?php echo $row['type'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td colspan="3"><b>&nbsp</b></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Ram</b></td>
                                                                                        <td><b>&nbsp;:&nbsp;</b></td>
                                                                                        <td><?php echo $row['Ram'] ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><b>Storage</b></td>
                                                                                        <td><b>&nbsp;:&nbsp;</b></td>
                                                                                        <td><?php echo $row['Storage'] ?></td>
                                                                                    </tr>
                                                                                </table>
                                                                                </p>
                                                                                <p><span style="font-size:30px"><b>Price :</b> <span style="font-family: Arial, Helvetica, sans-serif;font-weight: bolder;">₹<span id="<?php echo $row['PUID'] ?>" value="<?php echo $row['price'] ?>"><?php echo $row['price'] ?></span></span></span>
                                                                                    <button type="button" class="btn btn-dark" value="<?php echo $row['price'] ?>" id="<?php echo $row['PUID'] ?>" onClick="reply_click(this.value,this.id)" style="float: right;" <?php echo $contentBlock  ?>><b>Buy Directly</b></button>

                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php
                                                    }
                                                    if (mysqli_num_rows($result15) == 0) {
                                                    ?>
                                                        <h5>No results found with keywords '<?php echo $search ?>'<br> Try changing keyword</h5>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section><!-- End Featured Section -->




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

        <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            
            var options = {
                
                "key": "rzp_test_dIgxaKmIRz2ttZ", // Enter the Key ID generated from the Dashboard
                // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Gadget Smart",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",//Url for logo company
                "handler": function(response) {
                    jQuery.ajax({
                        // type:'GET',
                        // url:'tempOrder.php',
                        // data:"payment_id="+response.razorpay_payment_id+"",
                        success: function(result) {
                            window.location.href = "addOrderPayment.php?payment_id="+ response.razorpay_payment_id+"&proid="+options.proid+"&method=razorpay&amount="+options.amountSQL+"";
                        }
                    });

                    // alert(response.razorpay_payment_id);
                    // alert(response.razorpay_signature)
                },
                "prefill": {
                    "name": "<?php echo $custName ?>",
                    "email": "<?php echo $custEmail?>",
                    "contact": "<?php echo $custMobile ?>"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                }
                // "theme": {
                //     "color": "#3399cc"
                // }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function(response) {
                jQuery.ajax({
                    // type:'GET',
                    // url:'addcourseDB.php',
                    // data:"payment_id="+response.razorpay_payment_id+"",
                    success: function(result) {
                        header("location:index.php");
                    }
                });

                // alert(response.error.code);
                // alert(response.error.description);
                // alert(response.error.source);
                // alert(response.error.step);
                // alert(response.error.reason);
                // alert(response.error.metadata.order_id);
                // alert(response.error.metadata.payment_id);
            });
            function reply_click(clicked_id,puid) {
                options.amount = clicked_id * 100;
                options.amountSQL = clicked_id;
                options.proid = puid;
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        </script>


        <!-- Query Filter -->
        <script>
        $(document).ready(function() {
            function filter_data() {
                var action = 'fetch_data';
                var search = '<?php echo $search ?>';
                var ram = get_filter('ram');
                var company = get_filter('company');
                var storage = get_filter('storage');
                $.ajax({
                    url: "fetchData.php",
                    method: "POST",
                    data: {
                        search: search,
                        action: action,
                        ram: ram,
                        company: company,
                        storage: storage
                    },
                    success: function(data) {
                        $('.filter_data1').html(data);
                    }
                })
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.comman_selector').click(function() {
                filter_data();
            });

        });
    </script>

    </body>

    </html>
<?php
} else {
    header("location:index.php?InvalidSearch=0");
}
?>