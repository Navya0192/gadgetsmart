<?php
    include_once 'db.php';
    $username = $_POST['username'];
    $password = $_POST['pass'];

    echo("<br>");
    echo"$username";
    echo("<br>");
    echo"$password";


        $sql = "select * from login where username='".$username."' and password='".$password."'";
        echo"$sql";
        $sqli = mysqli_query($conn, $sql);
        $rw = mysqli_fetch_array($sqli);

        if($rw['ID'] > 0){
            header("location: dashboard.html");
        }
        else{
            header("location: index.php?error=failed");
        }
    
?>