<?php
$dateofbirth='01-09-2000';
$today= date('Y-m-d');
$diff = date_diff(date_create($dateofbirth) , date_create($today));
echo $diff->format('%y');




?>