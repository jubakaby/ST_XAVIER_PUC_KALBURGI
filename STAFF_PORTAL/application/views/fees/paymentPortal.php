
<!-- Add this to <head> -->

<!-- Load required Bootstrap and BootstrapVue CSS -->
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

<!-- Load polyfills to support older browsers -->
<script src="//polyfill.io/v3/polyfill.min.js?features=es2015%2CIntersectionObserver" crossorigin="anonymous"></script>

<!-- Load Vue followed by BootstrapVue -->
<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

<!-- Load the following for BootstrapVueIcons support -->
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue-icons.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.table_search_th {
    padding: .1rem !important;
    vertical-align: top !important;
    border-top: 1px solid #c2c6c7 !important;
}

.select2-container .select2-selection--single {
    height: 38px !important;
    width: 360px !important;
}

.loaderScreen {
    display: block;
    visibility: visible;
    position: absolute;
    z-index: 999;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-color: #0a0a0a94;
    vertical-align: bottom;
    padding-top: 20%;
    filter: alpha(opacity=75);
    opacity: 0.75;
    font-size: large;
    color: blue;
    font-style: italic;
    font-weight: 400;

    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}

.form-control {
    border: 1px solid #000000 !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 3px !important;
    color: black !important;

}

@media screen and (max-width: 480px) {
    .select2-container--default .select2-selection--single .select2-selection__arrow {

        margin-right: 20px !important;
    }

    .select2-container .select2-selection--single {
        width: 270px !important;
    }
}

</style>
<?php
$this->load->helper('form');


$error = $this->session->flashdata('error');
if ($error) { 
    ?>
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-check mx-2"></i>
    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
</div>
<?php } ?>
<?php
        $success = $this->session->flashdata('success');
        if ($success) { 
        ?>
<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-check mx-2"></i>
    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
</div>
<?php }?>
<div class="row column_padding_card">
    <div class="col-md-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>
