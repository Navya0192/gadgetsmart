<?php
session_start();
$orderid = $_GET['id'];

include('db.php');
$sql2 = "UPDATE `order_master` SET `status`='Delivered' WHERE `OUID` = '" . $orderid . "'";
if (mysqli_query($con, $sql2)) {
    include('db.php');
    $sql2 = "DELETE FROM `delivery_master` WHERE `OUID` = '" . $orderid . "'";
    if (mysqli_query($con, $sql2)) {
        header("location:order.php?Delivered=0");
    }
    else {
        header("location:delivery.php?NotDelivered=0");
    }

} else {
    header("location:delivery.php?NotDelivered=0");
}
