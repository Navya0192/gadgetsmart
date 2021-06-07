<?php

if (isset($_POST['submit'])) {
  $pname = $_POST['pname'];
  $pprice = $_POST['pprice'];
  $pquantity = $_POST['pquantity'];
  $ptype = $_POST['ptype'];
  $pcompany = $_POST['pcompany'];
  $pram = $_POST['pram'];
  $pstorage = $_POST['pstorage'];

  $name = $_FILES['file']['name'];
  $name1 = "ProductImg/" . $name . "";
  $target_dir = "ProductImg/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $extensions_arr = array("jpg", "jpeg", "png", "gif");
  $filessize = 400000;  //this is in bytes convert before

  if ($_FILES['file']['size'] <= $filessize) {
    if (in_array($imageFileType, $extensions_arr)) {
      if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
        include('db.php');
        $sql22 = "INSERT INTO `stock_master`(`PUID`, `Name`, `Imagepath`, `price`, `type`, `quantity`, `companyid`,`Ram`, `Storage`) 
        VALUES (UUID(),'" . $pname . "','" . $name1 . "','" . $pprice . "','" . $ptype . "','" . $pquantity . "','" . $pcompany . "','" . $pram . "','" . $pstorage . "')";
        if (mysqli_query($con, $sql22)) {
          header("location:stocks.php?success=0");
        } else {
          header("location:stocks.php?failed=0");
        }
      }
    } else {
      header("location:stocks.php?EImgExt=0");
    }
  } else {
    header("location:stocks.php?EImgSize=0");
  }
}
if (isset($_POST['editsubmit'])) {
  $proid = $_POST['proid'];
  $proname = $_POST['proname'];
  $proprice = $_POST['proprice'];
  $proquan = $_POST['proquan'];
  // $protype = $_POST['protype'];
  // $procom = $_POST['procom'];
  $proram = $_POST['proram'];
  $prostorage = $_POST['prostorage'];
  include('db.php');
  $sql33="UPDATE `stock_master` SET `Name`='".$proname."',`price`='".$proprice."',`quantity`='".$proquan."',`Ram`='".$proram."',`Storage`='".$prostorage."' WHERE `PUID` = '".$proid."'";
  if(mysqli_query($con,$sql33)){
    header("location:stocks.php?DC=0");
  }else{
    header("location:stocks.php?DNC=0");
  }
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
    GadgetSmart Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="  assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">

  <link href="  assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="  assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item   ">
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
          <li class="nav-item  active  ">
            <a class="nav-link" href="stocks.php">
              <i class="material-icons">loyalty</i>
              <p><b>Stock</b></p>
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link" href="order.html">
              <i class="material-icons">list</i>
              <p><b>Order</b></p>
            </a>
          </li>
          <li class="nav-item   ">
            <a class="nav-link" href="delivery.html">
              <i class="material-icons">upcoming</i>
              <p><b>Delivery</b></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
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
            <a class="navbar-brand" href="javascript:;" style="font-family: Orelega One;font-size: 35px;">Stock</a>
          </div>
          <?php include('components/navbar.php') ?>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="margin-top: 15px;padding-top: 20px;">
        <div class="container-fluid">

          <div class="row row-cols-1 row-cols-md-2 g-2">
            <div class="col">
              <div class="card ">
                <div class="card-body">


                  <button class="btn-outline-dark btn-sm" style="float: right;" data-toggle="modal" data-target="#AddStock">+ Add New Stock</button>
                  <?php
                  include('db.php');
                  $query2 = "SELECT COUNT(`PUID`)as pcount from stock_master";
                  $result2 = mysqli_query($con, $query2);
                  while ($row = mysqli_fetch_assoc($result2)) {
                    $pcount = $row['pcount'];
                  }
                  if (mysqli_num_rows($result2) == 0) {
                    $pcount = 0;
                  }

                  ?>
                  <h4><b>Total Product Added</b></h4>
                  <h2><b>&nbsp;&nbsp;<?php echo $pcount ?></b></h2>
                  <div class="modal fade" id="AddStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add new stock</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <table>
                              <tr>
                                <td>Product Name </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="pname"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Ram </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="pram"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Storage </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="pstorage"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Product Price </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="pprice"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Product Quantity </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="pquantity"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Product Type </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="text" name="ptype"></td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Product Company </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td>
                                  <select class="form-control" required name="pcompany">
                                    <?php
                                    include('db.php');
                                    $query2 = "SELECT * FROM `company_master`";
                                    $result2 = mysqli_query($con, $query2);
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                    ?>
                                      <option value="<?php echo $row['ComUID'] ?>"><?php echo $row['Name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>Product Image </td>
                                <td>&nbsp;:&nbsp;</td>
                                <td><input type="file" name="file"></td>
                              </tr>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary" style="font-weight: bolder;">Add Stock</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col">
              <div class="card">
                <div class="card-body">
                  
                  <?php
                  include('db.php');
                  $query2 = "SELECT count(DISTINCT `companyid`)as pcomcount from stock_master";
                  $result2 = mysqli_query($con, $query2);
                  while ($row = mysqli_fetch_assoc($result2)) {
                    $pcom = $row['pcomcount'];
                  }
                  if (mysqli_num_rows($result2) == 0) {
                    $pcom = 0;
                  }

                  ?>
                  <h4><b>Total Company Product Added</b></h4>
                  <h2><b>&nbsp;&nbsp;<?php echo $pcom ?></b></h2>
                </div>
              </div>
            </div>
          </div>
          <?php
          if (isset($_GET['success'])) {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" >
              <strong>Stock successfully added !</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['failed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Due to some error stock was not added, <br>Kindly try again later !</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['EImgExt'])) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Image extension wasd not correct,<br> Please .jpg, .jpeg, .png</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['DNC'])) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>There was an error updating the data.<br>Kindly try agin later</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['DC'])) {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Data Updated Successfully</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['PD'])) {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Product deleted successfully</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['PND'])) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>There was an error deleting the product</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <?php
          if (isset($_GET['EImgSize'])) {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Image size is more than require size,<br>Maximum image size should be : 400kb</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php
          }
          ?>
          <div class="row row-cols-1 row-cols-md-1 g-4">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th class="text-uppercase" style="font-weight: bolder;">
                          Product ID
                        </th>
                        <th class="text-uppercase" style="font-weight: bolder;">
                          Product Name
                        </th>
                        <th class="text-uppercase" style="font-weight: bolder;">
                          Price
                        </th>
                        <th class="text-uppercase" style="text-align: center;font-weight: bolder;">
                          Quantity
                        </th>
                        <th class="text-uppercase" style="font-weight: bolder;">
                          Type
                        </th>
                        <th class="text-uppercase" style="font-weight: bolder;">
                          Company
                        </th>
                        <th class="text-uppercase" style="font-weight: bolder;text-align: center;">
                          Edit
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        include('db.php');
                        $query = "SELECT sm.PUID,sm.Name,sm.price,sm.quantity,sm.type,sm.companyid,cm.ComUID,sm.Ram,sm.Storage,cm.Name as cname 
                        FROM stock_master sm, company_master cm WHERE sm.companyid = cm.ComUID";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                            <td>
                              <?php echo $row['PUID'] ?>
                            </td>
                            <td>
                              <?php echo $row['Name'] ?>&nbsp;<?php echo $row['Ram'] ?>&nbsp;<?php echo $row['Storage'] ?>
                            </td>
                            <td>
                              ₹<?php echo $row['price'] ?>
                            </td>
                            <td style="text-align:  center;">
                              <?php echo $row['quantity'] ?>
                            </td>
                            <td>
                              <?php echo $row['type'] ?>
                            </td>
                            <td style="text-align: center;">
                              <?php echo $row['cname'] ?>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm btn-block" data-toggle="modal" data-target="#modal-<?php echo $row['PUID'] ?>">Edit</button>
                            </td>
                          </tr>
                          <div class="modal fade" id="modal-<?php echo $row['PUID'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><b>Edit Stock</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form method="POST">
                                  <div class="modal-body">
                                    <h5><b>Product ID</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['PUID'] ?>" name="proid" id="proid"> (disabled) </h5>
                                    <h5><b>Product Name</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['Name'] ?>" name="proname"> </h5>
                                    <h5><b>Product Ram</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['Ram'] ?>" name="proram"> </h5>
                                    <h5><b>Product Storage</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['Storage'] ?>" name="prostorage"> </h5>
                                    <h5><b>Product Price</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['price'] ?>" name="proprice"> </h5>
                                    <h5><b>Product Quantity</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['quantity'] ?>" name="proquan"> </h5>
                                    <h5><b>Product Type</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['type'] ?>" name="" id="protype"> (disabled) </h5>
                                    <h5><b>Product Company</b>&nbsp;:&nbsp;<input type="text" value="<?php echo $row['cname'] ?>" name="" id="procom"> (disabled)</h5>
                                  </div>
                                  <div class="modal-footer mx-auto">
                                    <a href="removeProduct.php?pid=<?php echo $row['PUID'] ?>" type="btn" class="btn btn-danger fw-bolder" style="float: left;" >Remove Product</a>
                                    <button type="submit" name="editsubmit" class="btn btn-success fw-bolder">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script>
    $('#proid').prop('readonly', true);
  </script>
  <script>
    $('#procom').prop('readonly', true);
  </script>
  <script>
    $('#protype').prop('readonly', true);
  </script>
</body>

</html>