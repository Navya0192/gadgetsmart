<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gadgetsmart";

// create connection
$con = mysqli_connect($servername, $username, $password, $database);

if($con -> connect_error){
    echo("connection failed");
}
?>