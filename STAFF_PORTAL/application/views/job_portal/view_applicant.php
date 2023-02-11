<style>
    .table-applicant{
        width: 12%;
        background-color: #3c8dbc !important;
        color:white;
    }
    /* .table-application{
        background-color: #a6d786 !important;
    } */
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 7px !important;
        line-height: 1.0 !important;
        vertical-align: top !important;
        border-top: 1px solid #ddd;
        border: 1px solid black !important;
    
    }
    .head-title{
        font-size:20px;
        color:white;
        background-color:#3c8dbc;
    }
</style>
<div class="main-content-container container-fluid px-4 pt-2">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card card-small p-0 card_heading_title">
                    <div class="card-body p-1 card-content-title">
                        <div class="row ">
                            <div class="col-lg-8 col-md-8 col-8 text-black" style="font-size:22px;">
                                <i class="fa fa-users"></i>&nbsp;Job Applicant Info  <?=$info->fullname;?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-4"> 
                                <a href="#" onclick="GoBackWithRefresh();return false;" class="btn text-white primary_color btn-bck float-right mobile-bck ">
                                <i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form start -->
        <!-- Default Light Table -->
        <?php if(empty($info)){ ?>
        <div class="row form-employee">
            <div class="col-lg-12 col-md-12 col-12 pr-0 text-center">
            <img height="270" src="<?php echo base_url(); ?>assets/images/404.png"/>
            </div>
        </div>
        <?php } else {  ?>
        <div class="row form-employee">
            <div class="col-12">
                <div class="card card-small c-border p-0 mb-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-1">
                            <div class="row">
                                <div class="col profile-head">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link active" id="personal-tab" data-toggle="tab"
                                                href="#personal" role="tab" aria-controls="personal"
                                                aria-selected="false">Personal Info</a>
                                        </li> -->
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="academic-tab" data-toggle="tab" href="#academic"
                                                role="tab" aria-controls="academic" aria-selected="true">Academic
                                                Info</a>
                                        </li> -->
                                      
                                    </ul>
                                    <div class="tab-content personal-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="personal" role="tabpanel"
                                            aria-labelledby="personal-tab">
                                            <div class="table-responsive-sm table-responsive-md table-responsive-xs">
                                                <table class="table table-bordered">
                                                    <input type="hidden"  value="<?=$info->row_id;?>" id="applicant_id" name="applicant_id"/>
                                                    <tr>
                                                        <td colspan="1" rowspan="5" width="80">
                                                            <img src="<?=JOB_PORTAL_PATH.$info->profile_picture;?>" alt="Applicant Profile Photo" class="mt-1" width="120" height="120">
                                                        </td>
                                                        <td class="table-applicant">Full Name</td>
                                                        <th><?=$info->fullname;?></th>
                                                        <td class="table-applicant">Subject</td>
                                                        <th><?=$info->subject;?></th>
                                                        <td class="table-applicant">Mobile No.</td>
                                                        <th><?=$info->mobile_number;?></th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-applicant">Date of Birth</td>
                                                        <th><?=date('d-m-Y',strtotime($info->dob));?></th>
                                                        <td class="table-applicant">Email ID</td>
                                                        <th><?=$info->email_id;?></th>
                                                        <td class="table-applicant">Mother Tongue</td>
                                                        <th><?=$info->mother_tongue;?></th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-applicant">Religion</td>
                                                        <th><?=$info->religion;?></th>
                                                        <td class="table-applicant">Caste</td>
                                                        <th><?=$info->cast;?></th>
                                                        <td class="table-applicant">Languages Known</td>
                                                        <th><?php
                                                                $lkArr = json_decode($info->languages_known);
                                                                $lkStr = "";
                                                                if(!empty($lkArr)){
                                                                    foreach($lkArr as $ind=>$lang){
                                                                        (count($lkArr)-1 == $ind )
                                                                        ? $lkStr = $lkStr.$lang
                                                                        : $lkStr = $lkStr.$lang.",";
                                                                    }
                                                                }
                                                                echo($lkStr);
                                                            ?>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-applicant">Blood Group</td>
                                                        <th><?=$info->blood_group;?></th>
                                                        <td class="table-applicant">Marital Status</td>
                                                        <th><?=$info->marital_status;?></th>
                                                        <td class="table-applicant">Hobbies/Interests</td>
                                                        <th><?=$info->hobbies_interests;?></th>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-applicant">Address</td>
                                                        <th><?=$info->address;?></th>
                                                        <td class="table-applicant">Work Experience</td>
                                                        <th><?=$info->work_experience;?></th>
                                                        <td class="table-applicant">Expected Salary</td>
                                                        <th><?=$info->expected_salary;?></th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="table-responsive-sm table-responsive-md table-responsive-xs">
                                                <table class="table table-bordered table-application" style="margin-top:3%;">
                                                    <thead>
                                                        <tr class="head-title text-center">
                                                            <th colspan="4">Academic Qualification</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-applicant" style="width:25%">SSLC / 10<sup>th</sup> marks (in %)</td>
                                                            <th style="width:25%"><?=$info->sslc_percent;?></th>
                                                            <td class="table-applicant" style="width:25%">PUC marks (in %)</td>
                                                            <th style="width:25%"><?=$info->puc_percent;?></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-applicant">Under Graduation marks (in %)</td>
                                                            <th><?=$info->ug_percent;?></th>
                                                            <td class="table-applicant">Post Graduation Marks (in %)</td>
                                                            <th><?=$info->pg_percent;?></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-applicant">B.Ed Marks (in %)</td>
                                                            <th><?=$info->bed_percent;?></th>
                                                            <td class="table-applicant">Qualification</td>
                                                            <th><?=$info->qualification;?></th>
                                                        </tr>
                                                        <tr>
                                                            <td class="table-applicant">Additional Qualification</td>
                                                            <th><?=$info->additional_qualification;?></th>
                                                            <td class="table-applicant">Resume</td>
                                                            <th>
                                                                <a class="btn btn-sm btn-block btn-danger" target="_blank" href="<?=JOB_PORTAL_PATH.$info->resume;?>" title="View Resume">
                                                                    <i class="fa fa-file"></i> View
                                                                </a>
                                                            </th>
                                                        </tr>
                                                    <thead>
                                                </table> 
                                            </div>
                                        </div>
                                        <!-- <div class="tab-pane fade" id="academic" role="tabpanel" aria-labelledby="academic-tab">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="tbl-head" width="160">Student ID</th>
                                                    <th class="tbl-head-content" width="140"><?php echo $studentInfo->student_id; ?></th>
                                                    <th class="tbl-head">SAT Number</th>
                                                    <th class="tbl-head-content"><?php echo $studentInfo->sat_number; ?></th>
                                                    <th class="tbl-head">Term</th>
                                                    <th class="tbl-head-content"><?php echo strtoupper($studentInfo->term_name); ?></th>
                                                </tr>
                                                <tr>
                                                    <th class="tbl-head">Elective</th>
                                                    <th class="tbl-head-content"><?php echo $studentInfo->elective_sub; ?></th>
                                                    <th class="tbl-head">Stream</th>
                                                    <th class="tbl-head-content"><?php echo strtoupper($studentInfo->stream_name); ?></th>
                                                    <th class="tbl-head">Section</th>
                                                    <th class="tbl-head-content"><?php echo strtoupper($studentInfo->section_name); ?></th>
                                                </tr>
                                            </table>
                                        </div> -->

                                        
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Default Light Table -->
        
        <?php } ?>
    </div>
</div>