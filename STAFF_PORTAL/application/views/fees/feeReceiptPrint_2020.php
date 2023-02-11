<style>
    
.border_full{
    border-style: solid;
    padding: 7px;
    border-color: black;
    border-width: 1px;
  }
  .boredr_top{
    border-top: solid;
    padding: 7px;
    border-color: black;
    border-width: 1px;
    }
  .boredr_left{
  border-left: solid;
  padding: 7px;
  border-color: black;
  border-width: 1px;
  }
  .boredr_right{
  border-right: solid;
  padding: 7px;
  border-color: black;
  border-width: 1px;
  }
  .boredr_left_right{
  border-right: solid;
  border-left: solid;
  padding: 7px;
  border-color: black;
  border-width: 1px;
  }
  .boredr_only_bottom{
  border-bottom: solid;
  padding: 7px;
  border-color: black;
  border-width: 1px;
  }
  .text_style_2{
    margin-left: -12px;
    font-weight: bold;
    float: left;
    margin-top: -8px;
  }
.copy_text {
    font-size: 17px;
    font-weight: 600;
    margin-bottom: -5px;
}

td {
    font-weight: inherit;
}

.description {
    font-size: 15px;
    margin-bottom: 0px;
    margin-top: -0px;
    padding: 19px;
}

.panel-primary {
    border-color: #337ab700;
}

.college_title {
    font-size: 24px;
    font-weight: 600;
    margin-top: 0px;
}

@media print {

    .table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        padding: 3px !important;
        line-height: 1.5 !important;
        vertical-align: top !important;
        border-width: thin;
        border: 0.002em solid grey !important;

    }

    .pagebreak {
        page-break-before: always;
    }

    .main-footer {
        display: none;
    }

    .wizard-inner,
    .card-header,
    .card-footer {
        display: none;
    }

    .noprint {
        display: none;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    @page {
        size: A4 landscape;
        margin: 2in;
        margin: 1;
    }

    .page_break {
        page-break-before: always;
    }

    .enable-print {
        display: block !important;
    }
}

.address_title {
    font-size: 16px;
    margin-top: -10px;
    font-weight: 600;
}
</style>
<?php  $copy_name = ['STUDENT COPY','COLLEGE COPY','BANK COPY'];
$title = ["BANGALOre JESUIT EDUCATIONAL SOCIETY","ST JOSEPH'S PRE-UNIVERSITY COLLEGE"];
$re_address = ['address'];
?>

    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-heading noprint" style="font-size: 18px;">Fee Slip
                <button class="btn btn-success" onclick="window.print();" style="float:right">Print</button>
            </div>
           
                <div class="row enable-print">
                    
                    <div class="col-lg-4 col-md-12" style="margin-top:5px;">
                        <div class="border_full">
                            <h2 class="text-center college_title"><?php echo $title[0]; ?></h2>
                            <p class="text-center address_title"><?php echo $re_address[0]; ?></p>
                            <p style="margin-top: -19px;" class="text-center address_title boredr_only_bottom">II PUC
                                Payment of Fees 2020-21</p>
                            <div class="row " style="font-size: 14px;">
                                <div class="col-lg-6">
                                    <p>Receipt No: <b><?php echo $feeInfo->receipt_number; ?></b></p>
                                </div>
                                <div class="col-lg-6">
                                    <p>Date: <b><?php echo date('d-m-Y',strtotime($feeInfo->payment_date)); ?></b></p>
                                </div>
                            </div>

                            <div class="row " style="font-size: 15px;">
                                <div class="col-lg-8">
                                    <p>Name: <b><?php echo $studentInfo->student_name; ?></b></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Section: <b><?php echo $studentInfo->section_name; ?></b></p>
                                </div>
                            </div>
                            <div class="row " style="font-size: 15px;">
                                <div class="col-lg-8">
                                    <p>Student ID: <b><?php echo $studentInfo->student_id; ?></b></p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Combination: <b><?php echo $studentInfo->stream_name; ?></b></p>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center" width="40">SL.No.</th>
                                        <th style="text-align:center">Particulars</th>
                                        <th style="text-align:center" width="100">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                $sl = 1;
                                $total_fee_paid = 0;
                                foreach($feePaidInfo as $fee){ 
                                    if($fee->school_account_type == 'Management Fees'){ ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $sl++; ?></td>
                                        <td><?php echo strtoupper($fee->fees_type); ?></td>
                                        <td style="text-align:right">
                                            <?php $total_fee_paid +=  $fee->paid_amount; echo $fee->paid_amount; ?></td>
                                    </tr>
                                    <?php
                                    }
                                     } ?>


                                    <tr>
                                        <th style="font-size: 13px;" colspan="2" style="text-align:left">TOTAL
                                            MANAGEMENT FEE PAID</th>
                                        <th style="text-align:right"><b><?php echo $total_fee_paid; ?></b></th>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <div class="row ">
                                <div class="col-lg-6">
                                    <b>Signature of Student</b>
                                </div>
                                <div class="col-lg-6">
                                    <b style="float:right; margin-right: 30px;">Director</b>
                                </div>
                            </div>
                            <div class="border_full">
                                <p style="margin-bottom: 0px;font-size: 13px;">DD/Transaction Number:
                                    <?php echo $dd_number; ?></p>
                                <p style="margin-bottom: 0px;font-size: 13px;">Bank Name: <?php echo $bank_name; ?></p>
                            </div>
                            <br>
                            <div style="font-size: 13px;" class="border_full">
                                <div class="col-lg-6" style="padding: 0px;">
                                    <b>BANK USE ONLY</b>
                                </div>
                                <div class="col-lg-6" style="padding: 0px;">
                                    <b style="float:right">A/C NO.:0108053000010105</b>
                                </div>
                                <p style="margin-top: 25px;">The South Indian Bank Ltd., Brigade Road Branch.
                                    Bengaluru-25</p>

                            </div>

                            <ol style="font-size: 13px;" class="description">
                                <li>The Students will be enrolled only after the payment of the Fees.</li>
                                <li>fees once paid will not be refunded.</li>
                                <li>SC/ST/CAT 1 candidates will have to produce the photo copy of caste certificate.
                                </li>
                                <li>Fees to be paid on specified date. No extention is allowed.</li>
                                <li>Fees to be paid by Online/DD/Card Only.</li>
                            </ol>
                            <p class="copy_text"><?php echo $copy_name[0]; ?></p>
                        </div>
                    </div>
                  
                    <!-- <div class="pagebreak"> </div> -->

                   
                </div>


        </div>
    </div>
