<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
  <span class="sr-only">Toggle navigation</span>
  <span class="navbar-toggler-icon icon-bar"></span>
  <span class="navbar-toggler-icon icon-bar"></span>
  <span class="navbar-toggler-icon icon-bar"></span>
</button>

<div class="collapse navbar-collapse justify-content-end">
<h4 class="font-weight-bold">Welcome, <?php echo $adminName ?></h4>
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">notifications</i>
        <?php
        include('db.php');
        $query = "SELECT count(text)as numNotify FROM `notification_master` ";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $numNotify = $row['numNotify'];
          if ($numNotify == 0) {
        ?>
            <span class="notification" style="display: none;"><?php echo $numNotify ?></span>
          <?php
          } else {
          ?>

            <span class="notification"><?php echo $numNotify ?></span>
        <?php

          }
        }
        ?>

        <p class="d-lg-none d-md-block">
          Some Actions
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <?php
        include('db.php');
        $query = "SELECT * FROM `notification_master` ";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <a class="dropdown-item text-overflow" href="deleteNotification.php?id=<?php echo $row['notificationNumber'] ?>"><?php echo $row['text'] ?></a>
        <?php
        }
        ?>

      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">person</i>
        <p class="d-lg-none d-md-block">
          Account
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
        <!-- <a class="dropdown-item" href="#">Profile</a> -->
        <a class="dropdown-item" href="settings.php">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </li>
  </ul>
</div>

