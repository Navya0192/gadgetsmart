<?php
session_start();
$custid = $_SESSION['custid'];
$proid =  $_GET['proid'];
$paymentid = $_GET['payment_id'];
$method = $_GET['method'];
$amount = $_GET['amount'];

date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d h:i:sa");

// echo ($proid . "<br>");
// echo ($paymentid . "<br>");
// echo ($method . "<br>");

include('db.php');
$query2 = "SELECT * FROM `stock_master` WHERE `PUID` ='" . $proid . "'";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
  $proName = $row['Name'];
  $TempProQuantity = $row['quantity'];
}
$proQuantity = (int)$TempProQuantity;
$proQuantity--;
$proQuantity = (string)$proQuantity;

include('db.php');
$sql1 = "UPDATE `stock_master` SET `quantity`='" . $proQuantity . "' WHERE `PUID` = '" . $proid . "'";
if (mysqli_query($con, $sql1)) {
  include('db.php');
  $sql99 = "INSERT INTO `order_master`(`OUID`, `Method`, `payment_id`, `towards`, `status`, `custID`) 
  VALUES (UUID(),'" . $method . "','" . $paymentid . "','Purchase - " . $proName . "','In Transit','" . $custid . "')";
  if (mysqli_query($con, $sql99)) {
    include('db.php');
    $sql98 = "INSERT INTO `payment`(`payment_id`, `referenceNumber`, `custID`, `towards`, `amount`, `gDate`) 
    VALUES ('" . $paymentid . "',UUID(),'" . $custid . "','Purchase - " . $proName . "','" . $amount . "','" . $datetime . "')";
    if (mysqli_query($con, $sql98)) {
      include('db.php');
      $sql97 = "INSERT INTO `notification_master`(`text`, `status`) 
      VALUES ('Order for - ".$proName." - ".$datetime."','In Transit')";
      if (mysqli_query($con, $sql97)) {
        header("location:order.php?success=0");
      }
    } else {
      header('Location: ' . $_SERVER['HTTP_REFERER'] . "&failed=0");
    }
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . "&failed=0");
  }
} else {
  header('Location: ' . $_SERVER['HTTP_REFERER'] . "&failed=0");
}
