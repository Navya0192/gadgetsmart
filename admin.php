<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="full-page">
        <div class="navbar">
        </div>
        <h3 class="header1">GADGET SMART</h3>
         <nav>
             <ul id='MenuItems'>
                 <li><a href='http://localhost:8080/gadgetsmart/admindonation.php'>Donation</a></li>
                 <li><a href='http://localhost:8080/gadgetsmart/adminvolunteer.php'>Volunteer</a></li>
                 <li><a href='http://localhost:8080/gadgetsmart/admincontacts.php'>Contacts</a></li>
                 <li><a href='http://localhost:8080/gadgetsmart/adminactivities.php'>Activities</a></li>
                 <li><a href='http://localhost:8080/gadgetsmart/logout.php'><button class='logoutbtn'>Log Out</button></a>
                </li>
             </ul>
         </nav>
    <div id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="xyz1">Donation</h2>
                    <br>
                    <div class="about-content">
                    <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ngo";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM donation1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["names"]. "<br> Email Id:  " . $row["email_id"]. "<br> Phone Number:  " . $row["mobileno"]. "<br>Donation:  ".$row["donation"]."<br><br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
                    </div>           
                 </div>
                <div class="col-md-6"></div>

            </div>
        </div>
    </div>
</body>
</html>