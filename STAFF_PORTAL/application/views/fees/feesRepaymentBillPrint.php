
<style>
table{
    width: 100% !important;
}

/*.border{
    border: 2px solid black;
}*/
.border_full{
    border: 1px solid black;
    /* height: 90% !important; */
}
.border_bottom{
    border-bottom: 1px solid black;
}
.hr_line{
    margin: 0px;
    color: black;
}

.table_bordered{
    border-collapse: collapse;
}
.table_bordered th,.table_bordered td{
    border-top: 1px solid black;
    border-right: 1px solid black;
    padding: 3px;
}

.table_bordered th .border_right_none,.table_bordered td .border_right_none{
    border-right: 1px solid transparent !important;
}



</style>
  
<?php 
    $totalStudentCount--;
    
    $application_no = substr($feeInfo->application_no, 0, 2);
    if($application_no == '21'){
        $term = 'I PUC';
        $register_no = '';
    }else{
        $term = 'II PUC';
        $register_no = $studentData->student_id;
    }

    if(!empty($feeConcession)){
        $concessionAmt = $feeConcession->fee_amt;
    }else{
        $concessionAmt = 0;
    }
?>

<div class="container-fluid border_full">
    <div class="row">
        <div class="">
            <table class="table" style="text-align:center;">
                <tr>
                    <td><img height="100" class="mt-2" width="50" height="50" src="assets/dist/img/agnes.png" alt="logo"></td>
                </tr>
            </table>
            <table class="table text_highlight">
                <tr>
                    <td width="500" style="text-align:center;">
                        <b style="font-size:15px;margin-bottom: 2px;">THE APOSTOLIC CARMEL EDUCATIONAL SOCIETY</b><br />
                        <b style="font-size: 14px;margin-bottom: 2px;">ST AGNES PRE UNIVERSITY COLLEGE</b><br/>
                        <b style="font-size: 12px;margin-bottom: 2px;">BENDORE, MANGALURU - 575 002</b><br/>
                    </td>
                </tr>
            </table>
            <hr class="border_bottom">
            <table class="table" style="font-size: 12px;">
                <tr>
                    <td width="210">Receipt No. : <?php echo $feeInfo->receipt_number; ?></td>
                    <td style="text-align:right;">Date : <?php echo date('d-m-Y'); ?></td>
                </tr>
                <tr>
                    <td colspan="2">Name : <b><?php echo $studentData->student_name; ?></b></td>
                </tr>
                <tr>
                    <td colspan="2">Class : <?php echo $term; ?></td>
                </tr>
                <tr>
                    <td>REGISTER NO. : <?php echo $studentData->student_id; ?></td>
                    <td>COMBINATION : <?php echo strtoupper($studentData->stream_name.'/'.$studentData->elective_sub); ?></td>
                </tr>
            </table>
            <table class="table table_bordered" style="font-size: 12px;">
                <tr>
                    <th>Sl.No.</th>
                    <th>Particulars of Fees</th>
                    <th>Rs.</th>
                </tr>
                <?php if(!empty($feePaidInfo)) {
                    $i=1;
                    foreach($feePaidInfo as $fee){ 
                    $total_fee_amt += $fee->paid_amount; ?>
                    <tr>
                        <th style="text-align:center;"><?php echo $i; ?></th>
                        <th style="text-align: left;"><?php echo $fee->fee_name; ?></th>
                        <th style="text-align: right;"><?php echo $fee->paid_amount; ?></th>
                    </tr>
                <?php $i++; } } ?> 

                <tr>
                    <th colspan="2">Total</th>
                    <th class="border_right_none" style="text-align: right;"><?php echo $feeInfo->total_amount; ?></th>
                </tr>
                <tr>
                    <th colspan="2">Concession</th>
                    <th style="text-align: right;"><?php echo $concessionAmt; ?></th>
                </tr>
                <tr>
                    <th colspan="2">Paid Amount</th>
                    <th style="text-align: right;"><?php echo $total_fee_amt; ?></th>
                </tr>
                <tr>
                    <th colspan="2">Balance Amount</th>
                    <th style="text-align: right;"><?php echo $feeInfo->pending_balance; ?></th>
                </tr>
                <tr>
                    <td colspan="2"><br><br><br>Paid Total amount in words: <span style="text-transform: capitalize;"><?php echo strtoupper(getIndianCurrency($total_fee_amt)).' ONLY'; ?></span></td>
                    <td style="text-align: center;"><br><br><br><b>Signature</b></td>
                </tr>
            </table>

        </div>
    </div>
  
</div>

<?php 
//  if($totalStudentCount != 0){
//     echo '<div class="break"></div>';
// }else{
//     echo '<div class="break_after"></div>';
// }

// } 



function getIndianCurrency(float $number) {
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

?>