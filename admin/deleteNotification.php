<?php
session_start();
$nid = $_GET['id'];
include('db.php');
        $sql1 = "DELETE FROM `notification_master` WHERE `notificationNumber` = '".$nid."'";
        if (mysqli_query($con, $sql1)) {
            header("location:order.php");            
        }
