<style>
label {
    font-weight: 500 !important;
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
    <div class="col-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>

<div class="main-content-container px-3 pt-1 overall_content">
    <div class="content-wrapper">
        <div class="row p-0 column_padding_card">
            <div class="col column_padding_card">
                <div class="card card-small card_heading_title p-0 m-b-1">
                    <div class="card-body p-2">
                        <div class="row c-m-b">
                            <div class="col-lg-7 col-12 col-md-7 box-tools">
                                <span class="page-title">
                                    <i class="material-icons">description</i> Edit Fee Structure
                                </span>
                            </div>
                            <div class="col-lg-5 col-md-5 col-12">
                                <a href="<?php echo base_url() ?>viewFeeStructure"
                                    class="btn primary_color mobile-btn float-right text-white" value="Back"><i
                                        class="fa fa-arrow-circle-left"></i> Back </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0 column_padding_card">
            <div class="col column_padding_card">
                <div class="card card-small c-border mb-4 p-2">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-2">
                            <form role="form" action="<?php echo base_url() ?>updateFeeStructure" method="post"
                                role="form">
                                <input type="hidden" name="row_id" id="row_id"
                                    value="<?php echo $feeInfo->row_id; ?>" />
                                <div class="row p-0 column_padding_card">
                                    <div class="col column_padding_card">
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label>Fee Name</label>
                                                <select class="form-control" name="fees_type" id="fees_type" required>
                                                    <?php if(!empty($feeInfo->fees_type)){ ?>
                                                        <option value="<?php echo $feeInfo->fees_type; ?>"> Selected: <?php echo $feeInfo->fee_name; ?></option>
                                                    <?php } ?>
                                                    <option value="">Select Fee Name</option>
                                                    <?php if(!empty($feeNameInfo)){
                                                        foreach($feeNameInfo as $fee){  ?>
                                                            <option value="<?php echo $fee->row_id; ?>"><?php echo $fee->fee_name; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label>Select Term</label>
                                                <select data-live-search="true" class="form-control selectpicker"
                                                    name="term_name" id="term_name_select" required>
                                                    <?php if(!empty($feeInfo->term_name)){ ?>
                                                    <option value="<?php echo $feeInfo->term_name; ?>">Selected:
                                                        <?php echo $feeInfo->term_name; ?>
                                                    </option>
                                                    <?php } ?>
                                                    <option value="ALL">ALL</option>
                                                    <option value="I PUC">I PUC</option>
                                                    <option value="II PUC">II PUC</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-3">
                                                <label>Select Stream</label>
                                                <select data-live-search="true" class="form-control" name="stream_name"
                                                    id="term_stream_select" required>
                                                    <?php if(!empty($feeInfo->stream_name)){ ?>
                                                    <option value="<?php echo $feeInfo->stream_name; ?>">Selected:
                                                        <?php echo $feeInfo->stream_name; ?>
                                                    </option>
                                                    <?php } ?>


                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-4">
                                                <label>Fee Amount SSLC Board</label>
                                                <input type="text" class="form-control" id="fee_amount_state_board"
                                                    value="<?php echo $feeInfo->fee_amount_state_board; ?>"
                                                    name="fee_amount_state_board"
                                                    placeholder="Enter SSLC Board Fee Amount" maxlength="10"
                                                    onkeypress="return isNumberKey(event)" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Fee Amount ICSE/CBSE and Other State Board</label>
                                                <input type="text" class="form-control" id="fee_amount_icse_cbse_board"
                                                    value="<?php echo $feeInfo->fee_amount_icse_cbse; ?>"
                                                    name="fee_amount_icse_cbse_board"
                                                    placeholder="Enter Fee ICSE/CBSE Amount" maxlength="10"
                                                    onkeypress="return isNumberKey(event)" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label>Fee Amount Foreign/NRI</label>
                                                <input type="text" class="form-control" id="nri_amount_state_board"
                                                    value="<?php echo $feeInfo->fee_amount_nri; ?>"
                                                    name="nri_amount_state_board"
                                                    placeholder="Enter Foreign/NRI Fee Amount" maxlength="10"
                                                    onkeypress="return isNumberKey(event)" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <span class="float-left font-weight-bold"><input type="checkbox" name="fillAddress" id="fillAddress" onclick="fillAddress()" /> <span class="pl-2">Fee same for all</span></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label>Bank Account</label>
                                                <select class="form-control selectpicker" name="account_row_id"
                                                    id="account_row_id" data-live-search="true" required>
                                                    <?php if(!empty($feeInfo->bank_name)){ ?>
                                                    <option value="<?php echo $feeInfo->account_row_id; ?>">Selected:
                                                        <?php echo $feeInfo->account_no; ?>
                                                        (<?php echo $feeInfo->bank_name; ?>)</option>
                                                    <?php } ?>
                                                    <option value="">Select Bank Account</option>
                                                    <?php if(!empty($accountDetails)) { 
                                                        foreach($accountDetails as $account){ ?>
                                                    <option value="<?php echo $account->row_id; ?>">
                                                        <?php echo $account->account_no; ?>
                                                        (<?php echo $account->bank_name; ?>)</option>
                                                    <?php } } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Fee Type</label>
                                                <select class="form-control selectpicker" name="school_account_type"
                                                    id="school_account_type" data-live-search="true" required>
                                                    <?php if(!empty($feeInfo->feeType)){ ?>
                                                    <option value="<?php echo $feeInfo->feeType_id; ?>">
                                                        Selected:
                                                        <?php echo $feeInfo->feeType; ?> </option>
                                                    <?php } ?>
                                                    <option value="">Select Fee Type</option>
                                                    <?php if(!empty($feeTypeInfo)){
                                                        foreach($feeTypeInfo as $fee){ ?>
                                                            <option value="<?php echo $fee->row_id; ?>"><?php echo $fee->feeType; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Fee Student Type</label>
                                                <select class="form-control selectpicker" name="fee_student_type"
                                                    id="fee_student_type" data-live-search="true" required>
                                                    <?php if(!empty($feeInfo->fee_student_type)){ ?>
                                                    <option value="<?php echo $feeInfo->fee_student_type; ?>">
                                                        Selected:
                                                        <?php echo $feeInfo->fee_student_type; ?> </option>
                                                    <?php } ?>
                                                    <option value="">Select Fee Student Type</option>
                                                    <option value="Aided">Aided</option>
                                                    <option value="Unaided">Unaided</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Select Fee Required Type</label><br>
                                                <div class="form-check-inline">
                                                    <?php if($feeInfo->fee_required_type == 'M'){ ?>
                                                        <label class="form-check-label mx-3">
                                                            <input type="radio" class="form-check-input" name="fee_Required_status" value="M" checked>Mandatory
                                                        </label>
                                                        <label class="form-check-label mx-3">
                                                            <input type="radio" class="form-check-input" name="fee_Required_status" value="O">Optional
                                                        </label>
                                                    <?php }else{ ?>
                                                        <label class="form-check-label mx-3">
                                                            <input type="radio" class="form-check-input" name="fee_Required_status" value="M">Mandatory
                                                        </label>
                                                        <label class="form-check-label mx-3">
                                                            <input type="radio" class="form-check-input" name="fee_Required_status" value="O" checked>Optional
                                                        </label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <?php if($feeInfo->lang_fee_status == '1'){ ?>
                                                <label><input type="checkbox" class="mr-2" value="1" name="language_fees" checked /> Language Fees</label>
                                                <?php }else{ ?>
                                                <label><input type="checkbox" class="mr-2" value="1" name="language_fees" /> Language Fees</label>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success float-right"> Update </button>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    return true;
}

jQuery(document).ready(function() {


    var feeAmount_state_board = $("#fee_amount_state_board").val();
    var feeAmount_icse_cbse_board = $("#fee_amount_icse_cbse_board").val();
    var nriAmount_state_board = $("#nri_amount_state_board").val();
    
    if(feeAmount_state_board == "" || feeAmount_icse_cbse_board == ""){
        $('#fillAddress').attr('checked',false); 
    }else if(feeAmount_state_board == feeAmount_icse_cbse_board && feeAmount_state_board == nriAmount_state_board){
        $('#fillAddress').attr('checked',true); 
    }else{
        $('#fillAddress').attr('checked',false); 
    }



    //   $('#term_stream_select').attr('disabled',true);
    //update stream name based on term selected
    $("#term_name_select").on('change', function() {
        $('#term_stream_select option:not(:first)').remove();
        var term_name = this.value;
        if (term_name == "") {
            $('#term_stream_select').attr('disabled', true);
        } else {
            $.ajax({
                url: '<?php echo base_url(); ?>/getStreamByTerm',
                type: 'POST',
                data: {
                    term_name: term_name
                },
                success: function(data) {

                    $('#term_stream_select').attr('disabled', false);
                    var count = data.result.length;
                    for (var i = 0; i < count; i++) {

                        $("#term_stream_select").append(new Option(data.result[i]
                            .stream_name, data.result[i].stream_name));
                    }
                    $("#term_stream_select").append(new Option("ALL", "ALL"));
                },
                error: function(result) {
                    alert("Retry Again! Something Went Wrong");
                },
                fail: (function(status) {
                    alert("Retry Again! Something Went Wrong");
                }),
                beforeSend: function(d) {
                    // $("#loaderDiv").html(loader);
                }
            });
        }

    });

    $("#fillAddress").on('change', function() {
        if(this.checked) {
            var fee_amount_state_board = $("#fee_amount_state_board").val();

            $("#fee_amount_icse_cbse_board").val(fee_amount_state_board);
            $("#nri_amount_state_board").val(fee_amount_state_board);     
        }else {
            $("#fee_amount_icse_cbse_board").val('');
            $("#nri_amount_state_board").val('');             
        }
    });
    
});


</script>