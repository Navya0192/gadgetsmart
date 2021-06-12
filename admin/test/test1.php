<?php
session_start();

$username = "Navya";
$passowrd = "Nav123";
$num1 = "45";
$num2 = "66";
$_SESSION['username'] = $username;
$_SESSION['password'] = $passowrd;
$_SESSION['$num1'] = (int)$num1;
$_SESSION['$num2'] = (int)$num2;

echo("Addition : ".$_SESSION['$num1']+$_SESSION['$num2']);
echo("Substraction : ".$_SESSION['$num1']-$_SESSION['$num2']);



?>