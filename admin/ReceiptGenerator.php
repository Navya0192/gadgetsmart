<?php
$html = '<!doctype html>';
$html.= '<html lang="en">';
$html.= '<head>';

    $html.= '<meta charset="utf-8">';
    $html.= '<meta name="viewport" content="width=device-width, initial-scale=1">';
$html.= '    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">';
$html.= '</head>';
$invoice_id = $_GET['id'];
include('db.php');
    $query1 = "SELECT * from payment where payment_id = '" . $invoice_id . "'";
    $result1 = mysqli_query($con, $query1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $descrip = $row['towards'];
        $candidateID = $row['custID'];
        $amount = $row['amount'];
        $newAmount = ($amount-($amount * 0.18));
        $gdate = $row['gDate'];
        $rnum = $row['referenceNumber'];
    }
include('db.php');
    $query2 = "SELECT * from customer_master where CUID = '" . $candidateID . "'";
    $result2 = mysqli_query($con, $query2);
    while ($row = mysqli_fetch_assoc($result2)) {
        $Fname = $row['Name']; 
        // $Lname = $row['Lname'];
        $address = $row['Address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['pincode'];
    }
    function getIndianCurrency(float $number)
                                    {
                                        $decimal = round($number - ($no = floor($number)), 2) * 100;
                                        $hundred = null;
                                        $digits_length = strlen($no);
                                        $i = 0;
                                        $str = array();
                                        $words = array(0 => '', 1 => 'one', 2 => 'two',
                                            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
                                            7 => 'seven', 8 => 'eight', 9 => 'nine',
                                            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
                                            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
                                            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
                                            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
                                            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
                                            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
                                        $digits = array('', 'hundred','thousand','lakh', 'crore');
                                        while( $i < $digits_length ) {
                                            $divider = ($i == 2) ? 10 : 100;
                                            $number = floor($no % $divider);
                                            $no = floor($no / $divider);
                                            $i += $divider == 10 ? 1 : 2;
                                            if ($number) {
                                                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
                                            } else $str[] = null;
                                        }
                                        $Rupees = implode('', array_reverse($str));
                                        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                                        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
                                    }

$html.= '<body>';
$html.= '                                    <h1 class="card-title" style="float: right;font-family: Arial, Helvetica, sans-serif;"><b>Receipt</b></h1>';
$html.= '                    <div class="row row-cols-1 row-cols-md-2 g-4">';
$html.= '                        <div class="col">';
$html.= '                            <div class="card h-100" style="border: none;">';
$html.= '                                <div class="card-body">';
$html.= '                                    <h3 class="card-title">Gadget Smart</h3>';
$html.= '                                    <p class="card-text"><b> Hotel Vasanth Mahal Building(Opposite to City Center Mall),<br>Ks Rao Road, Mangalore,<br>Karnataka - 575001';
$html.= '                                        <br><b>Phone : +91 8105572368<br>Email : abc@abc.com<br><br>';
$html.= '                                            GST NO : 10AABCU9603R1Z2';
$html.= '                                    </p>';
$html.= '                                </div>';
$html.= '                            </div>';
$html.= '                        </div>';
$html.= '                        <div class="col">';
$html.= '                            <div class="card h-100" style="border: none;">';
$html.= '                                <div class="card-body">';
$html.= '                                    <p class="card-text" style="float: right;">';
$html.= '                                    <table>';
$html.= '                                        <tr>';
$html.= '                                            <td>Date</td>';
$html.= '                                            <td>&nbsp;:&nbsp;</td>';
$html.= '                                            <td>'.$gdate.'</td>';
$html.= '                                        </tr>';
$html.= '                                        <tr>';
$html.= '                                            <td>Customer ID</td>';
$html.= '                                            <td>&nbsp;:&nbsp;</td>';
$html.= '                                            <td>'.$candidateID.'</td>';
$html.= '                                        </tr>';
$html.= '                                        <tr>';
$html.= '                                            <td>Payment ID</td>';
$html.= '                                            <td>&nbsp;:&nbsp;</td>';
$html.= '                                            <td>'.$invoice_id.'</td>';
$html.= '                                        </tr>';
$html.= '                                        <tr>';
$html.= '                                            <td>Reference Number</td>';
$html.= '                                            <td>&nbsp;:&nbsp;</td>';
$html.= '                                            <td>'.$rnum.'</td>';
$html.= '                                        </tr>';
$html.= '                                    </table>';
$html.= '                                    </p>';
$html.= '                                    <br><br>';
$html.= '                                    <h2>Bill To</h2>';
$html.= '                                    <p>'.$Fname.',<br>';
$html.= '                                        '.$address.', '.$city.'<br>';
$html.= '                                        '.$state.' - '.$zip.'';
$html.= '                                    </p>';
$html.= '                                </div>';
$html.= '                            </div>';
$html.= '                        </div>';
$html.= '                    </div>';
$html.= '                    <hr style="height: 3px;">';
$html.= '                    <div class="row row-cols-1 row-cols-md-1 g-4">';
$html.= '                        <div class="col">';
$html.= '                            <div class="card" style="border: none;">';
$html.= '                                <div class="card-body">';
$html.= '                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
$html.= '                                        <thead>';
$html.= '                                            <tr style="border: 1px solid black">';
$html.= '                                                <th style="text-align: left;border :1px solid black;font-size: large;">Discription</th>';
$html.= '                                                <th style="text-align: center;border :1px solid black;font-size: large;">Amount</th>';
$html.= '                                                <th style="text-align: center;border :1px solid black;font-size: large;">Qty</th>';
$html.= '                                                <th style="text-align: center;border :1px solid black;font-size: large;">Total Amount</th>';
$html.= '                                            </tr>';
$html.= '                                        </thead>';
$html.= '                                        <tbody>
<tr><td colspan=4><hr style="height: 3px;"></td></tr>';
$html.= '                                            <tr style="border-left :1px solid black;border-right :1px solid black;border-bottom :0px solid transparent">';
$html.= '                                                <td style="border: none;">'.$descrip.'</td>';
$html.= '                                                <td style="border: none;text-align: center;">₹'.$newAmount.'</td>';
$html.= '                                                <td style="border: none;text-align: center;">1</td>';
$html.= '                                                <td style="border: none;text-align: right;">₹'.$newAmount.'</td>';
$html.= '                                            </tr>';
$html.= '                                            <tr style="border-bottom :1px solid black;border-top :0px solid transparent;border-left :1px solid black;border-right :1px solid black" >';
$html.= '                                                <td style="border: none;">&nbsp;</td>';
$html.= '                                                <td style="border: none;">&nbsp;</td>';
$html.= '                                                <td style="border: none;">&nbsp;</td>';
$html.= '                                                <td style="border: none;">&nbsp;</td>';
$html.= '                                            </tr>';
$html.= '                                            <tr style=" border-bottom:5px" >';
$html.= '                                                <td style="border: none;" colspan="2">&nbsp;</td>';
$html.= '                                                <td style="text-align: right;border:1px solid black;font-size: large;" ><b>Subtotal&nbsp;:</b></td>';
$html.= '                                                <td style="text-align: right;border:1px solid black" >₹'.$newAmount.'</td>';
$html.= '                                                ';
$html.= '                                            </tr>';
$html.= '                                            <tr style="border: none;">';
$html.= '                                                <td style="border: none;" colspan="2">&nbsp;</td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black;font-size: large;" ><b>CGST(9%)&nbsp;:&nbsp;</b></td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black" >₹'.($amount * 0.09).'</td>';
$html.= '                                                ';
$html.= '                                            </tr>';
$html.= '                                            <tr style="border: none;">';
$html.= '                                                <td style="border: none;" colspan="2">&nbsp;</td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black;font-size: large;" ><b>SGST(9%)&nbsp;:&nbsp;</b></td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black" >₹'.($amount * 0.09).'</td>';
$html.= '                                                ';
$html.= '                                            </tr>';
$html.= '                                            <tr style="border: none;">';
$html.= '                                                <td style="border: none;" colspan="2">&nbsp;</td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black;font-size: large;" ><b>Total&nbsp;:&nbsp;</b></td>';
$html.= '                                                <td style="text-align: right;border: 1px solid black" >₹'.$amount.'</td>';
$html.= '                                                ';
$html.= '                                            </tr>';
$html.= '                                        </tbody>';
$html.= '                                    </table>';
$html.= '                                    <br>';
$html.= '                                    <b>Total in words :</b><br>';
$html.=''.getIndianCurrency($amount).'';
$html.= '                                    <br><br><br><br>';
$html.='<b class="mx-auto">This is computer generated receipt no signature required</b>';
$html.='                                </div>';
$html.='                            </div>';
$html.='                        </div>';
$html.='                    </div>';
$html.='    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>';
$html.='</body>';
$html.='</html>';

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->output('Receipt - '.$invoice_id.' ','D');


