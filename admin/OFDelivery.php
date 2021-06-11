<?php
session_start();
$orderid = $_GET['id'];

include('db.php');
$sql2 = "UPDATE `order_master` SET `status`='Out For Delivery' WHERE `OUID` = '" . $orderid . "'";
if (mysqli_query($con, $sql2)) {
    include('db.php');
    $sql3 = "UPDATE `delivery_master` SET `status`='Out For Delivery' WHERE `OUID` = '" . $orderid . "'";
    if (mysqli_query($con, $sql3)) {
        header("location:delivery.php?OFD=0");
    } else {
        header("location:delivery.php?NOFD=0");
    }
} else {
    header("location:delivery.php?NOFD=0");
}
