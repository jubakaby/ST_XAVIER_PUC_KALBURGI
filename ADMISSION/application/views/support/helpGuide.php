
<style>
    <?php if($_SESSION['application_number_status'] == false){ ?> 
        .main-sidebar .nav #schoolDetailLink, .main-sidebar .nav #combinationDetailLink,
        .main-sidebar .nav #documentDetail, .main-sidebar .nav #paymentDetail{
            display: none !important;
        }
    <?php } 
        if($_SESSION['application_number_status'] == true){ ?> 
            #icons, #icon, #combination, #document, #payment{
            color: #008000 !important;
            }
    <?php } ?>
</style>

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
<div class="row ">
    <div class="col-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>

<div class="main-content-container container-fluid px-2">
    <div class="card card-small p-0  col-12">
        <div class="card-header p-2 card_head_dashboard">
            <span class="page-title">
                <div class="row font_color">
                    <div class="col-12">
                        <i class="far fa-question-circle"></i> Help Guide
                    </div>
                </div>
            </span>
        </div>

        <div class="card-body m-1 p-1">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <div class="card-header card_helpguide_questions" data-toggle="collapse" data-target="#demo">1. Video Guide</div>
                        <div id="demo" class="collapse">
                            <div class="card-body card_helpguide_content">
                                <!-- <a href="https://youtu.be/rSIBOcTtH98" target="_blank">Click Here.</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="card-header card_helpguide_questions" data-toggle="collapse" data-target="#demo1">2. Document Guide</div>
                        <div id="demo1" class="collapse">
                            <div class="card-body card_helpguide_content">
                                <a target="_blank" href="<?php echo base_url(); ?>assets/downloads/STUDENT_GUIDE_FOR_ONLINE_ADMISSION_PROCEDURE_2022.pdf">Click Here.</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="card-header card_helpguide_questions" data-toggle="collapse" data-target="#demo2">3. For any admission related query</div>
                        <div id="demo2" class="collapse">
                            <div class="card-body card_helpguide_content">
                                <p class="mb-1">Email : grievancesjpuc@gmail.com</p>
                                <p class="mb-1">Mobile Number : +91 8147498934 / +91 9108357266</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mb-2">
                        <div class="card-header card_helpguide_questions" data-toggle="collapse" data-target="#demo3">4. Question</div>
                        <div id="demo3" class="collapse">
                            <div class="card-body card_helpguide_content">
                                Lorem ipsum dolor text....
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>