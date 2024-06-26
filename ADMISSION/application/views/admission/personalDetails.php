 <style>
    <?php if($_SESSION['application_number_status'] == false){ ?>
        .main-sidebar .nav #schoolDetailLink, .main-sidebar .nav #combinationDetailLink,
        .main-sidebar .nav #documentDetail, .main-sidebar .nav #paymentDetail{
            display: none ;
        }
    <?php } 
        if($_SESSION['application_number_status'] == true){ ?> 
            #icons, #icon, #combination, #document, #payment{
            color: #008000 !important;
            }
    <?php } ?>

@media screen and (max-width: 568px) {
 /* put your css styles in here */
    .datepicker {
        top: 120px !important;
        left: 15px !important;
        z-index: 10 !important;
        display: block !important;
    }
}

@media (min-width:321px) and (max-width: 480px) {
    .datepicker {
        top: 120px !important;
        left: 15px !important;
        z-index: 10 !important;
        display: block !important;
    }
}
</style>

<?php
	$application_number="";
    $nationality = "";
    $name = $name;
    $dob = date('d-m-Y',strtotime($date_of_birth));
    $religion = "";
    $caste = "";
    $sub_caste = "";
    $blood_group = "";
    $native_place = "";
    $mother_tongue = "";
    $mother_name = "";
    $father_name = "";
    $mother_mobile="";
    $mother_qualification="";
    $mother_profession="";
    $mother_annual_income="";
    $mother_email="";
    $father_mobile="";
    $father_qualification="";
    $father_profession="";
    $father_annual_income="";
    $father_email="";
    $permanent_address="";
    $residential_address="";
    $guardian_name="";
    $guardian_mobile="";
    $guardian_address="";
    $aadhar_no="";
    $father_age = "";
    $mother_age = "";
    $student_mobile = "";
    $gender = "MALE";
    
    $permanent_address_line_1 = "";
    $permanent_address_line_2 = "";
    $permanent_address_district = "";
    $permanent_address_state = "";
    $permanent_address_pincode = "";
    $residence_address_line_1  = "";
    $residence_address_line_2 = "";
    $residence_address_district = "";
    $residence_address_state = "";
    $residence_address_pincode = "";
    $student_email = $email;

    $priest_name = "";
    $priest_mobile = "";
    $priest_doc_image = "";
    $pastor_name = "";
    $pastor_mobile = "";
    $pastor_doc_image = "";
    
    $student_profile ="";
    $caste_certificate = "";
    
if(!empty($studentApplicationInfo)){
    $application_number=$studentApplicationInfo->application_number;
    $nationality = $studentApplicationInfo->nationality;
    $name = $studentApplicationInfo->name;
    $gender = $studentApplicationInfo->gender;
    $dob = date("d-m-Y", strtotime($studentApplicationInfo->dob));
    $religion = $studentApplicationInfo->religion;
    $caste = $studentApplicationInfo->caste;
    $sub_caste = $studentApplicationInfo->sub_caste;
    $blood_group = $studentApplicationInfo->blood_group;
    $native_place = $studentApplicationInfo->native_place;
    $mother_tongue = $studentApplicationInfo->mother_tongue;
    $mother_name = $studentApplicationInfo->mother_name;
    $father_name = $studentApplicationInfo->father_name;
    $mother_mobile = $studentApplicationInfo->mother_mobile;
    $mother_qualification = $studentApplicationInfo->mother_qualification;
    $mother_profession = $studentApplicationInfo->mother_profession;
    $mother_annual_income = $studentApplicationInfo->mother_annual_income;
    $mother_email = strtolower($studentApplicationInfo->mother_email);
    $father_mobile = $studentApplicationInfo->father_mobile;
    $father_qualification = $studentApplicationInfo->father_qualification;
    $father_profession = $studentApplicationInfo->father_profession;
    $father_annual_income = $studentApplicationInfo->father_annual_income;
    $father_email = strtolower($studentApplicationInfo->father_email);
    $permanent_address = $studentApplicationInfo->permanent_address;
    $residential_address = $studentApplicationInfo->residential_address;
    $guardian_name = $studentApplicationInfo->guardian_name;
    $guardian_mobile = $studentApplicationInfo->guardian_mobile;
    $guardian_address = $studentApplicationInfo->guardian_address;
    $aadhar_no = $studentApplicationInfo->aadhar_no;
    $father_age = $studentApplicationInfo->father_age;
    $mother_age = $studentApplicationInfo->mother_age;
    $student_mobile = $studentApplicationInfo->student_mobile;
    $student_email = $studentApplicationInfo->student_email;
    
    $permanent_address_line_1 = $studentApplicationInfo->permanent_address_line_1;
    $permanent_address_line_2 = $studentApplicationInfo->permanent_address_line_2;
    $permanent_address_district = $studentApplicationInfo->permanent_address_district;
    $permanent_address_state = $studentApplicationInfo->permanent_address_state;
    $permanent_address_pincode = $studentApplicationInfo->permanent_address_pincode;
    $residence_address_line_1  = $studentApplicationInfo->residential_address_line_1;
    $residence_address_line_2 = $studentApplicationInfo->residential_address_line_2;
    $residence_address_district = $studentApplicationInfo->residential_address_district;
    $residence_address_state = $studentApplicationInfo->residential_address_state;
    $residence_address_pincode = $studentApplicationInfo->residential_address_pincode;
}

if(!empty($parishPriestInfo)){
    if($caste == 'ROMAN CATHOLIC'){ 
        $priest_name = $parishPriestInfo->priest_name;
        $priest_mobile = $parishPriestInfo->mobile_number;
        $priest_doc_image = $parishPriestInfo->certificate_path;
    }else{
        $pastor_name = $parishPriestInfo->priest_name;
        $pastor_mobile = $parishPriestInfo->mobile_number;
        $pastor_doc_image = $parishPriestInfo->certificate_path;
    }
}

$dyslexia_challenged = "";
$physically_challenged="";
if(!empty($studentApplicationInfo)){
    $physically_challenged = $studentApplicationInfo->physically_challenged;
    $dyslexia_challenged = $studentApplicationInfo->dyslexia_challenged;
}

$physically = "";
$dyslexia = "";
if(!empty($documentInfo)){ 
    foreach($documentInfo as $doc){
        if($doc->doc_name == 'student_photo'){
            $student_profile = $doc->doc_path;
            $student_label = $doc->doc_name;
        }
        if($doc->doc_name == 'caste_certificates'){
            $caste_certificate = $doc->doc_path;
            $caste_label = $doc->doc_name;
        }
        if($doc->doc_name == 'physically_challenged_certificate'){
            $physically = $doc->doc_path;
            $physically_label = $doc->doc_name;
        }
        if($doc->doc_name == 'dyslexia_certificate'){
            $dyslexia = $doc->doc_path;
            $dyslexia_label = $doc->doc_name;
        }
    }
}
?>

<?php
    $this->load->helper('form');
?>

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
<style>
    .flex-container{
        display: flex;
        flex-direction: column;
    }
    .flex-container > span{
        font-weight: bold;
    }
    .flex-container > img{
        height: 150px;
        width: 100%;
        background: '#e2e2e2';                                                                            
        border: 1px solid #b5b3b3;
    }
    .flex-container > button{                                                                                    
        border: 1px solid #b5b3b3;
        border-radius: 0;
    }
