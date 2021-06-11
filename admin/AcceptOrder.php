<?php
session_start();
$orderid = $_GET['id'];
include('db.php');
$query = "SELECT om.OUID, om.payment_id, om.towards, om.status, om.custID, cm.Name,cm.Address,cm.city,cm.state,cm.pincode FROM order_master om, customer_master cm WHERE om.custID = cm.CUID and om.OUID = '" . $orderid . "' ";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $ouid = $row['OUID'];
    $cAddress = $row['Address'];
    $cCity = $row['city'];
    $cState = $row['state'];
    $cPincode = $row['pincode'];

    echo ($ouid . "<br>");
    echo ($cAddress . "<br>");
    echo ($cCity . "<br>");
    echo ($cState . "<br>");
    echo ($cPincode . "<br>");
}
include('db.php');
$sql1 = "INSERT INTO `delivery_master`(`OUID`, `DUID`, `DAddress`, `Dcity`, `Dstate`, `Dpincode`, `status`) 
VALUES ('" . $ouid . "',UUID(),'" . $cAddress . "','" . $cCity . "','" . $cState . "','" . $cPincode . "','Preparing for Delivery')";
if (mysqli_query($con, $sql1)) {
    include('db.php');
    $sql2 = "UPDATE `order_master` SET `status`='Preparing for Delivery' WHERE `OUID` = '".$ouid."'";
    if (mysqli_query($con, $sql2)) {
       
        header("location:order.php?Dinit=0");
    }else{
        header("location:order.php?DNinit=0");
    }
}
else{
    header("location:order.php?DNinit=0");
}