<div class="main-content-container px-3 pt-1 overall_content">
    <div class="content-wrapper">
        <div class="row p-0 column_padding_card">
            <div class="col column_padding_card">
                <div class="card card-small card_heading_title p-0 m-b-1">
                    <div class="card-body p-0" style="padding-bottom: 0px !important;">
                        <div class="row c-m-b">
                            <div class="col-lg-12 col-12 col-md-12 box-tools">
                                <span class="page-title">
                                    <i class="fa fa-file"></i> <span style="font-size: 23px;font-weight: 600;">
                                        Payment Portal - 2020
                                    </span>
                                    <!-- <small>By Student</small> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0 column_padding_card">
        
            <div class="col column_padding_card">
                <div class="card card-small mb-4">
                    <div class="card-body p-1 pb-2 ">
                    <form action="<?php echo base_url() ?>getStudentFeePaymentInfo" method="POST">
                            <div class="row">
                          
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div style="width:120px" class="input-group-prepend">
                                            <select  id="lunch" class="selectpicker form-control" name="term_name"  title="Term" required>
                                            <?php if(!empty($term_name)){?>
                                                <option value="<?php echo $term_name; ?>" selected><?php echo $term_name; ?></option>
                                           <?php }   ?>  
                                                <option value="I PUC">I PUC</option>
                                                <option value="II PUC">II PUC</option>
                                            </select> 
                                        </div>
            
                                        <select class="form-control selectpicker" data-live-search="true" name="student_id" required>
                                        <?php if(!empty($student_id)){?>
                                                <option value="<?php echo $student_id; ?>" selected><?php echo $student_id; ?></option>
                                           <?php }   ?> 
                                        <option value="">Select Student</option>
                                        <?php if(!empty($allStudentInfo)){
                                        foreach($allStudentInfo as $std){  ?>
                                        <option value="<?php echo $std->student_id; ?>">
                                            <b><?php echo $std->student_id.' - '.$std->student_name; ?></b></option>
                                        <?php } } ?>
                                    </select>
                                        <div  class="input-group-append">
                                            <button type="submit" style="width:170px" class="btn btn-success" type="button">Search</button>
                                            
                                        </div>
                                    </div>
                            
                                    </div>
                           
                        </div>
                        </form>
                    </div>
                        

                        <div class="row">
                            <div class="col-lg-12">
                                <?php 
                                    if(!empty($total_fee)){
                                        $total_fee_to_pay = $total_fee;
                                    }else{
                                        $total_fee_to_pay = $feeInfo->total_fee;
                                    }
                                    
                                    if(!empty($studentInfo)){ ?>
                                        
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card border-success mb-3">
                                            <div class="card-header bg-transparent border-success">Student Info</div>
                                            <div style=" padding: 0rem 0rem;" class="card-body ">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr class="table-success">
                                                            <th class="text-left" scope="col" width="280">Name</th>
                                                            <th class="text-left" scope="col">
                                                                <?php echo  $studentInfo->student_name; ?></th>
                                                        </tr>
                                                      
                                                        <tr class="table-success">
                                                            <th class="text-left" scope="col">Student ID / Application No</th>
                                                            <th class="text-left" scope="col">
                                                                <?php echo $studentInfo->student_id .'/'.$studentInfo->application_no; ?></th>
                                                        </tr>
                                                        <tr class="table-primary">
                                                            <th class="text-left" scope="col">Admission</th>
                                                            <th class="text-left" scope="col"><?php echo $term_name; ?></th>
                                                        </tr>
                                                        <tr class="table-success">
                                                            <th class="text-left" scope="col">Stream & Section</th>
                                                            <th class="text-left" scope="col">
                                                                <?php echo $studentInfo->stream_name .' '.$studentInfo->section_name; ?>
                                                            </th>
                                                        </tr>

                                                      
                                                            <tr class="table-primary">
                                                                <th class="text-left" scope="col">Category</th>
                                                                <th class="text-left" scope="col"> 
                                                                    <?php echo $studentInfo->category; ?>
                                                                </th>
                                                            </tr> 
                                                       
                                                        <?php if(!empty($board_name)){ ?>
                                                            <tr class="bg-info text-white">
                                                                <th class="text-left" scope="col">Board</th>
                                                                <th class="text-left" scope="col"> 
                                                                    <?php echo $board_name; ?>
                                                                </th>
                                                            </tr> 
                                                        <?php } ?> 
                                                        <tr class="bg-primary text-white">
                                                            <th class="text-left" scope="col">Elective Sub</th>
                                                            <th class="text-left" scope="col">
                                                                <?php echo $studentInfo->elective_sub; ?>
                                                            </th>
                                                        </tr>
                                                        
                                                            <tr class="bg-primary text-white">
                                                                <th class="text-left" scope="col">Total Amount</th>
                                                                <th class="text-left" scope="col"> 
                                                                    <?php echo $total_fee_to_pay; ?>
                                                                </th>
                                                            </tr> 
                                                       
                                                            <!-- <tr class="bg-secondary text-white">
                                                                <th class="text-left" scope="col">Instalment</th>
                                                                <th class="text-left" scope="col">
                                                                    <?php echo ""; ?>
                                                                </th>
                                                            </tr>
                                                            <tr class="bg-warning text-white">
                                                                <th class="text-left" scope="col">Concession (-)</th>
                                                                <th class="text-left" scope="col">
                                                                    <?php echo ""; ?>
                                                                </th>
                                                            </tr> -->
                                                        <?php if($balance > 0){ ?>
                                                            <tr class="bg-success text-white">
                                                                <th class="text-left" scope="col">Paid Amount</th>
                                                                <th class="text-left" scope="col">
                                                                    <?php echo $total_fee_to_pay - $balance; ?>
                                                                </th>
                                                            </tr>
                                                        <?php } ?>

                                                        <tr class="bg-danger text-white">
                                                            <th class="text-left" scope="col">Total Pending Fee Amt</th>
                                                            <th class="text-left" scope="col">
                                                                <?php echo $balance; ?>
                                                            </th>
                                                        </tr>

                                                    </thead>

                                                </table>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="card border-success mb-3">
                                            <div class="card-header bg-transparent border-success">Payment Info</div>
                                            <div class="card-body">
                                                <?php if(!empty($feePaidInfo)){ ?>
                                                    <table class="table table-hover">
                                                    <thead>
                                                    <tr class="table-success">
                                                            <th class="text-left" scope="col" width="80">Date</th>
                                                            <th class="text-left" scope="col" width="80">Receipt No</th>
                                                            <th class="text-left" scope="col" width="120">Order ID</th>
                                                            <th class="text-left" scope="col" width="80">Amount</th>
                                                            <th class="text-left" scope="col" ></th>
                                                    </tr>
                                                      
                                                  <?php foreach($feePaidInfo as $fee){ ?>
                                                    <tr class="table-info">
                                                            <th class="text-left" scope="col" width="140"> <?php echo date('d-m-Y',strtotime($fee->payment_date)); ?></th>
                                                            <th class="text-left" scope="col" width="80"><?php echo $fee->receipt_number; ?></th>
                                                            <th class="text-left" scope="col" width="120"><?php echo $fee->order_id; ?></th>
                                                            <th class="text-left" scope="col" width="80"><?php echo $fee->paid_amount; ?></th>
                                                            <th class="text-left" scope="col">
                                                            <?php if($fee_year != '2021' && $fee_year != '2019'){ ?>
                                                                <a href="<?php echo base_url(); ?>feePaymentReceiptPrint_old/<?php echo $fee->receipt_number; ?>"
                                            target="_blank">Receipt</a>
                                                       <?php } elseif($fee_year == '2019') { ?>
                                                <a href="<?php echo base_url(); ?>feePaymentReceiptPrint_old2019/<?php echo $fee->receipt_number; ?>"
                                                target="_blank">Receipt</a>
                                                 <?php      } else { ?>
                                                <a href="<?php echo base_url(); ?>feePaymentReceiptPrintOld/<?php echo $fee->receipt_number; ?>"
                                                target="_blank">Receipt</a>
                                                 <?php      }  ?>  
                                                            </th>
                                                        </tr>
                                                <?php } ?>
                                                </thred>
                                                </table>
                                                <?php } ?>
                                                <?php if($balance > 0){ ?>
                                                
                                                        <div class="form-group">
                                                            <label for="usr">Transaction Date</label>
                                                            <input type="text" name="transaction_date"
                                                                value="<?php echo date('d-m-Y'); ?>" class="form-control"
                                                                Placeholder="Transaction Date" id="transaction_date"
                                                                autocomplete="off">
                                                            </div>
                                                            <div class="form-group mb-2">
                                                            <input type="text" class="form-control " id="paid_amount"
                                                                name="paid_amount" placeholder="Paid Amount"
                                                                onkeypress="return isNumberKey(event)" required
                                                                autocomplete="off">
                                                            </div>
                                                            <div class="form-group mb-2">
                                                            <select class="form-control text-dark" id="payment_type"
                                                                name="payment_type">
                                                                <option value="">Select Payment Type</option>
                                                                <option value="CASH">CASH</option>
                                                                <option value="DD">DD</option>
                                                                <option value="CARD">CARD</option>
                                                            </select>
                                                            </div>
                                                           

                                                            <button id="paymentInfoSubmit" style="margin-top: 24px; float:right"
                                                            type="submit" class="btn btn-success btn-block">Submit</button>
                                                
                                            <?php } ?>

                                            </div>
                                          
                                        </div>
                                    </div>


                                </div>
                                <?php }else{
                                            echo "<h5 class='text-center'>Select Student for payment</h5>";
                                        }
                       
                                    ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



