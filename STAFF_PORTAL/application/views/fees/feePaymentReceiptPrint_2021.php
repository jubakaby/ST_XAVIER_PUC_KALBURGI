
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
    border: 1px solid black;
   
    padding: 3px;
}

.table_bordered th .border_right_none,.table_bordered td .border_right_none{
    border-right: 1px solid transparent !important;
}

</style>
  
<?php 
  
    $copy_name = ['STUDENT COPY','COLLEGE COPY','BANK COPY'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="border_full" style="padding:3px">
        
            <table class="table text_highlight">
                <tr>
                    <td width="500" style="text-align:center;">
                        <b style="font-size:24px;margin-bottom: 2px;"><b><?php echo $college_name; ?></b></b><br />
                        <b style="font-size: 16px;margin-bottom: 2px;">Residency Road, HASSAN-560 025</b><br/>
                        <b style="font-size: 20px;margin-bottom: -10px;"><?php echo $term_name; ?> Payment of Fees <?php echo $year_display; ?></b>
                    </td>
                </tr>
            </table>
            <hr class="border_bottom">
            <table class="table" style="font-size: 12px;">
                <tr>
                    <td width="210">Receipt No : <?php echo $feePaidInfo->receipt_number; ?></td>
                    <td >Date : <?php echo date('d-m-Y',strtotime($feePaidInfo->payment_date)); ?></td>
                </tr>
                <tr>
                    <td colspan="2">Name : <b><?php echo $studentInfo->student_name; ?></b></td>
                </tr>
                <?php if($term_name == 'I PUC'){ ?>
                    <tr>
                    <td width="210">Application No: <?php echo $studentInfo->application_number; ?></td>
                    <td>Term : <?php echo $term_name; ?></td>
                </tr>
               
               <?php }else{ ?>
                    <tr>
                    <td width="210">Student ID: <?php echo $studentInfo->student_id; ?></td>
                    <td>Term : <?php echo $term_name; ?></td>
                </tr>
               
             <?php   } ?>
                
                <tr>
                    <td>Stream : <?php echo strtoupper($studentInfo->stream_name); ?></td>
                    <td colspan="2">Section : <?php echo $studentInfo->section_name; ?></td>
                </tr>
               
            </table>
            <table class="table table_bordered" style="font-size: 12px;">
                <tr>
                    <th>SL. No.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
                    <?php 
                    $total_amount = 0;
                    $i = 1;
                    if(!empty($feePaidStructure)){
                        foreach($feePaidStructure as $fee){
                             $total_amount += $fee->paid_amount;?>
                        <tr>
                            <th style="text-align:center;"><?php echo $i; ?></th>
                            <th><?php echo $fee->fees_type; ?></th>
                            <th class="" style="text-align: right;"><?php echo sprintf('%0.2f',$fee->paid_amount); ?></th>
                         </tr>
               
                   <?php  $i++; } } ?>
                   
                   <tr>
                    <th colspan="2">Total Paid</th>
                    <th class="" style="text-align: right;"><?php echo sprintf('%0.2f',$total_amount); ?></th>
                </tr>
               
            </table>
            <br/><br/><br/>
            <table class="table " style="font-size: 12px;">
                <tr>
                    <td width="210"><b>Signature of Student</b></td>
                    <td style="text-align:right;"><b>Director</b></td>
                </tr>
               
            </table>

                          
                            <div class="border_full" style="padding:1px;">
                                <p style="margin-bottom: 0px;margin-top: 0px;font-size: 13px;">DD/Transaction Number:
                                    <?php echo $ddInfo->dd_number; ?></p>
                                <p style="margin-bottom: 0px;font-size: 12px;">Bank Name: <?php echo $ddInfo->bank_name; ?></p>
                            </div>
                            <br>
                            <div style="font-size: 13px;" class="border_full" style="padding:2px;">
                                <div class="col-lg-6" style="padding: 0px;">
                                    BANK USE ONLY
                                </div>
                                <div class="col-lg-6" style="padding: 0px;">
                                    <span style="float:right">A/C NO.:0108053000010105</span>
                                </div>
                                <p style="margin-top: 25px;">The South Indian Bank Ltd., Brigade Road Branch.
                                    Bengaluru-25</p>

                            </div>

                            <ol style="font-size: 13px;" class="description" >
                                <li>The Students will be enrolled only after the payment of the Fees.</li>
                                <li>fees once paid will not be refunded.</li>
                                <li>SC/ST/CAT 1 candidates will have to produce the photo copy of caste certificate.
                                </li>
                                <li>Fees to be paid on specified date. No extention is allowed.</li>
                                <li>Fees to be paid by Online/DD/Card Only.</li>
                            </ol>
                            <p class="copy_text"><?php echo $copy_name[$name_count]; ?></p>
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



// function getIndianCurrency(float $number) {
//     $decimal = round($number - ($no = floor($number)), 2) * 100;
//     $hundred = null;
//     $digits_length = strlen($no);
//     $i = 0;
//     $str = array();
//     $words = array(0 => '', 1 => 'one', 2 => 'two',
//         3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
//         7 => 'seven', 8 => 'eight', 9 => 'nine',
//         10 => 'ten', 11 => 'eleven', 12 => 'twelve',
//         13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
//         16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
//         19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
//         40 => 'forty', 50 => 'fifty', 60 => 'sixty',
//         70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
//     $digits = array('', 'hundred','thousand','lakh', 'crore');
//     while( $i < $digits_length ) {
//         $divider = ($i == 2) ? 10 : 100;
//         $number = floor($no % $divider);
//         $no = floor($no / $divider);
//         $i += $divider == 10 ? 1 : 2;
//         if ($number) {
//             $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
//             $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
//             $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
//         } else $str[] = null;
//     }
//     $Rupees = implode('', array_reverse($str));
//     $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
//     return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
// }

?>