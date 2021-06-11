<?php
session_start();
$orderid = $_GET['id'];

include('db.php');

$sql2 = "UPDATE `order_master` SET `status`='Order Rejected' WHERE `OUID` = '" . $orderid . "'";
if (mysqli_query($con, $sql2)) {
    header("location:order.php?Dreject=0");
} else {
    header("location:order.php?DNreject=0");
}
