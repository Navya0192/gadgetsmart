<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gadgetsmart";
session_start();
$uname = $_SESSION['uname'];
echo($uname."<br>");

// create connection
$con = mysqli_connect($servername, $username, $password, $database);

if($con -> connect_error){
    echo("connection failed");
}

?>