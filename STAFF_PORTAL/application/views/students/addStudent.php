<!-- <style>
label {
    font-weight: 500 !important;
}
</style> -->
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
<?php
        $warning = $this->session->flashdata('warning');
        if ($warning) {
        ?>
<div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="fa fa-check mx-2"></i>
    <strong>warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
</div>
<?php }?>
<div class="row">
    <div class="col-md-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>
<div class="main-content-container container-fluid px-4 pt-2">
    <div class="content-wrapper">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12 col-lg-12 padding_left_right_null">
                <div class="card ">
                    <div class="card-header text-white card-content-title p-1 card_head_dashboard">
                        <div class="row ">
                            <div class="col-md-6 col-8 text-black m-auto " style="font-size:22px;"><i class="fa fa-user"></i>&nbsp;Add Student Details
                            </div>
                            <div class="col-md-6 col-4 m-auto"> <a href="#" onclick="GoBackWithRefresh();return false;"
                                    class="btn text-white btn-primary btn-bck float-right mobile-btn "><i
                                        class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back </a></div>
                        </div>
                    </div>
                    <div class="card-body contents-body">
                        <?php $this->load->helper("form"); ?>
                        <form role="form" id="addStudent" action="<?php echo base_url() ?>addNewStudentTojnpuc" method="post"
                            role="form">
                            <div class="row form-contents">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="student_name">Student Name</label>
                                        <input type="text" class="form-control required" id="student_name"
                                            name="student_name" placeholder="Student Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="admitted_college_rowid">College Name</label>
                                        <select name="admitted_college_rowid" id="admitted_college_rowid"
                                            class="form-control required selectpicker" data-live-search="true">
                                            <option value="">Select College Name</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="college_application_number">Application Number </label>
                                        <input type="text" class="form-control required college_application_number "
                                            id="college_application_number" name="college_application_number"
                                            maxlength="128" placeholder="Application Number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="college_register_number">College Register Number (Optional) </label>
                                        <input type="text" class="form-control  college_register_number "
                                            id="college_register_number" name="college_register_number" maxlength="128"
                                            placeholder="College Register Number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="course_admitted">Course Admitted (Optional)</label>
                                        <input type="text" class="form-control" id="course_admitted"
                                            name="course_admitted" placeholder="Course Admitted" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="hostel_application_number">Hostel Application Number (Optional) </label>
                                        <input type="text" class="form-control  hostel_application_number "
                                            id="hostel_application_number" name="hostel_application_number"
                                            maxlength="128" placeholder="Hostel Application Number" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label for="hostel_admitted_date">Hostel Admitted Date </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <span class="input-group-text material-icons date-icon">date_range</span>
                                        </div>
                                        <input id="hostel_admitted_date" type="text" name=" hostel_admitted_date"
                                            value=""
                                            class="form-control required datepicker date-col-4 "
                                            placeholder="Hostel Admitted Date" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 padding_left_right_null">
                                    <div class="card">
                                        <div class="card-header card-contents-sub-title text-black p-2 card_head_dashboard"
                                            style="font-size:17px;">Student Personal Info</div>
                                        <div class="card-body card-contents-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <label for="dob">DOB </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-append">
                                                            <span
                                                                class="input-group-text material-icons date-icon">date_range</span>
                                                        </div>
                                                        <input id="dob" type="text" name="dob"
                                                            value=""
                                                            class="form-control required datepicker date-col-4 "
                                                            placeholder="DOB" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="student_age">Age</label>
                                                        <input type="text" class="form-control required"
                                                            id="student_age" name="student_age" placeholder="Age"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="student_contact">Contact Number (Optional)</label>
                                                        <input type="text" class="form-control " id="student_contact"
                                                            name="student_contact" placeholder="Contact Number "
                                                            maxlength="10" onkeypress="return isNumberKey(event)"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="student_email_id">Email (Optional)</label>
                                                        <input type="text" class="form-control" id="student_email_id"
                                                            name="student_email_id" placeholder="Email"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4  col-12">
                                                    <div class="form-group">
                                                        <label for="blood_group">Blood Group</label>
                                                        <select class="form-control " id="blood_group"
                                                            name="blood_group">
                                                            <option value="">Select Blood Group</option>
                                                            <option value="A+"> A+</option>
                                                            <option value="O+">O+</option>
                                                            <option value="B+">B+</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB-">AB-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_tongue">Mother Tongue (Optional)</label>
                                                        <input type="text" class="form-control" id="mother_tongue"
                                                            name="mother_tongue" placeholder="Mother Tongue"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="religion">Religion</label>
                                                        <select name="religion" id="religion"
                                                            class="form-control  selectpicker"
                                                            data-live-search="true">
                                                            <option value="">Select Religion</option>
                                                            <?php if(!empty($religionInfo))
                                                        { foreach ($religionInfo as $religion)
                                                            { ?>
                                                            <option value="<?php echo $religion->row_id ?>">
                                                                <?php echo $religion->name ?></option>
                                                            <?php   } 
                                          } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="cast">Caste</label>
                                                        <select name="cast" id="cast"
                                                            class="form-control  selectpicker"
                                                            data-live-search="true">
                                                            <option value="">Select Caste</option>
                                                            <?php if(!empty($casteInfo))
                                                        { foreach ($casteInfo as $caste)
                                                            { ?>
                                                            <option value="<?php echo $caste->row_id ?>">
                                                                <?php echo $caste->name ?></option>
                                                            <?php   } 
                                          } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="sub_cast">Sub Caste (Optional)</label>
                                                        <input type="text" class="form-control" id="sub_caste"
                                                            name="sub_caste" placeholder="Sub Caste" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="category">Category (Optional) </label>
                                                        <select name="category" id="category"
                                                            class="form-control  selectpicker"
                                                            data-live-search="true">
                                                            <option value="">Select Category</option>
                                                            <?php if(!empty($categoryInfo))
                                                        { foreach ($categoryInfo as $category)
                                                            { ?>
                                                            <option value="<?php echo $category->row_id ?>">
                                                                <?php echo $category->name ?></option>
                                                            <?php   } 
                                          } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="nationality">Nationality (Optional)</label>
                                                        <select name="nationality" id="nationality"
                                                            class="form-control  selectpicker"
                                                            data-live-search="true">
                                                            <option value="">Select Nationality</option>
                                                            <?php if(!empty($nationalityInfo))
                                                        { foreach ($nationalityInfo as $nationality)
                                                            { ?>
                                                            <option value="<?php echo $nationality->row_id ?>">
                                                                <?php echo $nationality->name ?></option>
                                                            <?php   } 
                                                     } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="permanent_address">Permanent Address</label>
                                                        <textarea class="form-control required"
                                                            value="<?php echo set_value('permanent_address'); ?>"
                                                            name="permanent_address" id="permanent_address" rows="4"
                                                            placeholder="Address" autocomplete="off" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="present_address">Present Address</label>
                                                        <textarea class="form-control required"
                                                            value="<?php echo set_value('present_address'); ?>"
                                                            name="present_address" id="present_address" rows="4"
                                                            placeholder="Address" autocomplete="off" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mt-2 mb-2">
                                    <div class="card">
                                        <div class="card-header card-contents-sub-title text-black p-2 card_head_dashboard"
                                            style="font-size:17px;">Student Family Info</div>
                                        <div class="card-body card-contents-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="father_name">Father Name</label>
                                                        <input type="text" class="form-control required"
                                                            id="father_name" name="father_name"
                                                            placeholder="Father Name" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="father_occupation">Father Occupation </label>
                                                        <input type="text" class="form-control "
                                                            id="father_occupation" name="father_occupation"
                                                            placeholder="Occupation" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="father_mobile">Father Mobile Number</label>
                                                        <input type="text" class="form-control " id="father_mobile"
                                                            name="father_mobile" placeholder="Contact Number "
                                                            maxlength="10" onkeypress="return isNumberKey(event)"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="father_email_id">Father Email (Optional)</label>
                                                        <input type="text" class="form-control" id="father_email_id"
                                                            name="father_email_id" placeholder="Email"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="father_annual_income">Father Annual Income (Optional)</label>
                                                        <input type="text" class="form-control" id="father_annual_income"
                                                            name="father_annual_income" placeholder="Annual Income" onkeypress="return isNumberKey(event)"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_name">Mother Name</label>
                                                        <input type="text" class="form-control required"
                                                            id="mother_name" name="mother_name"
                                                            placeholder="Mother Name" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_occupation">Mother Occupation</label>
                                                        <input type="text" class="form-control "
                                                            id="mother_occupation" name="mother_occupation"
                                                            placeholder="Occupation" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_mobile">Mother Mobile Number</label>
                                                        <input type="text" class="form-control " id="mother_mobile"
                                                            name="mother_mobile" placeholder="Contact Number "
                                                            maxlength="10" onkeypress="return isNumberKey(event)"
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_email_id">Mother Email (Optional)</label>
                                                        <input type="text" class="form-control" id="mother_email_id"
                                                            name="mother_email_id" placeholder="Email"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_annual_income"> Mother Annual Income (Optional)</label>
                                                        <input type="text" class="form-control" id="mother_annual_income"
                                                            name="mother_annual_income" placeholder="Annual Income" onkeypress="return isNumberKey(event)"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="mother_address">Mother Address</label>
                                                        <textarea class="form-control "
                                                            value="<?php echo set_value('mother_address'); ?>"
                                                            name="mother_address" id="mother_address" rows="4"
                                                            placeholder="Address"
                                                            autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="father_address">Father Address</label>
                                                        <textarea class="form-control "
                                                            value="<?php echo set_value('father_address'); ?>"
                                                            name="father_address" id="father_address" rows="4"
                                                            placeholder="Address"
                                                            autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input style="float:right;" type="submit" class="btn btn-primary" value="Submit" />
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/staff/student.js" type="text/javascript"></script>
<script type="text/javascript">
function GoBackWithRefresh(event) {
    showLoader();
    if ('referrer' in document) {
        window.location = '<?php echo base_url(); ?>/studentDetails';
        /* OR */
        //location.replace(document.referrer);
    } else {
        window.history.back();
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    return true;
}
jQuery(document).ready(function() {
    $(".health_description").hide();
    $("#any_health_issues").change(function(e) {
        var value = $("#any_health_issues").val();
        if(value == 'Yes'){
            $(".health_description").show();
        }else{
            $(".health_description").hide();
        }
        });
    jQuery('.datepicker').datepicker({
        autoclose: true,
        orientation: "bottom",
        format: "dd-mm-yyyy"

    });
});
</script>