</style>
<div class="main-content-container container-fluid px-2 mb-5">
    <div class="card card-small p-0  col-12">
        <div class="card-header p-2 card_head_dashboard">
            <span class="page-title">
                <div class="row font_color ">
                    <div class="col-sm-6">
                        Step : I <i class="fa fa-user"></i> Personal Details
                    </div>
                    <div class="col-sm-6 text-right">
                        <i class=""></i> Admission Form : <?=ADMISSION_YEAR?>
                    </div>
                </div>
            </span>
        </div>

        <form data-no_loader="true" id="saveStudentPersonalInfoForm" method="post" action="<?php echo base_url(); ?>saveStudentPersonalInfo" role="form" enctype="multipart/form-data">
            <div class="card-body m-1">
                <div class="row">
                    <div class="col-12 column_padding_card">
                        <div id="coverScreen" class="LockOn"></div>
                        <input type="hidden" value="<?php echo $sslcRegisterNumber; ?>" id="register_no" name="register_no"/>
                        <input type="hidden" value="<?php echo $application_number; ?>" id="application_no" name="application_no"/>
                        <div class="row">
                            <div class="col-lg-3 text-center"> 
                                <input type="hidden" value="student_photo" name="documentName[]"/>
                                <input type="hidden" value="<?php echo $student_profile; ?>"  id="studentProfile"/>
                                <?php if(!empty($student_profile)){ ?>
                                    <img src="<?php echo base_url(); ?><?php echo $student_profile; ?>" class="avatar img-thumbnail student_profile_image"
                                    alt="<?php echo $student_label; ?>" id="uploadedImage" style="border: 1px solid #d1d1d1;">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/dist/img/user.png" class="img-thumbnail student_profile_image"
                                    id="uploadedImage" alt="Student Image" style="border: 1px solid #d1d1d1;">
                                <?php } ?>
                                <div class="profileImg">
                                    <div class="file btn btn-primary py-1">
                                        <div id="studentLabel"></div>
                                        <input type="file" class="form-control-sm" id="vImg" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                    </div>
                                </div>
                                <span class="text-primary font-weight-bold">
                                    <span><a href="#" data-toggle="modal" data-target="#studentImage"><span class="badge badge-primary">Help <i class="far fa-question-circle" style="color: #fff;"></i></a></span>
                                </span>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-6">
                                        <div class="form-group "> 
                                           <label class="std_name mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input name="fname" id="fname" value="<?php echo $name; ?>" class="mdc-text-field__input text-uppercase" type="text" aria-labelledby="my-label-id"  maxlength="128" autocomplete="off" required>
                                              <span class="mdc-floating-label" id="my-label-id">Full Name (As per 10th standard records)</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-5 col-sm-6">
                                        <div class="form-group">
                                               <label class="dob mdc-text-field mdc-text-field--filled ">
                                                  <span class="mdc-text-field__ripple"></span>
                                                   <input name="dob" id="dob" value="<?php echo $dob; ?>" class="mdc-text-field__input datepicker" type="text" aria-labelledby="my-label-id" autocomplete="off">
                                                  <span class="mdc-floating-label" id="my-label-id">Date of Birth</span>
                                                  <span class="mdc-line-ripple"></span>
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="native_place mdc-text-field mdc-text-field--filled ">
                                                  <span class="mdc-text-field__ripple"></span>
                                                   <input name="native_place" id="native_place" onkeydown="return alphaOnly(event)" value="<?php echo $native_place; ?>" class="mdc-text-field__input" type="text" aria-labelledby="my-label-id" autocomplete="off" required>
                                                  <span class="mdc-floating-label" id="my-label-id">Native place</span>
                                                  <span class="mdc-line-ripple"></span>
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="gender mdc-text-field mdc-text-field--filled">
                                                  <span class="mdc-text-field__ripple"></span>
                                                   <input name="gender" id="gender" value="<?php echo $gender; ?>" class="mdc-text-field__input" type="text" aria-labelledby="my-label-id" autocomplete="off" required readonly>
                                                  <span class="mdc-floating-label" id="my-label-id">Admission only for Male Candidate</span>
                                                  <span class="mdc-line-ripple"></span>
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group"> 
                                            <label class="student_email mdc-text-field mdc-text-field--filled ">
                                                  <span class="mdc-text-field__ripple"></span>
                                                   <input name="student_email" id="student_email" value="<?php echo $student_email; ?>" class="mdc-text-field__input" type="text" aria-labelledby="my-label-id" autocomplete="off" required>
                                                  <span class="mdc-floating-label" id="my-label-id">Student Email</span>
                                                  <span class="mdc-line-ripple"></span>
                                                </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group"> 
                                            <label class="student_mobile mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input name="student_mobile" id="student_mobile" pattern="[0-9]*" value="<?php echo $student_mobile; ?>" class="mdc-text-field__input" type="tel" aria-labelledby="my-label-id" maxlength="10" minlength="10" autocomplete="off" onkeypress="return isNumber(event)" >
                                              <span class="mdc-floating-label" id="my-label-id">Student Mobile Number</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group"> 
                                    <div class="mdc-select mdc-select-nationality mdc-select--required">
                                      <div class="mdc-select__anchor" aria-required="true">
                                        <span class="mdc-select__ripple"></span>
                                        <input type="text"  class="mdc-select__selected-text" name="nationality" id="nationality" value="" required>
                                        <i class="mdc-select__dropdown-icon"></i>
                                        <span class="mdc-floating-label">Select Nationality</span>
                                        <span class="mdc-line-ripple"></span>
                                      </div>
                                      <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                        <ul class="mdc-list">
                                            <?php if(!empty($nationality)){ ?>
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $nationality; ?>" aria-selected="true"><?php echo $nationality; ?></li>
                                            <?php } ?>
                                            <?php if(!empty($nationalityInfo)){
                                                foreach($nationalityInfo as $nation){ ?>
                                                <li class="mdc-list-item" data-value="<?php echo $nation->name; ?>">
                                                    <span class="mdc-list-item__text">
                                                    <?php echo $nation->name; ?>
                                                    </span>
                                                </li>
                                            <?php } } ?>
                                        </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group"> 
                                     <div class="mdc-select mdc-select-religion mdc-select--required">
                                        <div class="mdc-select__anchor demo-width-class">
                                         <span class="mdc-select__ripple"></span>
                                         <input type="text"  class="mdc-select__selected-text" name="religion" id="religion" value="" required>
                                         <i class="mdc-select__dropdown-icon"></i>
                                         <span class="mdc-floating-label">Select Religion</span>
                                         <span class="mdc-line-ripple"></span>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                        <ul class="mdc-list">
                                            <?php if(!empty($religion)){ ?>
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $religion; ?>" aria-selected="true"><?php echo $religion; ?></li>
                                            <?php } ?>
                                            <?php if(!empty($religionInfo)){
                                                foreach($religionInfo as $religion){ ?>
                                                <li class="mdc-list-item" data-value="<?php echo $religion->name; ?>">
                                                    <span class="mdc-list-item__text">
                                                    <?php echo $religion->name; ?>
                                                    </span>
                                                </li>
                                            <?php } } ?>
                                            <li class="mdc-list-item" data-value="OTHER">
                                                <span class="mdc-list-item__text">OTHER</span>
                                            </li>
                                        </ul>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <div class="mdc-select mdc-select-caste mdc-select--required">
                                        <div class="mdc-select__anchor demo-width-class">
                                           <span class="mdc-select__ripple"></span>
                                           <input type="text"  class="mdc-select__selected-text" name="caste" id="caste" value="" required>
                                           <i class="mdc-select__dropdown-icon"></i>
                                           <span class="mdc-floating-label">Select Caste Category</span>
                                           <span class="mdc-line-ripple"></span>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                          <ul class="mdc-list">
                                                <?php if(!empty($caste)){ ?>
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $caste; ?>" aria-selected="true"><?php echo $caste; ?></li>
                                                <?php } ?>
                                                <?php if(!empty($casteInfo)){
                                                    foreach($casteInfo as $caste){ ?>
                                                    <li class="mdc-list-item" data-value="<?php echo $caste->name; ?>">
                                                        <span class="mdc-list-item__text">
                                                            <?php echo $caste->name; ?>
                                                        </span>
                                                    </li>
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group"> 
                                    <label class="sub_caste mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input name="sub_caste" id="sub_caste" onkeydown="return alphaOnly(event)" value="<?php echo $sub_caste; ?>" class="mdc-text-field__input" type="text" aria-labelledby="my-label-id" autocomplete="off">
                                      <span class="mdc-floating-label" id="my-label-id">Sub Caste</span>
                                      <span class="mdc-line-ripple"></span>
                                   </label>
                                </div>
                            </div> 
                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <div class="form-group other_nationality_text">
                                    <label class="other_nationality mdc-text-field mdc-text-field--filled ">
                                    <span class="mdc-text-field__ripple"></span>
                                     <input type="text"  name="other_nationality" onkeydown="return alphaOnly(event)" id="other_nationality" class="mdc-text-field__input" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                    <span class="mdc-floating-label" id="my-label-id">TYPE YOUR NATIONALITY</span>
                                    <span class="mdc-line-ripple"></span>
                                  </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <div class="form-group other_religion_text">
                                    <label class="other_religion_text mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text"  name="other_religion_text" onkeydown="return alphaOnly(event)" id="other_religion_text" class="mdc-text-field__input" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                      <span class="mdc-floating-label" id="my-label-id">TYPE YOUR RELIGION</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-3">
                                <div class="form-group other_caste_text">
                                    <label class="other_caste_text mdc-text-field mdc-text-field--filled ">
                                    <span class="mdc-text-field__ripple"></span>
                                     <input type="text"  name="other_caste_text" onkeydown="return alphaOnly(event)" id="other_caste_text" class="mdc-text-field__input" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                    <span class="mdc-floating-label" id="my-label-id">TYPE YOUR CASTE</span>
                                    <span class="mdc-line-ripple"></span>
                                  </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <div class="mdc-select mdc-select-blood">
                                        <div class="mdc-select__anchor demo-width-class">
                                            <span class="mdc-select__ripple"></span>
                                            <input type="text" class="mdc-select__selected-text" name="blood_group" value="" data-live-search="true" id="blood_group" >
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <span class="mdc-floating-label">Blood Group</span>
                                            <span class="mdc-line-ripple"></span>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                          <ul class="mdc-list">
                                          <?php if(!empty($blood_group)){ ?>
                                            <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $blood_group; ?>" aria-selected="true"><?php echo $blood_group; ?></li>
                                            <?php } ?>
                                            <li class="mdc-list-item" data-value="" selected hidden>
                                                 <span class="mdc-list-item__text">
                                                Select Blood Group
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="A+">
                                              <span class="mdc-list-item__text">
                                                A+
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="B+">
                                              <span class="mdc-list-item__text">
                                                B+
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="B-">
                                              <span class="mdc-list-item__text">
                                                B-
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="AB+">
                                              <span class="mdc-list-item__text">
                                                AB+
                                              </span>
                                            </li>
                                             <li class="mdc-list-item" data-value="AB-">
                                              <span class="mdc-list-item__text">
                                                AB-
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="O+">
                                              <span class="mdc-list-item__text">
                                                O-
                                              </span>
                                            </li>
                                            <li class="mdc-list-item" data-value="O+">
                                              <span class="mdc-list-item__text">
                                                O+
                                              </span>
                                            </li>
                                          </ul>
                                      </div>
                                     </div>
                                </div>  
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="form-group">
                                    <label class="mother_tongue mdc-text-field mdc-text-field--filled ">
                                    <span class="mdc-text-field__ripple"></span>
                                     <input name="mother_tongue" id="mother_tongue" onkeydown="return alphaOnly(event)" value="<?php echo $mother_tongue;?>" class="mdc-text-field__input" type="text" aria-labelledby="my-label-id" autocomplete="off" required>
                                    <span class="mdc-floating-label" id="my-label-id">Mother Tongue</span>
                                    <span class="mdc-line-ripple"></span>
                                 </label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 aadhar_text">
                                <div class="form-group">
                                    <label class="aadhar_no mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input name="aadhar_no" id="aadhar_no" pattern="[0-9]*" value="<?php echo $aadhar_no; ?>" class="mdc-text-field__input" type="tel" aria-labelledby="my-label-id"  maxlength="12" minlength="12" autocomplete="off" onkeypress="return isNumber(event)" >
                                      <span class="mdc-floating-label" id="my-label-id">Aadhaar Number</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <div class="mdc-select mdc-select-physically mdc-select--required">
                                        <div class="mdc-select__anchor demo-width-class">
                                            <span class="mdc-select__ripple"></span> 
                                            <input type="text" class="mdc-select__selected-text" name="physically_challenged" value="" data-live-search="true" id="physicallyChallenged" required>
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <span class="mdc-floating-label">Physically Challenged?</span>
                                            <span class="mdc-line-ripple"></span>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                            <ul class="mdc-list">
                                                <?php if(!empty($physically_challenged)){ ?>
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $physically_challenged; ?>" aria-selected="true"><?php echo $physically_challenged; ?></li>
                                                <?php } ?>
                                                <li class="mdc-list-item" data-value="" selected hidden>
                                                    <span class="mdc-list-item__text">Select Physically Challenged</span>
                                                </li>
                                                <li class="mdc-list-item" data-value="YES">
                                                    <span class="mdc-list-item__text">YES</span>
                                                </li>
                                                <li class="mdc-list-item" data-value="NO">
                                                    <span class="mdc-list-item__text">NO</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="form-group">
                                    <div class="mdc-select mdc-select-dyslexia mdc-select--required">
                                        <div class="mdc-select__anchor demo-width-class" aria-required=>
                                            <span class="mdc-select__ripple"></span>
                                            <input type="text" class="mdc-select__selected-text" name="dyslexia_challenged" value="" data-live-search="true" id="dyslexiaChallenged" required>
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <span class="mdc-floating-label">Dyslexic?</span>
                                            <span class="mdc-line-ripple"></span>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                            <ul class="mdc-list">
                                                <?php if(!empty($dyslexia_challenged)){ ?>
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $dyslexia_challenged; ?>" aria-selected="true"><?php echo $dyslexia_challenged; ?></li>
                                                <?php } ?>
                                                <li class="mdc-list-item" data-value="" selected hidden>
                                                    <span class="mdc-list-item__text">Select Dyslexic</span>
                                                </li>
                                                <li class="mdc-list-item" data-value="YES">
                                                    <span class="mdc-list-item__text">YES</span>
                                                </li>
                                                <li class="mdc-list-item" data-value="NO">
                                                    <span class="mdc-list-item__text">NO</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-2 phCertificate">
                                <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1 ">
                                    <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Upload Physically Challenged Certificate (PH)<span class="text-danger required_star">*</span> <span class="text-danger mb-0 font_14">(Note: Maximum File Size 200KB, File format: JPG, JPEG, PNG, PDF)</span>                 
                                    </div>    
                                </div> 
                                <div class="text-center mb-2">
                                    <?php if(!empty($physically)){ ?>
                                        <img src="<?php echo base_url(); ?><?php echo $physically; ?>" id="uploadedPhysicalImage" class="avatar img-thumbnail school_documents"
                                        alt="<?php echo $physically_label; ?>">
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>assets/dist/img/file_upload.png" id="uploadedPhysicalImage" class="avatar img-thumbnail school_documents"
                                        alt="Certificate">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="documentName[]" value="physically_challenged_certificate"/>
                                    <div class="profileImg text-center">
                                        <div class="file btn btn-sm btn-primary">
                                            <div id="ph_label"></div>
                                            <input type="file" class="form-control-sm" id="ph_certificate" name="userfile[]" accept=".pdf, image/png, image/jpeg, image/jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-2 dyslexiaCertificate">
                                <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1 ">
                                    <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Upload Dyslexia Certificate<span class="text-danger required_star">*</span> <span class="text-danger font_14">(Note: Maximum File Size 200KB, File format: JPG, JPEG, PNG, PDF)</span>
                                    </div>    
                                </div> 
                                <div class="text-center mb-2">
                                    <?php if(!empty($dyslexia)){ ?>
                                        <img src="<?php echo base_url(); ?><?php echo $dyslexia; ?>" id="uploadedDyslexiaImage" class="avatar img-thumbnail school_documents"
                                        alt="<?php echo $dyslexia_label; ?>">
                                    <?php }else{ ?>
                                        <img src="<?php echo base_url(); ?>assets/dist/img/file_upload.png" id="uploadedDyslexiaImage" class="avatar img-thumbnail school_documents"
                                        alt="Certificate">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="documentName[]" value="dyslexia_certificate"/>
                                    <div class="profileImg text-center">
                                        <div class="file btn btn-sm btn-primary">
                                            <div id="dyslexia"></div>
                                            <input type="file" class="form-control-sm" id="dyselxiaCertify" name="userfile[]" accept=".pdf, image/png, image/jpeg, image/jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>                     
                        </div>                        
                        <div class="roman_catholic">
                            <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1 ">
                                <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Parish Priest's Details 
                                <span class="float-right"><a href="#" title="Help <i class='far fa-question-circle'></i>" data-toggle="popover" data-content="I. Self-attested (by the student) scanned copy of- the email from the Parish Priest or hard copy of the letter may be uploaded. The details must include the applicant’s name and the name of the parents. <br/> II. Original copies of valid baptism certificate and Parish Priest’s letter must be produced during verification of documents."><span class="badge badge-primary">Help <i class="far fa-question-circle"></i></span></a></span>
                                </div>    
                            </div> 
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                         <label class="priest_name mdc-text-field mdc-text-field--filled ">
                                          <span class="mdc-text-field__ripple"></span>
                                           <input type="text"  name="priest_name" onkeydown="return alphaOnly(event)" id="priest_name" value="<?php echo $priest_name; ?>" class="mdc-text-field__input text-uppercase" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                          <span class="mdc-floating-label" id="my-label-id">Parish Priest's Name</span>
                                          <span class="mdc-line-ripple"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="form-group">  
                                        <label class="priest_mobile mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input name="priest_mobile" id="priest_mobile" pattern="[0-9]*" value="<?php echo $priest_mobile; ?>" class="mdc-text-field__input" type="tel" aria-labelledby="my-label-id"  maxlength="10" autocomplete="off" onkeypress="return isNumber(event)">
                                              <span class="mdc-floating-label" id="my-label-id">Parish Priest’s contact number</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="flex-container">
                                        <span>Upload Letter from Parish Priest /Baptism Certificate</span>
                                        <span class="text-danger">*
                                            <span class="text-danger" style="font-size: 13px;">(Note: Maximum File Size 200KB, File format: JPG, JPEG, PNG, PDF) </span>
                                        </span>
                                        <img src="<?=base_url().$priest_doc_image;?>"
                                            alt="
                                                <?php 
                                                    if(empty($priest_doc_image)) echo "Letter from Parish Priest /Baptism Certificate";
                                                    else{
                                                        $pathArr = explode('/', $priest_doc_image);
                                                        echo end($pathArr);
                                                    }
                                                ?>
                                            " 
                                            id="uploadedImage2"/>
                                        <input type="file" class="form-control-sm" id="doc_path" name="priest_file" 
                                            style="display: none" accept=".pdf,.jpeg,.jpg,.png">
                                        <button type="button" id="priestLabel" class="btn btn-primary" onclick="clickFileInput('#doc_path')">Upload</button>
                                    </div>
                                </div>  
                            </div>  
                        </div>             
                        
                        <div class="other_christian">
                            <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1">
                                <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Pastor/Parish Priest’s details 
                                <span class="float-right"><a href="#" title="Help <i class='far fa-question-circle'></i>" data-toggle="popover" data-content="I. Self-attested (by the student) scanned copy of- the email from the Pastor/Parish Priest or hard copy of the letter may be uploaded. The details must include the applicant’s name and the name of the parents. <br/> II. Original copies of valid baptism certificate and Pastor/Parish Priest’s letter must be produced during the verification of documents."><span class="badge badge-primary">Help <i class="far fa-question-circle"></i></span></a></span>
                                </div>    
                            </div> 
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="form-group mb-4">
                                        <label class="pastor_name mdc-text-field mdc-text-field--filled ">
                                            <span class="mdc-text-field__ripple"></span>
                                            <input type="text"  name="pastor_name" id="pastor_name" value="<?php echo $pastor_name; ?>" class="mdc-text-field__input text-uppercase" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                            <span class="mdc-floating-label" id="my-label-id">Pastor/Parish Priest’s Name</span>
                                            <span class="mdc-line-ripple"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="form-group">  
                                        <label class="pastor_mobile mdc-text-field mdc-text-field--filled">
                                            <span class="mdc-text-field__ripple"></span>
                                            <input name="pastor_mobile" id="pastor_mobile" pattern="[0-9]*" value="<?php echo $pastor_mobile; ?>" class="mdc-text-field__input" type="tel" aria-labelledby="my-label-id"  maxlength="10" autocomplete="off" onkeypress="return isNumber(event)">
                                            <span class="mdc-floating-label" id="my-label-id">Pastor/Parish Priest’s contact number</span>
                                            <span class="mdc-line-ripple"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="flex-container">
                                        <span>Upload Letter from Pastor/Parish Priest/Baptism Certificate</span>
                                        <span class="text-danger">*
                                            <span class="text-danger" style="font-size: 13px;">(Note: Maximum File Size 200KB, File format: JPG, JPEG, PNG, PDF) </span>
                                        </span>
                                        <img src="<?=base_url().$pastor_doc_image;?>"
                                            alt="
                                                <?php 
                                                    if(empty($pastor_doc_image)) echo "Letter from Pastor/Parish Priest/Baptism Certificate";
                                                    else{
                                                        $pathArr = explode('/', $pastor_doc_image);
                                                        echo end($pathArr);
                                                    }
                                                ?>
                                            " 
                                            id="uploadedImage3"/>
                                        <input type="file" class="form-control-sm" id="pastor_file" name="pastor_file" 
                                            style="display: none" accept=".pdf,.jpeg,.jpg,.png">
                                        <button type="button" id="pasterLabel" class="btn btn-primary" onclick="clickFileInput('#pastor_file')">Upload</button>
                                    </div>
                                </div>  
                            </div>  
                        </div>             

                        <div class="caste_category_certificate">
                            <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1 ">
                                <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Upload Caste/Category Certificate<span class="text-danger required_star">*</span> <span class="text-danger">(Note: Maximum File Size 200KB, File format: JPG, JPEG, PNG, PDF)</span>
                                <span class="float-right"><a href="#" title="Help <i class='far fa-question-circle'></i>" data-toggle="popover" data-content="I.Self-attested (by the student) scanned copy of valid Caste / Category certificate issued by the Government. <br/> II. If you have applied for a new certificate, Self-attested (by the student) scanned copy of acknowledgement obtained for submitting an application for caste/category certificate may be uploaded. <br/> III. Original copy of valid Caste / Category certificate must be produced during verification of documents."><span class="badge badge-primary">Help <i class="far fa-question-circle"></i></span></a></span>
                                </div>    
                            </div> 
                            <div class="row">
                                <div class="mx-auto">   
                                    <?php if(!empty($caste_certificate)){ 
                                        $ext = pathinfo($caste_certificate, PATHINFO_EXTENSION);
                                        if($ext == 'pdf'){ 
                                    ?>
                                            <div class="text-center">
                                            <a href="<?php echo base_url(); ?><?php echo $caste_certificate; ?>" target="_blank" style="font-size: 18px !important;" class="badge badge-pill badge-primary">View</a>
                                            </div>
                                        <?php }else{ ?>
                                            <img src="<?php echo base_url(); ?><?php echo $caste_certificate; ?>" id="uploadedImage1" class="avatar img-thumbnail upload_doc_images"
                                            alt="<?php echo $caste_label; ?>">
                                    <?php } }else{ ?>
                                        <img src="<?php echo base_url(); ?>assets/dist/img/file_upload.png" id="uploadedImage1" class="avatar img-thumbnail upload_doc_images"
                                        alt="Certificate">
                                    <?php } ?>
                                    <input type="hidden" value="caste_certificates" name="documentName[]"/>
                                    <div class="form-group mt-1">
                                        <div class="profileImg w-100">
                                            <div class="file btn btn-block btn-primary w-100">
                                                <div id="casteLabel"></div>
                                                <input type="file" class="form-control-sm" id="caste_certificate" name="userfile[]" accept=".pdf,.jpeg,.jpg,.png" >
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>  
                        </div>

                        
                        <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-1 mb-1">
                            <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Family Details</div>    
                        </div> 
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="form-group mb-4">
                                   <label class="father_name mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="father_name" id="father_name" value="<?php echo $father_name; ?>" class="mdc-text-field__input text-uppercase" maxlength="128" aria-labelledby="my-label-id" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Father's Name</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="form-group"> 
                                     <label class="father_qualification mdc-text-field mdc-text-field--filled ">
                                        <span class="mdc-text-field__ripple"></span>
                                         <input type="text" name="father_qualification" id="father_qualification" value="<?php echo $father_qualification; ?>" class="mdc-text-field__input text-uppercase" onkeydown="return alphaOnly(event)" aria-labelledby="my-label-id" autocomplete="off" required>
                                        <span class="mdc-floating-label" id="my-label-id">Father's Qualification</span>
                                        <span class="mdc-line-ripple"></span>
                                      </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="form-group"> 

                                    <label class="father_profession mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="father_profession" id="father_profession" value="<?php echo $father_profession; ?>" class="mdc-text-field__input" aria-labelledby="my-label-id" onkeydown="return alphaOnly(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Father's Occupation</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <div class="form-group">
                                    <label class="father_age mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="tel" pattern="[0-9]*" name="father_age" id="father_age" value="<?php echo $father_age; ?>" class="mdc-text-field__input" maxlength="3" aria-labelledby="my-label-id" onkeypress="return isNumber(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Father's Age</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="form-group"> 
                                    <label class="mother_name mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="mother_name" id="mother_name" value="<?php echo $mother_name; ?>" class="mdc-text-field__input text-uppercase" maxlength="128" aria-labelledby="my-label-id" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Name</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="form-group"> 
                                     <label class="mother_qualification mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="mother_qualification" id="mother_qualification" value="<?php echo $mother_qualification; ?>" class="mdc-text-field__input text-uppercase" aria-labelledby="my-label-id" onkeydown="return alphaOnly(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Qualification</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label class="mother_profession mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="mother_profession" id="mother_profession" value="<?php echo $mother_profession; ?>" class="mdc-text-field__input" aria-labelledby="my-label-id" onkeydown="return alphaOnly(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Occupation</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <div class="form-group"> 
                                    <label class="mother_age mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="tel" pattern="[0-9]*" name="mother_age" id="mother_age" value="<?php echo $mother_age; ?>" class="mdc-text-field__input" maxlength="3" aria-labelledby="my-label-id" onkeypress="return isNumber(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Age</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">  
                                    <label class="father_mobile mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="tel" pattern="[0-9]*" name="father_mobile" id="father_mobile" value="<?php echo $father_mobile; ?>" class="mdc-text-field__input" maxlength="10" minlength="10" aria-labelledby="my-label-id" onkeypress="return isNumber(event)" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Father's Mobile Number</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                     <label class="mother_mobile mdc-text-field mdc-text-field--filled ">
                                        <span class="mdc-text-field__ripple"></span>
                                         <input type="tel" pattern="[0-9]*" name="mother_mobile" id="mother_mobile" value="<?php echo $mother_mobile; ?>" class="mdc-text-field__input" maxlength="10" minlength="10" aria-labelledby="my-label-id" onkeypress="return isNumber(event)" autocomplete="off" required>
                                        <span class="mdc-floating-label" id="my-label-id">Mother's Mobile Number</span>
                                        <span class="mdc-line-ripple"></span>
                                      </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="father_email mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="email" name="father_email" id="father_email" value="<?php echo $father_email; ?>" class="mdc-text-field__input" maxlength="125" aria-labelledby="my-label-id" autocomplete="off">
                                      <span class="mdc-floating-label" id="my-label-id">Father's Email Id</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                     <label class="mother_email mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="email" name="mother_email" id="mother_email" value="<?php echo $mother_email; ?>" class="mdc-text-field__input" maxlength="125" aria-labelledby="my-label-id" autocomplete="off">
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Email Id</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group"> 
                                    <label class="father_annual_income mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="father_annual_income" id="father_annual_income" onkeypress="return isNumber(event)" value="<?php echo $father_annual_income; ?>" class="mdc-text-field__input" aria-labelledby="my-label-id" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Father's Annual Income</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>                                    
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="mother_annual_income mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text" name="mother_annual_income" id="mother_annual_income" onkeypress="return isNumber(event)" value="<?php echo $mother_annual_income; ?>" class="mdc-text-field__input" aria-labelledby="my-label-id" autocomplete="off" required>
                                      <span class="mdc-floating-label" id="my-label-id">Mother's Annual Income</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                        </div> 
  
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-0">
                                    <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Permanent Address</div>    
                                </div> 
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group mb-0">
                                            <label class="permanent_address_line_1 mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $permanent_address_line_1; ?>" id="permanent_address_line_1" class="mdc-text-field__input" type="text" name="permanent_address_line_1" placeholder="Flat No., House No., Building, Apartment" autocomplete="off" maxlength="150" required>
                                              <span class="mdc-floating-label" id="my-label-id">Address Line 1</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>    
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                             <label class="permanent_address_line_2 mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $permanent_address_line_2; ?>" id="permanent_address_line_2" class="mdc-text-field__input" type="text" name="permanent_address_line_2" placeholder="Area, Colony, Street" autocomplete="off" maxlength="150" required>
                                              <span class="mdc-floating-label" id="my-label-id">Address Line 2</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>   
                                </div>
                                <div class="row">  
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="form-group">
                                           <div class="mdc-select mdc-select-permanentAddressState mdc-select--required">
                                                <div class="mdc-select__anchor demo-width-class" aria-required="true">
                                                 <span class="mdc-select__ripple"></span>
                                                 <input type="text"  class="mdc-select__selected-text" name="permanent_address_state" id="permanent_address_state" value="" required>
                                                 <i class="mdc-select__dropdown-icon"></i>
                                                 <span class="mdc-floating-label">Select State</span>
                                                 <span class="mdc-line-ripple"></span>
                                                </div>
                                                <div class="mdc-select__menu mdc-menu mdc-menu-surface demo-width-class">
                                                <ul class="mdc-list">
                                                    <?php if(!empty($permanent_address_state)){ ?>
                                                        <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $permanent_address_state; ?>" aria-selected="true"><?php echo $permanent_address_state; ?></li>
                                                    <?php } ?>
                                                    <?php if(!empty($stateInfo)){
                                                        foreach($stateInfo as $state){ ?>
                                                        <li class="mdc-list-item" data-value="<?php echo $state->state; ?>">
                                                            <span class="mdc-list-item__text">
                                                                <?php echo $state->state; ?>
                                                            </span>
                                                        </li>
                                                    <?php } } ?>
                                                </ul>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>    
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="permanent_address_district mdc-text-field mdc-text-field--filled">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $permanent_address_district; ?>" onkeydown="return alphaOnly(event)" id="permanent_address_district" class="mdc-text-field__input" type="text" name="permanent_address_district" placeholder="District" autocomplete="off" required>
                                              <span class="mdc-floating-label" id="my-label-id">District</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>  
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label class="permanent_address_pincode mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $permanent_address_pincode; ?>" id="permanent_address_pincode" class="mdc-text-field__input" type="tel" pattern="[0-9]*" name="permanent_address_pincode" placeholder="Pincode" autocomplete="off" onkeypress="return isNumber(event)" maxlength="6" required>
                                              <span class="mdc-floating-label" id="my-label-id">Pincode</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1">
                                    <div class="card-header text-left inside_color pt-3 pb-3 ml-0">
                                        <span>Residential Address</span> 
                                        <span class="float-right"><input type="checkbox" value="" name="filladdress" id="filladdress" onclick="fillAddress()" /> <span class="pl-1">Same as Permanent Address</span></span>
                                    </div>    
                                </div> 
                                <div class="row"> 
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group"> 
                                             <label class="residence_address_line_1 mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $residence_address_line_1; ?>" id="residence_address_line_1" class="mdc-text-field__input" type="text" name="residence_address_line_1" placeholder="Flat No., House No., Building, Apartment" autocomplete="off" required maxlength="150">
                                              <span id="my-label-id residency_add_line1" class="mdc-floating-label">Address Line 1</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group"> 
                                            <label class="residence_address_line_2 mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $residence_address_line_2; ?>" id="residence_address_line_2" class="mdc-text-field__input" type="text" name="residence_address_line_2" placeholder="Area, Colony, Street" autocomplete="off" required maxlength="150">
                                              <span class="mdc-floating-label" id="my-label-id">Address Line 2</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <div class="form-group"> 
                                             <div class="mdc-select mdc-select-residenceAddressState mdc-select--required">
                                                <div class="mdc-select__anchor" aria-required="true">
                                                 <span class="mdc-select__ripple"></span>
                                                 <input type="text" class="mdc-select__selected-text" name="residence_address_state" id="residence_address_state" value="" required>
                                                 <i class="mdc-select__dropdown-icon"></i>
                                                 <span class="mdc-floating-label">Select State</span>
                                                 <span class="mdc-line-ripple"></span>
                                                </div>
                                                <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <?php if(!empty($residence_address_state)){ ?>
                                                        <li class="mdc-list-item mdc-list-item--selected" data-value="<?php echo $residence_address_state; ?>"><?php echo $residence_address_state; ?></li>
                                                    <?php } ?>
                                                    <?php if(!empty($stateInfo)){
                                                        foreach($stateInfo as $state){ ?>
                                                        <li class="mdc-list-item" data-value="<?php echo $state->state; ?>">
                                                            <span class="mdc-list-item__text" selected>
                                                                <?php echo $state->state; ?>
                                                            </span>
                                                        </li>
                                                    <?php } } ?>
                                                </ul>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="form-group"> 
                                             <label class="residence_address_district mdc-text-field mdc-text-field--filled">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $residence_address_district; ?>" onkeydown="return alphaOnly(event)" id="residence_address_district" class="mdc-text-field__input" type="text" name="residence_address_district" placeholder="District" autocomplete="off" required>
                                              <span class="mdc-floating-label" id="my-label-id">District</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="form-group"> 
                                            <label class="residence_address_pincode mdc-text-field mdc-text-field--filled ">
                                              <span class="mdc-text-field__ripple"></span>
                                               <input value="<?php echo $residence_address_pincode; ?>" id="residence_address_pincode" pattern="[0-9]*" class="mdc-text-field__input" type="tel" name="residence_address_pincode" placeholder="Pincode" autocomplete="off" onkeypress="return isNumber(event)" maxlength="6" required>
                                              <span class="mdc-floating-label" id="my-label-id">Pincode</span>
                                              <span class="mdc-line-ripple"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card col-12 field_color shadow-none  pl-0 pr-0 mt-3 mb-1">
                            <div class="card-header text-left inside_color pt-3 pb-3 ml-0">Local Guardian's Details (if applicable only)</div>    
                        </div> 
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="guardian_name mdc-text-field mdc-text-field--filled ">
                                      <span class="mdc-text-field__ripple"></span>
                                       <input type="text"  name="guardian_name" onkeydown="return alphaOnly(event)" id="guardian_name" value="<?php echo $guardian_name; ?>" class="mdc-text-field__input" maxlength="128" aria-labelledby="my-label-id" autocomplete="off">
                                      <span class="mdc-floating-label" id="my-label-id">Guardian's Name</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>  
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="guardian_mobile mdc-text-field mdc-text-field--filled ">
                                        <span class="mdc-text-field__ripple"></span>
                                         <input type="tel" pattern="[0-9]*" name="guardian_mobile" id="guardian_mobile" value="<?php echo $guardian_mobile; ?>" class="mdc-text-field__input" maxlength="10" minlength="10" aria-labelledby="my-label-id" onkeypress="return isNumber(event)" autocomplete="off">
                                        <span class="mdc-floating-label" id="my-label-id">Guardian's Mobile Number</span>
                                        <span class="mdc-line-ripple"></span>
                                      </label>
                                </div>
                            </div>       
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group"> 
                                    <label class="guardian_address mdc-text-field mdc-text-field--filled mdc-textfield--multiline">
                                      <span class="mdc-text-field__ripple"></span>
                                      <textarea id="guardian_address" title="Guardian's Address" class="mdc-text-field__input" rows="6" cols="10" name="guardian_address" autocomplete="off"><?php echo $guardian_address; ?></textarea>
                                      <span class="mdc-floating-label" id="my-label-id">Guardian's Address</span>
                                      <span class="mdc-line-ripple"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>     
            </div>

            <div class="card-footer card_head_dashboard p-2">
                <div class="row ">
                    <div class="col-12 text-right button-right">
                        <button class="mdc-button mdc-button--raised text-right btn_success" type="submit" id="nextBtn">
                            <span class="mdc-button__label">Next </span>
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>       
    </div>
</div>     

<div class="modal" id="studentImage">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Student Profile Photo Help <i class="far fa-question-circle"></i></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ul>
                    <li>Maximum file size 200 KB</li>
                    <li>Scanned copy of latest passport size photograph in formal attire.</li>
                    <li>Mobile selfie are not allowed.</li>
                </ul>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
            
    

<script type="text/javascript">
    const dyslexia = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-dyslexia'));
    const physically = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-physically'));

    dyslexia.listen('MDCSelect:change', () => {
        if(dyslexia.value == "YES"){
            $('.dyslexiaCertificate').show();
            $('#dyselxiaCertify').prop('required',true);
            $('#dyslexia').html("Upload");
        }else{
            $('.dyslexiaCertificate').hide();  
            $('#dyselxiaCertify').prop('required',false);
        }
    });

    physically.listen('MDCSelect:change', () => {
        if(physically.value == "YES"){
            $('.phCertificate').show();
            $('#ph_certificate').prop('required',true);
            $('#ph_label').html("Upload");
        }else{
            $('.phCertificate').hide();  
            $('#ph_certificate').prop('required',false);
        }
    });

    mdc.textField.MDCTextField.attachTo(document.querySelector('.std_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.dob'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.native_place'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.gender'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.student_email'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.student_mobile'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.other_nationality'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.other_religion_text'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.other_caste_text'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.sub_caste'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_tongue'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.aadhar_no'));

    mdc.textField.MDCTextField.attachTo(document.querySelector('.priest_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.priest_mobile'));

    mdc.textField.MDCTextField.attachTo(document.querySelector('.pastor_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.pastor_mobile'));

    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_profession'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_profession'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_qualification'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_qualification'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_age'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_age'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_mobile'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_mobile'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_email'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_email'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.father_annual_income'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.mother_annual_income'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.permanent_address_line_1'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.permanent_address_line_2'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.permanent_address_district')); 
    mdc.textField.MDCTextField.attachTo(document.querySelector('.permanent_address_pincode')); 
    const residence_address_line_1 = mdc.textField.MDCTextField.attachTo(document.querySelector('.residence_address_line_1'));
    const residence_address_line_2 = mdc.textField.MDCTextField.attachTo(document.querySelector('.residence_address_line_2'));
    const residence_address_pincode = mdc.textField.MDCTextField.attachTo(document.querySelector('.residence_address_pincode')); 
    const residence_address_district = mdc.textField.MDCTextField.attachTo(document.querySelector('.residence_address_district')) 
    mdc.textField.MDCTextField.attachTo(document.querySelector('.guardian_name'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.guardian_mobile'));
    mdc.textField.MDCTextField.attachTo(document.querySelector('.guardian_address'));

    const nation = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-nationality'));
    const religion = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-religion'));
    const caste = mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-caste'));
    
    mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-blood'));
    mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-permanentAddressState'));
    mdc.select.MDCSelect.attachTo(document.querySelector('.mdc-select-residenceAddressState')); 

    nation.listen('MDCSelect:change', () => {
        if(nation.value == "OTHER"){
            $('.other_nationality_text').show();
        }else{
            $('.other_nationality_text').hide();  
        }

         if(nation.value == "INDIAN"){
            $('.aadhar_text').show();
            $('#aadhar_no').prop('required',true);
        }else{
            $('.aadhar_text').hide();  
            $('#aadhar_no').prop('required',false);
        }
    });

    religion.listen('MDCSelect:change', () => {
        if(religion.value == "OTHER"){
            $('.other_religion_text').show();
        }else{
            $('.other_religion_text').hide();  
        }
    });

    caste.listen('MDCSelect:change', () => {
        if(caste.value == "OTHER"){
            $('.other_caste_text').show();
        }else{
            $('.other_caste_text').hide();  
        }

         if(caste.value == "ROMAN CATHOLIC"){
            $('.roman_catholic').show();
            $('#priest_name').prop('required',true);
            $('#priest_mobile').prop('required',true);
             $('#doc_path').prop('required',true);
            $('#priestLabel').html("Upload");
            $('#pastor_name').val('');
            $('#pastor_mobile').val('');
            $('#pastor_file').val('');
        }else{
            $('.roman_catholic').hide();  
            $('#priest_name').prop('required',false);
            $('#priest_mobile').prop('required',false);
             $('#doc_path').prop('required',false);
            $('#priestLabel').html("Upload");
        }

        if(caste.value == "OTHER CHRISTIANS"){
            $('.other_christian').show();
            $('#pastor_name').prop('required',true);
            $('#pastor_mobile').prop('required',true);
            $('#pastor_file').prop('required',true);
            $('#pasterLabel').html("Upload");
            $('#priest_name').val('');
            $('#priest_mobile').val('');
            $('#doc_path').val('');
        }else{
            $('.other_christian').hide(); 
            $('#pastor_name').prop('required',false);
            $('#pastor_mobile').prop('required',false);
             $('#pastor_file').prop('required',false); 
            $('#pasterLabel').html("Upload");
        }

        if(caste.value == "2A" || caste.value == "2B" || caste.value == "3A" || caste.value == "3B" || 
            caste.value == "CAT-I" || caste.value == "SC" || caste.value == "ST"){
            $('.caste_category_certificate').show();
            $('#caste_certificate').prop('required',true);
            $('#casteLabel').html("Upload");
        }else{
            $('.caste_category_certificate').hide();
            $('#caste_certificate').prop('required',false); 
            $('#casteLabel').html("Upload"); 
        }

    });
    jQuery(document).ready(function(){
        var dyslexia = $('#dyslexiaChallenged').val();
        if(dyslexia == "YES"){
            $('.dyslexiaCertificate').show(); 
            $('#dyslexia').html("Change");
        }else{
            $('.dyslexiaCertificate').hide();
            $('#dyslexia').html("Change");
        }       

        var physically = $('#physicallyChallenged').val();
        if(physically == "YES"){
            $('.phCertificate').show(); 
            $('#ph_label').html("Change");
        }else{
            $('.phCertificate').hide();
        }

        var permanentAddressLine_1 = $("#permanent_address_line_1").val();
        var permanentAddressLine_2 = $("#permanent_address_line_2").val();
        var permanentState = $("#permanent_address_state").val();
        var permanentDistrict = $("#permanent_address_district").val();
        var permanentPincode = $("#permanent_address_pincode").val();
         
        var residenceAddressLine_1 = $("#residence_address_line_1").val();
        var residenceAddressLine_2 = $("#residence_address_line_2").val();
        var residenceState = $("#residence_address_state").val();
        var residenceDistrict = $("#residence_address_district").val();
        var residencePincode = $("#residence_address_pincode").val();

        if(permanentAddressLine_1 == "" || residenceAddressLine_1 == ""){
            $('#filladdress').attr('checked',false); 
        }else if(permanentAddressLine_1 == residenceAddressLine_1 && permanentAddressLine_2 == residenceAddressLine_2 
        && permanentState == residenceState && permanentDistrict == residenceDistrict && permanentPincode == residencePincode){
            $('#filladdress').attr('checked',true); 
        }else{
            $('#filladdress').attr('checked',false); 
        }

        // $('[data-toggle="popover"]').popover();  
        $('[data-toggle="popover"]').popover( { "container":"body", "trigger":"focus", "html":true });
        $('[data-toggle="popover"]').mouseenter(function(){
            $(this).trigger('focus');
        });

        $("#nextBtn").click(function () {
            $("#icons").css('color', '#008000');
        });

        $('.other_nationality_text').hide();
        $('.other_religion_text').hide();
        $('.other_caste_text').hide();
        $('.caste_category_certificate').hide();

        var caste_name = $('#caste').val();
        if(caste_name == "ROMAN CATHOLIC"){
            $('.roman_catholic').show(); 
            $('#priestLabel').html("Change");
        }else{
            $('.roman_catholic').hide(); 
        }

        if(caste_name == "OTHER CHRISTIANS"){
            $('.other_christian').show();
            $('#pasterLabel').html("Change");
        }else{
            $('.other_christian').hide(); 
        }

        if(caste_name == "2A" || caste_name == "2B" || caste_name == "3A" || caste_name == "3B" || 
            caste_name == "CAT-I" || caste_name == "SC" || caste_name == "ST"){
            $('.caste_category_certificate').show();
            $('#casteLabel').html("Change");
        }else{
            $('.caste_category_certificate').hide();
            $('#casteLabel').html("Change"); 
        }

        var nationality_name = $('#nationality').val();
        if(nationality_name == "INDIAN"){
            $('.aadhar_text').show(); 
            $('#aadhar_no').prop('required',true);
        }else{
            $('.aadhar_text').hide(); 
            $('#aadhar_no').prop('required',false);
        }
        
        var studentProfile = $('#studentProfile').val();
        if(studentProfile == ""){
            $('#studentLabel').html("Upload");
            $('#vImg').prop('required',true);
        }else{
            $('#studentLabel').html("Change");
            $('#vImg').prop('required',false);
        }

        $(".datepicker").datepicker({
            format: 'dd-mm-yyyy',
            changeMonth: true,
            changeYear: true,
            autoclose: true,
            startDate: '01-01-1999',
            endDate: '31-12-2017',
            constrainInput: false
        });

        $.ajax({
            url: '<?php echo base_url(); ?>/getFormInformation',
            type: 'POST',
            data: { },
            success: function(data) {
                //var examObject = JSON.stringify(data.caste)
                var count = data.caste.length;
                for(var i=0; i<count; i++){
                    $("#caste").append(new Option(data.caste[i].name, data.caste[i].name));
                }
                
                var count = data.nationality.length;
                for(var i=0; i<count; i++){
                    $("#nationality").append(new Option(data.nationality[i].name, data.nationality[i].name));
                }
                var count = data.religion.length;
                for(var i=0; i<count; i++){
                    $("#religion").append(new Option(data.religion[i].name, data.religion[i].name));
                }
                $("#religion").append(new Option("OTHER", "OTHER"));
            },
        });
        

        
        $("#fname").keypress(function(event){
            var inputValue = event.charCode;
            if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
                event.preventDefault();
            }
        });
        $("#mother_name").keypress(function(event){
            var inputValue = event.charCode;
            if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
                event.preventDefault();
            }
        });
        $("#father_name").keypress(function(event){
            var inputValue = event.charCode;
            if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
                event.preventDefault();
            }
        });

        $("#subCaste").keypress(function(event){
            var inputValue = event.charCode;
            if(!((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123)||(inputValue==32) || (inputValue==0))){
                event.preventDefault();
            }
        });

    });
    const changeMDCLabel = ({ focus })=>{
        if(focus){
            residence_address_line_1.label_.root_.className += ' mdc-floating-label--float-above';
            residence_address_line_2.label_.root_.className += ' mdc-floating-label--float-above';
            residence_address_district.label_.root_.className += ' mdc-floating-label--float-above';
            residence_address_pincode.label_.root_.className += ' mdc-floating-label--float-above';
        }
    }
function fillAddress(){
    if (filladdress.checked == true) {
        var permanent_address_line_1 = $("#permanent_address_line_1").val();
        var permanent_address_line_2 = $("#permanent_address_line_2").val();
        var permanent_address_state = $("#permanent_address_state").val();
        var permanent_address_district = $("#permanent_address_district").val();
        var permanent_address_pincode = $("#permanent_address_pincode").val();

        $("#residence_address_line_1").val(permanent_address_line_1);
        if(residence_address_line_1.value) residence_address_line_1.valid = true;
        else{
            residence_address_line_1.valid = false;
            residence_address_line_1.focus();
        }

        $("#residence_address_line_2").val(permanent_address_line_2);
        if(residence_address_line_2.value) residence_address_line_2.valid = true;
        else{
            residence_address_line_2.valid = false;
            residence_address_line_2.focus();
        }

        $("#residence_address_state").val(permanent_address_state).attr('selected', true);
        $('residence_address_state').text(permanent_address_state);

        $("#residence_address_district").val(permanent_address_district);
        if(residence_address_district.value) residence_address_district.valid = true;
        else{
            residence_address_district.valid = false;
            residence_address_district.focus();
        }

        $("#residence_address_pincode").val(permanent_address_pincode); 
        if(residence_address_pincode.value) residence_address_pincode.valid = true;
        else{
            residence_address_pincode.valid = false;
            residence_address_pincode.focus();     
        }
        changeMDCLabel({focus: true});
    }else {
        $("#residence_address_line_1").val('');
        $("#residence_address_line_2").val('');
        $("#residence_address_state").val('');           
        $("#residence_address_district").val('');           
        $("#residence_address_pincode").val('');           
    }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
</script>

<script>
    const clickFileInput = element =>{
        $(element).click();
    }

    const MAX_FILE_SIZE = 200; //in KB

    const readFileURL = (input, maxSize)=>{
        return new Promise((resolve, reject)=>{
            try{
                if(input.files && input.files[0]) {
                    if(bytesToKB(input.files[0].size) > maxSize){
                        reject('SIZE_ERROR');
                    }else{
                        var reader = new FileReader();
                        reader.onload = function(evt) {
                            resolve(evt.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }else throw '404_ERROR';
            }catch(err){
                reject(err);
            }
        });
    }

    $("#doc_path").change(async function() {
        const { name, type }  = this.files[0];
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            if(type.startsWith('image/')){
                $('#uploadedImage2').attr('src', result);
            }else{
                $('#uploadedImage2').attr('src', result);
                $('#uploadedImage2').attr('alt', name);
            }
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedImage2').attr('src', '');
            $('#uploadedImage2').attr('alt', 'Letter from Parish Priest /Baptism Certificate');
        }
    });
    $("#pastor_file").change(async function() {
        const { name, type }  = this.files[0];
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            if(type.startsWith('image/')){
                $('#uploadedImage3').attr('src', result);
            }else{
                $('#uploadedImage3').attr('src', result);
                $('#uploadedImage3').attr('alt', name);
            }
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedImage3').attr('src', '');
            $('#uploadedImage3').attr('alt', 'Letter from Pastor/Parish Priest/Baptism Certificate');
        }
    });

    $("#vImg").change(async function() {
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            $('#uploadedImage').attr('src', result);                                                
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedImage').attr('src', '');
            $('#uploadedImage').attr('alt', 'Upload Student Profile Photo');
        }
    });
    $("#caste_certificate").change(async function() {
        const { name, type }  = this.files[0];
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            if(type.startsWith('image/')){
                $('#uploadedImage1').attr('src', result);
            }else{
                $('#uploadedImage1').attr('src', result);
                $('#uploadedImage1').attr('alt', name);
            }
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedImage1').attr('src', '');
            $('#uploadedImage1').attr('alt', 'Upload caste certificate');
        }
    });
    $("#ph_certificate").change(async function() {
        const { name, type }  = this.files[0];
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            if(type.startsWith('image/')){
                $('#uploadedPhysicalImage').attr('src', result);
            }else{
                $('#uploadedPhysicalImage').attr('src', result);
                $('#uploadedPhysicalImage').attr('alt', name);
            }
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedPhysicalImage').attr('src', '');
            $('#uploadedPhysicalImage').attr('alt', 'Upload  Physically Challenged Certificate');
        }
    });
    $("#dyselxiaCertify").change(async function() {
        const { name, type }  = this.files[0];
        try{
            const result = await readFileURL(this, MAX_FILE_SIZE);
            if(type.startsWith('image/')){
                $('#uploadedDyslexiaImage').attr('src', result);
            }else{
                $('#uploadedDyslexiaImage').attr('src', result);
                $('#uploadedDyslexiaImage').attr('alt', name);
            }
        }catch(err){
            console.log('Error:', err);
            if(err === 'SIZE_ERROR'){
                showErrorAlert(
                    'The file you are attempting to upload is larger than the permitted size ('+ MAX_FILE_SIZE +' KB)',
                    'Please upload again..!'
                );
            }else showErrorAlert();
            $(this).val("");
            $('#uploadedDyslexiaImage').attr('src', '');
            $('#uploadedDyslexiaImage').attr('alt', 'Upload Dyslexia Certificate');
        }
    });
</script>
<script>
    $(document).ready(()=>{
        checkForReply("<?=$this->session->flashdata('success')?>","<?=$this->session->flashdata('error')?>");        
    });
    $("#saveStudentPersonalInfoForm").submit(evt=>{
        showLoader();      
        if(caste.value == "OTHER CHRISTIANS"){
            hideLoader();
            if($("#pastor_file").val() == ""){
                if($("#uploadedImage3").attr('src') == ""){
                    evt.preventDefault();
                    showWarningAlert('Please Upload Pastor/Parish Priest/Baptism Certificate');
                }
            }
        }else if(caste.value == "ROMAN CATHOLIC"){
            hideLoader();
            if($("#doc_path").val() == ""){
                if($("#uploadedImage2").attr('src') == ""){
                    evt.preventDefault();
                    showWarningAlert('Please Upload Parish Priest /Baptism Certificate');
                }
            }
        }
    });
</script>