<!-- donload report filter modal -->
<div class="modal" id="myReportModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirm Fee Payment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body p-2">

                <form role="form" id="addFeePaymentInfo" action="<?php echo base_url() ?>addFeePaymentInfo"
                    method="post" role="form">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th scope="row">Fee Amount</th>
                                        <td> <?php echo $balance; ?></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Paid Amount</th>
                                        <td id="paid_amount_display"></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">Pending Fee</th>
                                        <td id="pending_fee_display"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Excess Fee / Card Charges</th>
                                        <td id="excess_fee_display"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Payment Type</th>
                                        <td id="payment_type_display"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="card_info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">Transaction Number:</label>
                                            <input onkeypress="return isNumberKey(event)" type="text" name="tran_number" required
                                                class="form-control" Placeholder="Transaction Number" id="tran_number"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">Transaction Date:</label>
                                            <input type="text" name="tran_date" class="form-control card_date" required
                                                Placeholder="Transaction Date" id="tran_date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">Bank Name:</label>
                                            <input type="text" name="tran_bank_name" Value="South Indian Bank" required
                                                class="form-control" Placeholder="Enter Bank Name" id="tran_bank_name"
                                                autocomplete="off">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="dd_info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">DD Number:</label>
                                            <input onkeypress="return isNumberKey(event)" type="text" name="dd_number" required
                                                class="form-control" Placeholder="Enter DD Number" id="dd_number"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">DD Date:</label>
                                            <input type="text" name="dd_date" class="form-control" required
                                                Placeholder="Enter DD Date" id="dd_date" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group text-dark">
                                            <label for="usr">Bank Name:</label>
                                            <input type="text" name="bank_name" class="form-control" required
                                                Placeholder="Enter Bank Name" id="dd_bank_name" autocomplete="off">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>


                    <input type="hidden" id="transaction_date_text" name="transaction_date" value="" required />
                    <input type="hidden" name="application_no" value="<?php echo $studentInfo->application_no ; ?>" required />
                    <input type="hidden" name="term_name" value="<?php echo $term_name ; ?>" required />
                    <input type="hidden" name="student_id" value="<?php echo $studentInfo->student_id; ?>" required />
                    <input type="hidden" id="paid_fee_amount" name="paid_fee_amount" value="" required />
                    <input type="hidden" id="payment_type_input" name="payment_type" value="" required />
                    <input type="hidden" id="excess_amount_input" name="excess_amount" value="" required />
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="submit" form="addFeePaymentInfo"
                    class="btn btn-success float-right proceedFeePaymentInfoButton" value="Proceed" />
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">

