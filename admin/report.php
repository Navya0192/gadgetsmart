<?php
session_start();

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


include('db.php');
$query2 = "SELECT SUM(`quantity`)as sumqty from stock_master";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
    $sumqty = $row['sumqty'];
} else {
    $sumqty = 0;
}


include('db.php');
$query2 = "SELECT sum(`amount`) as tpay from payment";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
    $totalRevenue = $row['tpay'];
    $numTotalRevenue = number_format($totalRevenue);
} else {
    $totalRevenue = 0;
    $numTotalRevenue = number_format($totalRevenue);
}

include('db.php');
$query2 = "SELECT count(`OUID`)as DCount FROM `delivery_master` WHERE 1 ";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
    $dCount = $row['DCount'];
} else {
    $dCount = 0;
}

include('db.php');
$query2 = "SELECT count(`CUID`)as custcount FROM `customer_master` WHERE 1 ";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
    $activeCust = $row['custcount'];
} else {
    $activeCust = 0;
}

include('db.php');
$query2 = "SELECT count(`OUID`) as ordercount FROM `order_master` WHERE 1 ";
$result2 = mysqli_query($con, $query2);
if ($row = mysqli_fetch_assoc($result2)) {
    $oCount = $row['ordercount'];
} else {
    $oCount = 0;
}

date_default_timezone_set("Asia/Kolkata");
$year = date("Y");
$month = date("m");
$monthname = date("F");
$datereport = date("Ymd");
$date = date("l, jS \of F Y");
$time = date("h:i:s A");

$styleArray = array(
    'borders' => array(
        'outline' => array(
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => array('argb' => '000000'),
        ),
    ),
);


// Editing Speadsheet sheet 1
$spreadsheet = new Spreadsheet();
$spreadsheet->getSheetByName('Basic Details');
$sheet = $spreadsheet->getActiveSheet();
$sheet = $spreadsheet->getActiveSheet()->mergeCells('C7:D7');
$sheet->getColumnDimension('C')->setWidth(35);
$sheet->getColumnDimension('D')->setWidth(30);
$sheet->getStyle('C3:C4')->getFont()->setBold(true);
$sheet->getStyle('C3:C4')->getFont()->setSize(16);
$sheet->getStyle('D3:D4')->getFont()->setSize(14);
$sheet->getStyle('C7:D7')->getFont()->setSize(16);
$sheet->getStyle('C7:D7')->getFont()->setBold(true);
$sheet->getStyle('C7:D7')->applyFromArray($styleArray);
$sheet->getStyle('C7:D12')->applyFromArray($styleArray);
$sheet->getStyle('C8:C12')->applyFromArray($styleArray);
$sheet->getStyle('C8:C12')->getFont()->setBold(true);
$sheet->getStyle('C8:C12')->getFont()->setSize(14);
$sheet->getStyle('D8:D12')->getFont()->setSize(14);



// inputing spreadsheet sheet 1
$sheet->setCellValue('C3', 'Report Generation Date : ');
$sheet->setCellValue('C4', 'Report Generation Time : ');
$sheet->setCellValue('D3', $date);
$sheet->setCellValue('D4', $time);

$sheet->setCellValue('C7', 'Basic Details');
$sheet->setCellValue('C8', 'Total Stocks');
$sheet->setCellValue('C9', 'Total Order');
$sheet->setCellValue('C10', 'Pending Delivery');
$sheet->setCellValue('C11', 'Total Revenue(₹)');
$sheet->setCellValue('C12', 'Active Customer');

$sheet->setCellValue('D8', '' . $sumqty . '');
$sheet->setCellValue('D9', '' . $oCount . '');
$sheet->setCellValue('D10', '' . $dCount . '');
$sheet->setCellValue('D11', '' . $numTotalRevenue . '');
$sheet->setCellValue('D12', '' . $activeCust . '');


// editing spreadheet sheet2
$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Stocks');
$spreadsheet->addSheet($newSheet, 1);
$spreadsheet->setActiveSheetIndex(1);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$sheet = $spreadsheet->getActiveSheet()->mergeCells('B2:G2');
$sheet->getColumnDimension('B')->setWidth(40);
$sheet->getColumnDimension('C')->setWidth(35);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getStyle('B3:G3')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setSize(16);
$sheet->getStyle('B2:G2')->applyFromArray($styleArray);
$sheet->getStyle('B3')->applyFromArray($styleArray);
$sheet->getStyle('C3')->applyFromArray($styleArray);
$sheet->getStyle('D3')->applyFromArray($styleArray);
$sheet->getStyle('E3')->applyFromArray($styleArray);
$sheet->getStyle('F3')->applyFromArray($styleArray);
$sheet->getStyle('G3')->applyFromArray($styleArray);

