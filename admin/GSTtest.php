<?php

$TemptotalGST = "15";
$totalGST = (int)$TemptotalGST;
$TotalAmount = 35000;

$divideGSt = $totalGST/2;


// What has to be calculated

$cgst = $TotalAmount*($divideGSt/100);
$sgst = $TotalAmount*($divideGSt/100);
$AWOTGST = $TotalAmount-($cgst + $sgst);
$AWOTGST1 = $TotalAmount-($TotalAmount*($totalGST/100));
// BODMAS Rule  Backet open divide multiple add subtract

echo("CGST :".$cgst."<br>");
echo("SGST :".$sgst."<br>");
echo("Amount Without GST :".$AWOTGST."<br>");
echo("Amount Without GST1 :".$AWOTGST1."<br>");

?>