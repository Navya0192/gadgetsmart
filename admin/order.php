<?php
session_start();


// destroying session
// $_SESSION = array();
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(session_name(), '', time() - 42000,
//         $params["path"], $params["domain"],
//         $params["secure"], $params["httponly"]
//     );
// }
// session_destroy();
// destroying ends

if (isset($_SESSION['AUID'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="  assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="  assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Admin panel
        </title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="  assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="  assets/demo/demo.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@700&display=swap" rel="stylesheet">
    </head>

    <body class="">
        <div class="wrapper ">
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="  assets/img/sidebar-1.jpg">
                <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
                <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                        GadgetSmart
                    </a></div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item   ">
                            <a class="nav-link" href="dashboard.php">
                                <i class="material-icons">dashboard</i>
                                <p><b>Dashboard</b></p>
                            </a>
                        </li>
                        <li class="nav-item  "> <a class="nav-link" href="customer.php">
                                <i class="material-icons">person</i>
                                <p><b>Customer</b></p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a class="nav-link" href="company.php">
                                <i class="material-icons">business</i>
                                <p><b>Company</b></p>
                            </a>
                        </li>
                        <li class="nav-item   ">
                            <a class="nav-link" href="stocks.php">
                                <i class="material-icons">loyalty</i>
                                <p><b>Stock</b></p>
                            </a>
                        </li>
                        <li class="nav-item  active ">
                            <a class="nav-link" href="order.php">
                                <i class="material-icons">list</i>
                                <p><b>Order</b></p>
                            </a>
                        </li>
                        <li class="nav-item   ">
                            <a class="nav-link" href="delivery.php">
                                <i class="material-icons">upcoming</i>
                                <p><b>Delivery</b></p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="payment.php">
                                <i class="material-icons">payments</i>
                                <p><b>Payments</b></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <a class="navbar-brand" href="javascript:;" style="font-family: Recursive;font-size: larger;">Order Details</a>
                        </div>
                        <?php include('components/navbar.php') ?>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row row-cols-1 row-cols-md-1 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <th class="text-uppercase" style="font-weight: bolder;">
                                                        Order ID
                                                    </th>
                                                    <th class="text-uppercase" style="font-weight: bolder;">
                                                        Customer
                                                    </th>
                                                    <th class="text-uppercase" style="font-weight: bolder;">
                                                        Payment ID
                                                    </th>
                                                    <th class="text-uppercase" style="font-weight: bolder;">
                                                        Product
                                                    </th>

                                                    <th class="text-uppercase" style="text-align: center;font-weight: bolder;">
                                                        Receipt
                                                    </th>
                                                    <th class="text-uppercase" style="text-align: center;font-weight: bolder;">
                                                        Status
                                                    </th>
                                                    <th class="text-uppercase" style="text-align: center;font-weight: bolder;">
                                                        Action
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include('db.php');
                                                    $query = "SELECT om.OUID, om.Method, om.payment_id, om.towards, om.status, om.custID, cm.Name,om.num FROM order_master om, customer_master cm WHERE om.custID = cm.CUID ORDER BY om.num desc ";
                                                    $result = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['OUID'] ?>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php echo $row['Name'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['payment_id'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['towards'] ?>
                                                            </td>
                                                            <td>
                                                                <a href="ReceiptGenerator.php?id=<?php echo $row['payment_id']  ?>" type="btn" class="btn btn-outline-primary btn-sm btn-block"><b>Download</b></a>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php
                                                                $Pstatus = $row['status'];
                                                                if ($Pstatus == "In Transit") {
                                                                ?>
                                                                    <h5 class="text-info"><b><?php echo $Pstatus ?></b></h5>
                                                                <?php
                                                                } else if ($Pstatus == "Preparing for Delivery") {
                                                                ?>
                                                                    <h5 class="text-warning"><b><?php echo $Pstatus ?></b></h5>
                                                                <?php

                                                                } else if ($Pstatus == "Order Rejected") {
                                                                ?>
                                                                    <h5 class="text-danger"><b>Rejected</b></h5>
                                                                <?php

                                                                } else if ($Pstatus == "Out For Delivery") {
                                                                ?>
                                                                    <h5 class="text-secondary"><b>Out For Delivery</b></h5>
                                                                <?php

                                                                } else if ($Pstatus == "Delivered") {
                                                                ?>
                                                                    <h5 class="text-success"><b>Delivered</b></h5>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <h5><b><?php echo $Pstatus ?></b></h5>
                                                                <?php

                                                                }
                                                                ?>

                                                            </td>
                                                            <td style="text-align: center;">
                                                                <?php
                                                                $Pstatus = $row['status'];
                                                                if ($Pstatus == "In Transit") {
                                                                ?>
                                                                    <a href="AcceptOrder.php?id=<?php echo $row['OUID']  ?>" type="btn" class="btn btn-success btn-sm btn-block"><b>Accept</b></a>
                                                                    or<br>
                                                                    <a href="RejectOrder.php?id=<?php echo $row['OUID']  ?>" type="btn" class="btn btn-danger btn-sm btn-block"><b>Reject</b></a>
                                                                <?php
                                                                } else if ($Pstatus == "Preparing for Delivery") {
                                                                ?>
                                                                    <h5><b>In Process with Delivery</b></h5>
                                                                <?php
                                                                } else if ($Pstatus == "Order Rejected") {
                                                                ?>
                                                                    <h5 class="text-danger"><b>Rejected</b></h5>
                                                                <?php

                                                                } else if ($Pstatus == "Out For Delivery") {
                                                                ?>
                                                                    <h5 class="text-secondary"><b>Out For Delivery</b></h5>
                                                                <?php

                                                                } else if ($Pstatus == "Delivered") {
                                                                ?>
                                                                    <h5 class="text-success"><b>Delivered</b></h5>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <h5><b>Delivered</b></h5>
                                                                <?php

                                                                }
                                                                ?>

                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                    if (mysqli_num_rows($result) == 0) {
                                                    ?>
                                                        <tr>
                                                            <td colspan="5" style="text-align: center;">No registered customer found</td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php include('components/footer.php') ?>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="  assets/js/core/jquery.min.js"></script>
        <script src="  assets/js/core/popper.min.js"></script>
        <script src="  assets/js/core/bootstrap-material-design.min.js"></script>
        <script src="  assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="  assets/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="  assets/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="  assets/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="  assets/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="  assets/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="  assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="  assets/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="  assets/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="  assets/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="  assets/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="  assets/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="  assets/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="  assets/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="  assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="  assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="  assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="  assets/demo/demo.js"></script>
        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                            $('.fixed-plugin .dropdown').addClass('open');
                        }

                    }

                    $('.fixed-plugin a').click(function(event) {
                        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .active-color span').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-color', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data-color', new_color);
                        }
                    });

                    $('.fixed-plugin .background-color .badge').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('background-color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data-background-color', new_color);
                        }
                    });

                    $('.fixed-plugin .img-holder').click(function() {
                        $full_page_background = $('.full-page-background');

                        $(this).parent('li').siblings().removeClass('active');
                        $(this).parent('li').addClass('active');


                        var new_image = $(this).find("img").attr('src');

                        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            $sidebar_img_container.fadeOut('fast', function() {
                                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                                $sidebar_img_container.fadeIn('fast');
                            });
                        }

                        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $full_page_background.fadeOut('fast', function() {
                                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                                $full_page_background.fadeIn('fast');
                            });
                        }

                        if ($('.switch-sidebar-image input:checked').length == 0) {
                            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                        }
                    });

                    $('.switch-sidebar-image input').change(function() {
                        $full_page_background = $('.full-page-background');

                        $input = $(this);

                        if ($input.is(':checked')) {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar_img_container.fadeIn('fast');
                                $sidebar.attr('data-image', '#');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page_background.fadeIn('fast');
                                $full_page.attr('data-image', '#');
                            }

                            background_image = true;
                        } else {
                            if ($sidebar_img_container.length != 0) {
                                $sidebar.removeAttr('data-image');
                                $sidebar_img_container.fadeOut('fast');
                            }

                            if ($full_page_background.length != 0) {
                                $full_page.removeAttr('data-image', '#');
                                $full_page_background.fadeOut('fast');
                            }

                            background_image = false;
                        }
                    });

                    $('.switch-sidebar-mini input').change(function() {
                        $body = $('body');

                        $input = $(this);

                        if (md.misc.sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            md.misc.sidebar_mini_active = false;

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                        } else {

                            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                            setTimeout(function() {
                                $('body').addClass('sidebar-mini');

                                md.misc.sidebar_mini_active = true;
                            }, 300);
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);

                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Javascript method's body can be found in assets/js/demos.js
                md.initDashboardPageCharts();

            });
        </script>
    </body>

    </html>
<?php
} else {
    header("location:index.php?plogin=0");
}
?>