$sheet->setCellValue('B2', 'Stock Master');
$sheet->setCellValue('B3', 'Product ID');
$sheet->setCellValue('C3', 'Product Name');
$sheet->setCellValue('D3', 'Price');
$sheet->setCellValue('E3', 'Type');
$sheet->setCellValue('F3', 'Company');
$sheet->setCellValue('G3', 'Quantity');
include('db.php');
$sql9 = "SELECT sm.PUID, sm.Name, sm.price, sm.type, sm.quantity, cm.Name as companyName FROM stock_master sm, company_master cm WHERE sm.companyid = cm.ComUID ";
$result9 = mysqli_query($con, $sql9);
$num = 4;
while ($row = mysqli_fetch_assoc($result9)) {
    $numString = (string)$num;
    $puid = $row['PUID'];
    $pname = $row['Name'];
    $pprice = $row['price'];
    $ptype = $row['type'];
    $pquantity = $row['quantity'];
    $pcname = $row['companyName'];
    $sheet->setCellValue('B' . $numString . '', $puid);
    $sheet->setCellValue('C' . $numString . '', $pname);
    $sheet->setCellValue('D' . $numString . '', $pprice);
    $sheet->setCellValue('E' . $numString . '', $ptype);
    $sheet->setCellValue('F' . $numString . '', $pcname);
    $sheet->setCellValue('G' . $numString . '', $pquantity);
    $num++;
}
if (mysqli_num_rows($result9) == 0) {
    $sheet = $spreadsheet->getActiveSheet()->mergeCells('B4:H4');
    $sheet->setCellValue('B4', 'NO DATA FOUND');
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
} else {

    $num--;
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
}

//sheet3
$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Order');
$spreadsheet->addSheet($newSheet, 2);
$spreadsheet->setActiveSheetIndex(2);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$sheet = $spreadsheet->getActiveSheet()->mergeCells('B2:G2');
$sheet->getColumnDimension('B')->setWidth(40);
$sheet->getColumnDimension('C')->setWidth(35);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(35);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getStyle('B3:G3')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setSize(16);
$sheet->getStyle('B2:G2')->applyFromArray($styleArray);
$sheet->getStyle('B3')->applyFromArray($styleArray);
$sheet->getStyle('C3')->applyFromArray($styleArray);
$sheet->getStyle('D3')->applyFromArray($styleArray);
$sheet->getStyle('E3')->applyFromArray($styleArray);
$sheet->getStyle('F3')->applyFromArray($styleArray);
$sheet->getStyle('G3')->applyFromArray($styleArray);

$sheet->setCellValue('B2', 'Order Master');
$sheet->setCellValue('B3', 'Order ID');
$sheet->setCellValue('C3', 'Customer Name');
$sheet->setCellValue('D3', 'Payment ID');
$sheet->setCellValue('E3', 'Towards');
$sheet->setCellValue('G3', 'Status');
$sheet->setCellValue('F3', 'Order Date');
include('db.php');
$sql9 = "SELECT om.OUID, om.payment_id, om.towards, om.status, om.RegDate,cm.Name FROM order_master om,customer_master cm WHERE om.custID = cm.CUID  ";
$result9 = mysqli_query($con, $sql9);
$num = 4;
while ($row = mysqli_fetch_assoc($result9)) {
    $numString = (string)$num;
    $puid = $row['OUID'];
    $pname = $row['Name'];
    $pprice = $row['payment_id'];
    $ptype = $row['towards'];
    $pquantity = $row['status'];
    $pcname = $row['RegDate'];
    $sheet->setCellValue('B' . $numString . '', $puid);
    $sheet->setCellValue('C' . $numString . '', $pname);
    $sheet->setCellValue('D' . $numString . '', $pprice);
    $sheet->setCellValue('E' . $numString . '', $ptype);
    $sheet->setCellValue('F' . $numString . '', $pcname);
    $sheet->setCellValue('G' . $numString . '', $pquantity);
    $num++;
}
if (mysqli_num_rows($result9) == 0) {
    $sheet = $spreadsheet->getActiveSheet()->mergeCells('B4:H4');
    $sheet->setCellValue('B4', 'NO DATA FOUND');
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
} else {

    $num--;
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
}


//sheet4
$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Pending Delivery');
$spreadsheet->addSheet($newSheet, 3);
$spreadsheet->setActiveSheetIndex(3);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$sheet = $spreadsheet->getActiveSheet()->mergeCells('B2:G2');
$sheet->getColumnDimension('B')->setWidth(40);
$sheet->getColumnDimension('C')->setWidth(35);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(35);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getStyle('B3:G3')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setSize(16);
$sheet->getStyle('B2:G2')->applyFromArray($styleArray);
$sheet->getStyle('B3')->applyFromArray($styleArray);
$sheet->getStyle('C3')->applyFromArray($styleArray);
$sheet->getStyle('D3')->applyFromArray($styleArray);
$sheet->getStyle('E3')->applyFromArray($styleArray);
$sheet->getStyle('F3')->applyFromArray($styleArray);
$sheet->getStyle('G3')->applyFromArray($styleArray);

