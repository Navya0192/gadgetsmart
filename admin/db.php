<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gadgetsmart";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Sorry failed to connect".mysqli_connect_error());
}

echo"Connection Successfull<br>"

?>