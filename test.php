<?php
$CellApha = "C";
$series = "1";

echo($CellApha.$series."<br>");
$num = (int)$series;
for($num = 2;$num<=15;$num++){
    $series = (string)$num;
    echo($CellApha.$series."<br>");
}



?>