jQuery(document).ready(function() {

  

    jQuery('#transaction_date, .dateSearch, #tran_date, #dd_date').datepicker({
        autoclose: true,
        orientation: "bottom",
        format: "dd-mm-yyyy"

    });
    $('.dd_info').hide();
    $('.card_info').hide();
 //   $('.loaderScreen').hide();

    $("#searchStudentFeeInfo").click(function() {
        $('.loaderScreen').show();
    });

    //slect payment method option change
    $("#paymentInfoSubmit").on('click', function() {
        var payment_type = $('#payment_type').val(); 
        var fee_amount = <?php echo $balance; ?> ;
        var excess_amount = 0;
        var card_charges = 0;
        var paid_amount_display = $('#paid_amount').val();
        if (paid_amount_display == "") {
            alert("Please Enter Paid Amount");
            return;
        }
        var transaction_date = $('#transaction_date').val();
        if (transaction_date == "") {
            alert("Please Select Transaction Date");
            return;
        }
        if (payment_type == "") {
            alert("Please Select Payment Type");
            return;
        }
        var pending_fee_amount = fee_amount - paid_amount_display;
        // alert(payment_type);
        if (payment_type == "DD") {
            $('.dd_info').show();
            $('.card_info').hide();
        } else if (payment_type == "CARD") {
            card_charges = (2.0 / 100) * paid_amount_display;
            $('.dd_info').hide();
            $('.card_info').show();
        } else if (payment_type == "CASH") {
            $('.dd_info').hide();
            $('.card_info').hide();
        }else{
            $('.dd_info').hide();
            $('.card_info').hide();
        }


        if (pending_fee_amount < 0) {
             excess_amount = pending_fee_amount;
        } else {
             excess_amount = 0;
        }
        excess_amount = excess_amount + card_charges;
        excess_amount = Number(excess_amount).toFixed(2);
        $('#paid_amount_display').html(paid_amount_display);
        $('#paid_amount_display').html(paid_amount_display);
        $('#pending_fee_display').html(pending_fee_amount);
        $('#excess_fee_display').html(excess_amount);
        $('#payment_type_display').html(payment_type);

        $('#paid_fee_amount').val(paid_amount_display);
        $('#payment_type_input').val(payment_type);
        $('#transaction_date_text').val(transaction_date);
        $('#excess_amount_input').val(excess_amount);
        

        $('#myReportModal').modal('show');
    });

   

    $(".proceedFeePaymentInfoButton").click(function() {
        if($( "#addFeePaymentInfo" ).valid()){
         $('.loaderScreen').show();
        $('#myReportModal').modal('hide')
        }
      
    });


});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
