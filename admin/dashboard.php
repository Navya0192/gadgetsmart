<?php
session_start();
if (isset($_SESSION['AUID'])) {

  include('db.php');
  $query2 = "SELECT SUM(`quantity`)as sumqty from stock_master";
  $result2 = mysqli_query($con, $query2);
  if ($row = mysqli_fetch_assoc($result2)) {
    $sumqty = $row['sumqty'];
  } else {
    $sumqty = 0;
  }


  include('db.php');
  $query2 = "SELECT sum(`amount`) as tpay from payment";
  $result2 = mysqli_query($con, $query2);
  if ($row = mysqli_fetch_assoc($result2)) {
    $totalRevenue = $row['tpay'];
  } else {
    $totalRevenue = 0;
  }

  include('db.php');
  $query2 = "SELECT count(`OUID`)as DCount FROM `delivery_master` WHERE 1 ";
  $result2 = mysqli_query($con, $query2);
  if ($row = mysqli_fetch_assoc($result2)) {
    $dCount = $row['DCount'];
  } else {
    $dCount = 0;
  }

  include('db.php');
  $query2 = "SELECT count(`CUID`)as custcount FROM `customer_master` WHERE 1 ";
  $result2 = mysqli_query($con, $query2);
  if ($row = mysqli_fetch_assoc($result2)) {
    $activeCust = $row['custcount'];
  } else {
    $activeCust = 0;
  }

  $year = date("Y");
  $month = date("m");

  $dateObj   = DateTime::createFromFormat('!m', $month);
  $monthName = $dateObj->format('F');
  // echo ($monthName);
  // echo("".$year."/01/01");
  include('db.php');
  $sql3 = "SELECT
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/01/01' AND '" . $year . "/01/31' THEN 1 END) AS Jan,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/02/01' AND '" . $year . "/02/31' THEN 1 END) AS Feb,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/03/01' AND '" . $year . "/03/31' THEN 1 END) AS Mar,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/04/01' AND '" . $year . "/04/31' THEN 1 END) AS Apr,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/05/01' AND '" . $year . "/05/31' THEN 1 END) AS May,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/06/01' AND '" . $year . "/06/31' THEN 1 END) AS Jun,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/07/01' AND '" . $year . "/07/31' THEN 1 END) AS Jul,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/08/01' AND '" . $year . "/08/31' THEN 1 END) AS Aug,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/09/01' AND '" . $year . "/09/31' THEN 1 END) AS Sep,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/10/01' AND '" . $year . "/10/31' THEN 1 END) AS Oct,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/11/01' AND '" . $year . "/11/31' THEN 1 END) AS Nov,
    COUNT(CASE WHEN `RegDate` BETWEEN '" . $year . "/12/01' AND '" . $year . "/12/31' THEN 1 END) AS Dece
FROM `order_master`";
  $result4 = mysqli_query($con, $sql3);
  $json = [];
  while ($row = mysqli_fetch_assoc($result4)) {
    $json[0] = $row['Jan'];
    $json[1] = $row['Feb'];
    $json[2] = $row['Mar'];
    $json[3] = $row['Apr'];
    $json[4] = $row['May'];
    $json[5] = $row['Jun'];
    $json[6] = $row['Jul'];
    $json[7] = $row['Aug'];
    $json[8] = $row['Sep'];
    $json[9] = $row['Oct'];
    $json[10] = $row['Nov'];
    $json[11] = $row['Dece'];
  }


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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <li class="nav-item active ">
              <a class="nav-link" href="dashboard.php">
                <i class="material-icons">dashboard</i>
                <p><b>Dashboard</b></p>
              </a>
            </li>
            <li class="nav-item  ">
              <a class="nav-link" href="customer.php">
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
            <li class="nav-item   ">
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
              <a class="navbar-brand" href="javascript:;">Dashboard</a>
            </div>
            <?php include('components/navbar.php') ?>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid" style="margin-top:50px ;">
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">list</i>
                    </div>
                    <p class="card-category " style="font-weight: bolder;">Stocks Available</p>
                    <h3 class="card-title"><?php echo $sumqty ?>

                    </h3>
                  </div>
                  <div class="card-footer" style="border:none;">
                    &nbsp;
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">payments</i>
                    </div>
                    <p class="card-category " style="font-weight: bolder;">Revenue Generated</p>
                    <h3 class="card-title">₹<?php echo number_format($totalRevenue) ?></h3>
                  </div>
                  <div class="card-footer" style="border:none;">
                    &nbsp;
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon ">
                      <i class="material-icons">upcoming</i>
                    </div>
                    <p class="card-category" style="font-weight: bolder;">Pending Delievery</p>
                    <h3 class="card-title"><?php echo $dCount ?></h3>
                  </div>
                  <div class="card-footer" style="border:none;">
                    &nbsp;
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">people</i>
                    </div>
                    <p class="card-category " style="font-weight: bolder;">Active Customers</p>
                    <h3 class="card-title"><?php echo $activeCust ?></h3>
                  </div>
                  <div class="card-footer" style="border:none;">
                    &nbsp;
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-success">
                    <div class="ct-chart" id="dailySalesChart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="card-category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.
                    </p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-warning">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Email Subscriptions</h4>
                    <p class="card-category">Last Campaign Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-danger">
                    <div class="ct-chart" id="completedTasksChart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Completed Tasks</h4>
                    <p class="card-category">Last Campaign Performance</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> campaign sent 2 days ago
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Charts on Dashboard -->
            <div class="row">

              <!-- Area Chart -->
              <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4 h-100">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="m-0 font-weight-bold text-primary">Order Generated (Year : <?php echo $year ?>)</h4>
                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                  </div>
                  <!-- Card Body -->
                  <div class="card-body h-100">
                    <div class="chart-area" style="height: 300px;">
                      <canvas id="myAreaChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Pie Chart -->
              <!-- <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4 h-100">
                  
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lead Generation<br>(Month :</h6>
                    <a href="monthReport.php" class="btn btn-outline-primary btn-sm">View Report</a>
                  
                  </div>
               
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social Media
                      </span>
                      <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                      </span>
                    </div>
                  </div>
                </div>
              </div>  -->
            </div>
            <!-- Chart ends here -->

          </div>
        </div>
        <?php
        include('components/footer.php')
        ?>
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


    <!-- Chart JS javascript -->
    <script src="js/demo/chart-area-demo.js"></script>

    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Charts Dashboard (line) -->
    <script type="text/javascript">
      var ctx = document.getElementById("myAreaChart");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Order Generated",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo json_encode($json); ?>,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: true,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 6
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 6,
                padding: 10,

                // Include a dollar sign in the ticks
                // callback: function(value, index, values) {
                //   return '$' + number_format(value);
                // }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    </script>

    <!-- <script>
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          // labels: ["Direct", "Social Media", "Referral"],
          datasets: [{
            data: (12, 14, 15),
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });
    </script> -->



  </body>

  </html>
<?php
} else {
  header("location:index.php?plogin=0");
}
?>