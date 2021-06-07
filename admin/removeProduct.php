<?php
session_start();

$puid = $_GET['pid'];
include('db.php');
  $sql33="DELETE from `stock_master`  WHERE `PUID` = '".$puid."'";
  if(mysqli_query($con,$sql33)){
    header("location:stocks.php?PD=0");
  }else{
    header("location:stocks.php?PND=0");
  }
  header("location:stocks.php?PND=0");
?>
