<?php
session_start();
if (isset($_SESSION['cuname'])) {
    $displayContent = "block";
    $displayContent1 = "none";
    $contentBlock = "enabled";
} else {
    $displayContent = "none";
    $displayContent1 = "block";
    $contentBlock = "Disabled";
}
include('db.php');
$output = " ";
if(isset($_POST['action'])){
    $search = $_POST['search'];
    $query20 = "SELECT sm.PUID, sm.Name, sm.Imagepath, sm.price, sm.type, sm.quantity, sm.companyid, sm.Ram, sm.Storage,cm.Name as cname FROM stock_master sm, company_master cm WHERE sm.companyid = cm.ComUID and sm.quantity > 0 and sm.Name like '%" . $search . "%'  ";
}

if(isset($_POST['ram'])){
    $ram_filter = implode("','", $_POST['ram']);
    $query20 .="AND sm.Ram in ('".$ram_filter."')";
}
if(isset($_POST['storage'])){
    $storage_filter = implode("','", $_POST['storage']);
    $query20 .="AND  sm.Storage in ('".$storage_filter."')";
}
if(isset($_POST['company'])){
    $company_filter = implode("','", $_POST['company']);
    $query20 .="AND sm.companyid in ('".$company_filter."')";
}
include('db.php');
$result13 = mysqli_query($con, $query20);
while ($row = mysqli_fetch_assoc($result13)) {
$output .= '<div class="col">
<div class="card shadow" style="border-radius: 10px;">
    <div class="row row-cols-1 row-cols-md-2 g-1">
        <div class="col-md-3 p-2">
            <div class="card h-100" style="border: none;">
                <img src="admin/'.$row['Imagepath'].'" class="card-img-top mx-auto my-auto" alt="..." style="width: 200px;height: auto;">
            </div>
        </div>
        <div class="col-md-9 p-2">
            <div class="card h-100" style="border: none;">
                <div class="card-body">
                    <h5 class="card-title"><b>'. $row['Name'] .'<br><span style="font-size: medium;color: grey;">'.$row['cname'] .'</span></b></h5>
                    <p class="card-text">
                    <table>
                        <tr>
                            <td><b>Product Category</b></td>
                            <td><b>&nbsp;:&nbsp;</b></td>
                            <td>'.$row['type'] .'</td>
                        </tr>
                        <tr>
                            <td colspan="3"><b>&nbsp</b></td>
                        </tr>
                        <tr>
                            <td><b>Ram</b></td>
                            <td><b>&nbsp;:&nbsp;</b></td>
                            <td>'.$row['Ram'] .'</td>
                        </tr>
                        <tr>
                            <td><b>Storage</b></td>
                            <td><b>&nbsp;:&nbsp;</b></td>
                            <td>'.$row['Storage'].'</td>
                        </tr>
                    </table>
                    </p>
                    <p><span style="font-size:30px"><b>Price :</b> <span style="font-family: Arial, Helvetica, sans-serif;font-weight: bolder;">₹<span id="'.$row['PUID'].'" value="'.$row['price'].'">'.$row['price'].'</span></span></span>
                        <button type="button" class="btn btn-dark" value="'.$row['price'].'" id="'.$row['PUID'].'" onClick="reply_click(this.value,this.id)" style="float: right;" '.$contentBlock .'><b>Buy Directly</b></button>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>';
}
if(mysqli_num_rows($result13) == 0){
    $output .= '<h5>No results found with keyword ' . $search . '</h5>';
}
echo($output);
