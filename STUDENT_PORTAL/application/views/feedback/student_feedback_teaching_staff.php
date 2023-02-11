<?php require APPPATH . 'views/includes/db.php'; ?>

<div class="main-content-container container-fluid px-4">

    <div class="col-md-12">

        <?php

            $this->load->helper('form');

            $error = $this->session->flashdata('error');

            if($error)

            {

        ?>

        <div class="alert alert-danger alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php echo $this->session->flashdata('error'); ?>

        </div>

        <?php } ?>

        <?php  

            $success = $this->session->flashdata('success');

            if($success)

            {

        ?>

        <div class="alert alert-success alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php echo $this->session->flashdata('success'); ?>

        </div>

        <?php } ?>



        <?php  

            $noMatch = $this->session->flashdata('nomatch');

            if($noMatch)

            {

        ?>

        <div class="alert alert-warning alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <?php echo $this->session->flashdata('nomatch'); ?>

        </div>

        <?php } ?>



        <div class="row">

            <div class="col-md-12">

                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>

            </div>

        </div>

    </div>

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <div class="row mt-1 mb-2">

            <div class="col padding_left_right_null">

                <div class="card card-small p-0 card_head_dashboard">

                    <div class="card-body p-2 ml-2">

                        <span class="page-title">

                            <i class="fa fa-clock-o"></i> Student Feedback For Teaching Staff

                        </span>

                        <a onclick="window.history.back();" class="btn btn-primary float-right text-white pt-2"

                            value="Back">Back </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="row form-employee">

        <div class="col-12 padding_left_right_null">

            <div class="card card-small c-border p-2">

                <hr class="mt-1 mb-1 text-dark">

                <div class="table-responsive-sm">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Staff Name</th>

                                <th>Department</th>

                                <th class="text-center">Action</th>

                            </tr>

                        </thead>

                        <?php 

                        if(!empty($feedbackStaffInfo)){

                        foreach($feedbackStaffInfo as $staff){ 

                            ?>

                        <tr>

                            <td><?php echo $staff->name; ?></td>

                            <td><?php echo $staff->dept_name; ?></td>

                            <?php 

                            $feed_back_submitted = false;

                            $isExist = checkStudentAlreadyGivenFeedback($con, $staff->staff_id, $student_id);

                            

                            if(!empty($isExist)){

                                $feed_back_submitted = true;

                            } ?>

                            <?php if($feed_back_submitted == true){ ?>

                                <td class="text-center"><b style="color:green">Updated</b></td>

                           <?php  }else{ ?>

                            <td class="text-center"><button style="padding: .25rem .5rem !important;" type="button"

                                    onclick="giveFeedbackOpenModal('<?php echo $staff->name; ?>','<?php echo $staff->staff_id; ?>')"

                                    class="btn btn-success btn-sm">

                                    Give Feedback

                                </button></td>

                         <?php  } ?>

                           

                         

                        </tr>

                        <?php } }else{?>

                        <tr>

                            <td colspan="3">Staff Not Found!</td>

                        </tr>

                        <?php } ?>



                    </table>



                </div>

            </div>

        </div>

    </div>

</div>



<!-- The Modal -->

<div class="modal" id="giveFeedbackModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">



            <!-- Modal Header -->

            <div class="modal-header">

                <h4 class="modal-title">Feedback to <span id="staff_name_display"></span></h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>



            <!-- Modal body -->

            <div class="modal-body">

            <form style="color: black;" action="<?php echo base_url(); ?>saveMyFeedback" method="post" role="form" id="studentFamilyform">

                <input type="hidden" value="" id="staff_id" name="staff_id"/>

                <ul style="color: red;">

                    <li>Answer the following questions with sincerity, honesty and responsibility.</li>

                  

                    <li>Strict confidentiality has to be maintained regarding your feedback.</li>

                    <li>All questions are compulsory.</li>

                </ul>

                <div class="table-responsive-sm">

                    <table class="table table-bordered">

                        <thead>

                            <tr style="background: #97aeba;color: black;">

                                <th>Question</th>

                                <th>Answer</th>

                            </tr>

                        </thead>

                        <?php 

                        if(!empty($feedbacQuestions)){

                        foreach($feedbacQuestions as $q){ 

                            ?>

                        <tr style="color: black;">

                            <td><?php echo $q->question; ?></td>

                            <td>

                                <div class="custom-control custom-radio custom-control-inline">

                                    <input type="radio" id="customRadioInline1_<?php echo $q->qid; ?>"

                                      value="1"  name="answer_<?php echo $q->qid; ?>" class="custom-control-input" required>

                                    <label class="custom-control-label"

                                        for="customRadioInline1_<?php echo $q->qid; ?>">YES</label>

                                </div>

                                <div class="custom-control custom-radio custom-control-inline">

                                    <input type="radio" id="customRadioInline2_<?php echo $q->qid; ?>"

                                    value="0" name="answer_<?php echo $q->qid; ?>" class="custom-control-input" required>

                                    <label class="custom-control-label"

                                        for="customRadioInline2_<?php echo $q->qid; ?>">NO

                                    </label>

                                </div>

                            </td>

                        </tr>

                        <?php } } ?>



                    </table>

                </div>

                <hr class="mt-1 mb-1 text-dark">

                <div class="row">

                    <div class="col-lg-12 col-12">

                        <div class="form-group">

                            <label for="impression" style="color: green;">What is your overall impression about the

                                teacher?</label>

                            <textarea name="impression" class="form-control" id="impression" rows="3" required></textarea>

                        </div>

                    </div>

                    <div class="col-lg-12 col-12">

                        <div class="form-group">

                            <label for="suggestions" style="color: green;">What are your suggestions to the Teacher for

                                improvement?</label>

                            <textarea name="suggestions" class="form-control" id="suggestions" rows="3" required></textarea>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-success" >Submit</button>

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>

                        </form>

            </div>



            <!-- Modal footer -->

        </div>

    </div>

</div>

<script type="text/javascript">

jQuery(document).ready(function() {

    jQuery('.datepicker').datepicker({

        autoclose: true,

        format: "dd-mm-yyyy",

        endDate: "today"

    });



    jQuery('ul.pagination li a').click(function(e) {

        e.preventDefault();

        var link = jQuery(this).get(0).href;

        var value = link.substring(link.lastIndexOf('/') + 1);

        jQuery("#byDateFilter").attr("action", baseURL + "studentLaterComer/" + value);

        jQuery("#byDateFilter").submit();

    });

});



function giveFeedbackOpenModal(staff_name, staff_id) {

    $("#staff_id").val(staff_id);

    $('#staff_name_display').html(staff_name);

    $('#giveFeedbackModal').modal('show');

}

</script>



<?php 

function checkStudentAlreadyGivenFeedback($con,$staff_id, $student_id){

    $query = "SELECT * FROM tbl_student_feedback_teaching_staff as feed

    WHERE feed.staff_id = '$staff_id' AND feed.student_id = '$student_id' AND feed.feedback_year = '2023'";

    $pdo_statement = $con->prepare($query);

    $pdo_statement->execute();

    return $pdo_statement->fetch();

  }

?>