$sheet->setCellValue('B2', 'Pending Delivery Master ');
$sheet->setCellValue('B3', 'Order ID');
$sheet->setCellValue('C3', 'Delivery ID');
$sheet->setCellValue('D3', ' Address');
$sheet->setCellValue('E3', 'City/State');
$sheet->setCellValue('G3', 'Status');
$sheet->setCellValue('F3', 'PinCode');
include('db.php');
$sql9 = "SELECT `OUID`, `DUID`, `DAddress`, `Dcity`, `Dstate`, `Dpincode`, `status` FROM `delivery_master` WHERE 1 ";
$result9 = mysqli_query($con, $sql9);
$num = 4;
while ($row = mysqli_fetch_assoc($result9)) {
    $numString = (string)$num;
    $puid = $row['OUID'];
    $pname = $row['DUID'];
    $pprice = $row['DAddress'];
    $pquantity = $row['Dpincode'];
    $pcname = $row['status'];
    $sheet->setCellValue('B' . $numString . '', $puid);
    $sheet->setCellValue('C' . $numString . '', $pname);
    $sheet->setCellValue('D' . $numString . '', $pprice);
    $sheet->setCellValue('E' . $numString . '', ''.$row['Dcity'].', '.$row['Dstate'].'');
    $sheet->setCellValue('G' . $numString . '', $pcname);
    $sheet->setCellValue('F' . $numString . '', $pquantity);
    $num++;
}
if (mysqli_num_rows($result9) == 0) {
    $sheet = $spreadsheet->getActiveSheet()->mergeCells('B4:H4');
    $sheet->setCellValue('B4', 'NO DATA FOUND');
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
} else {

    $num--;
    $sheet->getStyle('B4:G' . $num . '')->applyFromArray($styleArray);
}

//sheet5
$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'Active Customer');
$spreadsheet->addSheet($newSheet, 4);
$spreadsheet->setActiveSheetIndex(4);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$sheet = $spreadsheet->getActiveSheet()->mergeCells('B2:J2');
$sheet->getColumnDimension('B')->setWidth(40);
$sheet->getColumnDimension('C')->setWidth(35);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(35);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getColumnDimension('H')->setWidth(20);
$sheet->getColumnDimension('I')->setWidth(40);
$sheet->getColumnDimension('J')->setWidth(20);
$sheet->getStyle('B3:J3')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setBold(true);
$sheet->getStyle('B2')->getFont()->setSize(16);
$sheet->getStyle('B2:J2')->applyFromArray($styleArray);
$sheet->getStyle('B3')->applyFromArray($styleArray);
$sheet->getStyle('C3')->applyFromArray($styleArray);
$sheet->getStyle('D3')->applyFromArray($styleArray);
$sheet->getStyle('E3')->applyFromArray($styleArray);
$sheet->getStyle('F3')->applyFromArray($styleArray);
$sheet->getStyle('G3')->applyFromArray($styleArray);
$sheet->getStyle('H3')->applyFromArray($styleArray);
$sheet->getStyle('I3')->applyFromArray($styleArray);
$sheet->getStyle('J3')->applyFromArray($styleArray);

$sheet->setCellValue('B2', 'Customer Master ');
$sheet->setCellValue('B3', 'Customer ID');
$sheet->setCellValue('C3', 'Name');
$sheet->setCellValue('D3', 'Gender');
$sheet->setCellValue('E3', 'DOB');
$sheet->setCellValue('F3', 'Mobile');
$sheet->setCellValue('G3', 'Email');
$sheet->setCellValue('H3', ' Address');
$sheet->setCellValue('I3', 'City/State');
$sheet->setCellValue('J3', 'PinCode');
include('db.php');
$sql9 = "SELECT `CUID`, `Name`, `Mobile`, `email`, `Address`, `city`, `state`, `pincode`, `DOB`, `Gender` FROM `customer_master` WHERE 1  ";
$result9 = mysqli_query($con, $sql9);
$num = 4;
while ($row = mysqli_fetch_assoc($result9)) {
    $numString = (string)$num;
    $puid = $row['CUID'];
    $pname = $row['Name'];
    $pprice = $row['Gender'];
    $pquantity = $row['DOB'];
    $pcname = $row['Mobile'];
    $sheet->setCellValue('B' . $numString . '', $puid);
    $sheet->setCellValue('C' . $numString . '', $pname);
    $sheet->setCellValue('D' . $numString . '', $pprice);
    $sheet->setCellValue('E' . $numString . '', $pquantity);
    $sheet->setCellValue('F' . $numString . '', $pcname);
    $sheet->setCellValue('G' . $numString . '', $row['email']);
    $sheet->setCellValue('H' . $numString . '', $row['Address']);
    $sheet->setCellValue('I' . $numString . '', ''.$row['city'].', '.$row['state'].'');
    $sheet->setCellValue('J' . $numString . '', $row['pincode']);
    $num++;
}
if (mysqli_num_rows($result9) == 0) {
    $sheet = $spreadsheet->getActiveSheet()->mergeCells('B4:J4');
    $sheet->setCellValue('B4', 'NO DATA FOUND');
    $sheet->getStyle('B4:J' . $num . '')->applyFromArray($styleArray);
} else {

    $num--;
    $sheet->getStyle('B4:J' . $num . '')->applyFromArray($styleArray);
}


// Ending
$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="report-' . $datereport . '.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
die;
