<style>
    <?php if ($_SESSION['application_number_status'] == false) { ?>.main-sidebar .nav #dashboard {
        display: none !important;
    }

    <?php }
    if ($_SESSION['application_number_status'] == true) { ?>#icons,
    #icon,
    #combination,
    #document,
    #payment {
        color: #008000 !important;
    }

    <?php } ?>
</style>
<?php
$this->load->helper('form');
?>

<?php
$noMatch = $this->session->flashdata('nomatch');
if ($noMatch) {
?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $this->session->flashdata('nomatch'); ?>
    </div>
<?php } ?>
<div class="row ">
    <div class="col-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>

<?php
$preference_amount = 25;
?>

<div class="main-content-container container-fluid px-2">
    <div class="card card-small p-0  col-12">
        <div class="card-header p-2 card_head_dashboard">
            <span class="page-title">
                <div class="row font_color ">
                    <div class="col-sm-6">
                        Step : IV <i class="fa fa-inr"></i> Payment
                    </div>
                    <div class="col-sm-6 text-right">
                        <i class=""></i> Admission Form : <?= ADMISSION_YEAR ?>
                    </div>
                </div>
            </span>
        </div>
        <form method="post" action="<?php echo base_url(); ?>studentFinalSubmission" role="form">
            <div class="card-body p-2 m-1">
                <input type="hidden" id="boardName" value="<?php echo $boardInfo->board_name?>">
                 <div class="row">
                <div class="col-12 column_padding_card ">
                    <?php
                    if (!empty($isValidChecksum)) {
                        if ($payment_done_now == true) { ?>
                            <div class="alert alert-success" role="alert">
                                Your Application Successfully processed
                            </div>
                        <?php    } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <b>Payment Failed!</b> Please try again
                            </div>
                    <?php }
                    } ?>
                    <!-- <form id="paymentForm" method="post" role="form"> -->

                    <div class="row mx-auto justify-content-center align-items-center flex-column ">
                        <div class="card text-center w-50">
                          
                                    <div style="padding: 2px;" class="card-header payment_card_title">
                                        <h4>Application Fee</h4>
                                    </div>
                                    <div style="padding: 5px;" class="card-body">
                                        <h2><b>Rs. 25.00</b></h2>
                                   
                                    <?php if ($payment_status == true) { ?>
                                        <img src="<?php echo base_url(); ?>assets/dist/img/payment_sucess.png" width="50" height="50" alt="Success" class="mb-1" />
                                        <div class="alert alert-success mb-1" role="alert">
                                            <b>Thank You!</b> Application Fee is Paid
                                        </div>
                                        <hr class="m-1">
                                        <p>Application Number: <span class="text-danger"><?php echo $studentInfo->application_number; ?></span></p>
                                    <?php } else { ?>

                                        <div class="alert alert-info" role="alert">
                                            Application fee is pending
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <?php if ($payment_status == true) {
                                        // if($application_applied_status == true){ 
                                    ?>
                                        <a target="_blank" href="<?php echo base_url(); ?>viewPrintApplication" class="btn btn-secondary btn-block"><b>Print</b></a>
                                </div>
                                <? //php // }else{ 
                                ?>
                                <!-- <button type="submit" id="apply" class="btn btn-block btn-md btn-danger">
                                    Apply</button> -->


                            <?php  } else { ?>
                                <div style="padding: 2px;" class="card-footer text-muted">
                                    <a href="<?php echo base_url(); ?>payTmPaymentProcess" class="btn btn-primary btn-block"><b>Pay Now</b></a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
    </div>

    <div class="card-footer card_head_dashboard p-2">
        <div class="row ">
            <div class="col-6 text-left">
                <a href="<?php echo base_url(); ?>viewCombinationDetail" id="previousloader" class="mdc-button mdc-button--raised btn_primary"><i class="fas fa-angle-double-left"></i> Previous</a>
            </div>
            <div class="col-6 text-right">
            </div>
        </div>
    </div>
    </form>
    <div class="clearfix"></div>
</div>

<!-- The Modal -->
<!-- <div class="modal pt-2" id="combinationModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-center" style="color:red; font-size: 23px; font-weight:600">Are you sure do you want apply?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" style="padding: .5rem!important;">
                <h5 style="font-size: 17px;color: black;">1. Details entered cannot be changed or modified after the application apply.</h5>
                <h5 style="font-size: 17px;color: black;">2. Application print copy should be in <b>A4</b> Format and back to back page.</h5>
            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-success finalPrint" >OK</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div> -->
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><b>Instructions for CBSE AND ICSE Applicants</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:4px; color:black">

                <ul>
                    <li>CBSE and ICSE candidates will have an entrance test before their provisional admission</li>
                    <li>Entrance Test is compulsory</li>
                    <li>Candidates applied up to 22 May 2022 will have the entrance exam on 23 May 2022</li>
                    <li>Candidates must bring the hard copy of the filled in application.</li>
                    <li>Time- 9.30 AM</li>
                    <li>Venue- St Joseph's Pre -University. College, campus</li>
                    <li>Mode of exam - Offline MCQ</li>
                    <li>Duration - 45 min</li>
                    <li>Syllabus - 10th STD ICSE / CBSE.</li>
                    <li>Candidate applying 23 May 2022 onwards, entrance test date will be intimated through the website</li>


                </ul>


            </div>
            <div class="modal-footer">
                <button type="button" id="accept" class="btn btn-danger" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $("#icons").css('color', '#008000');
        $("#icon").css('color', '#008000');
        $("#combination").css('color', '#008000');
        $("#document").css('color', '#008000');
        $("#apply").click(function() {
            $("#payment").css('color', '#008000');
        });
    });
    jQuery(document).ready(function() {

        // $(".next-step-submit").click(function () {
        //     $("#combinationModal").show();
        // });

        // $(".next-step-submit").click(function (e) {
        //     var stream_name = $("#stream_name").val();
        //     $(".modal-footer #streamName").val(stream_name);
        //     $.ajax({
        //         url: baseURL+'/savePaymentInfo',
        //         type: 'POST',
        //         data: { admission_info : $('#paymentForm').serialize(),
        //                 },
        //         success: function(data) {
        //             $("#coverScreen").hide();
        //         },
        //         error: function(result){
        //             // alert("Retry Again! Something Went Wrong");
        //         },
        //         fail:(function(status) {
        //             alert("Retry Again! Something Went Wrong");
        //         }),
        //         beforeSend:function(d){
        //             $("#coverScreen").show();
        //         }
        //     });
        // });

    });

    // $(document).ready(function() {
    //     $('#paymentForm').submit(function( event ) {
    //             $('#combinationModal').modal('show');
    //     event.preventDefault();
    //     });
    // });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
<script>
    $(document).ready(() => {
        checkForReply("<?= $this->session->flashdata('success') ?>", "<?= $this->session->flashdata('error') ?>");
    });


        $(window).on('load', function() {

            
            var boardName = $('#boardName').val();

              if(boardName=="ICSE" || boardName=="CBSE"){

            $('#exampleModalCenter').modal({
                backdrop: 'static',
                keyboard: true,
                show: true
            });

            $('#exampleModalCenter').modal('show');
              }
        });
    
</script>