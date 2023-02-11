<style>
.main-sidebar .nav #paymentDetail, .main-sidebar .nav #dashboard {
    display: none !important;
}
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
<?php 
$student_profile ="";
$student_sign = "";
$caste_certificate = "";
$sslc_mark_card = "";
$physically = "";
$dyslexia = "";
$sports_certificate = "";
$ncc_certificate = "";
$profile_img_name = "";
if(!empty($documentInfo)){ 
    foreach($documentInfo as $doc){
        $myFile = pathinfo($doc->doc_path); 
        $imageName = $myFile['basename']; 
        if($doc->doc_name == 'student_photo'){
            $student_profile = $doc->doc_path;
        }
        if($doc->doc_name == 'student_signature'){
            $student_sign = $doc->doc_path;
        }
        if($doc->doc_name == 'caste_certificates'){
            $caste_certificate = $doc->doc_path;
        }
        if($doc->doc_name == 'sslc_mark_card'){
            $sslc_mark_card = $doc->doc_path;
        }
        if($doc->doc_name == 'physically_challenged_certificate'){
            $physically = $doc->doc_path;
        }
        if($doc->doc_name == 'dyslexia_certificate'){
            $dyslexia = $doc->doc_path;
        }
        if($doc->doc_name == 'national_level_sports_certificate'){
            $sports_certificate = $doc->doc_path;
        }
        if($doc->doc_name == 'ncc_certificate'){
            $ncc_certificate = $doc->doc_path;
        }
    }
}
?>

<div class="main-content-container container-fluid px-2">
    <div class="card card-small p-0  col-12">
        <div class="card-header p-2 card_head_dashboard">
            <span class="page-title">
                <div class="row font_color ">
                    <div class="col-sm-6">
                        Step : IV <i class="fa fa-file"></i> Document
                    </div>
                    <div class="col-sm-6 text-right">
                        <i class=""></i> Admission Form : 2020
                    </div>
                </div>
            </span>
        </div>

        <form method="post" action="<?php echo base_url(); ?>saveCertificateInfo" role="form"  enctype="multipart/form-data">
            <div class="card-body p-2 m-1">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="student_photo"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">Student Photo
                                <span class="float-right"><a href="#" title="Help Guide" data-toggle="popover" data-trigger="focus" data-content="Some content"><i class="far fa-question-circle"></i></a></span>
                                </div>
                                <?php if(!empty($student_profile)){ ?>
                                    <input type="file" class="form-control-sm" id="vImg" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <?php }else{ ?>
                                    <input type="file" class="form-control-sm" id="vImg" name="userfile[]" accept="image/png, image/jpeg, image/jpg" required>
                                <?php } ?>
                                <label for="vImg" id="file-drag" class="my-0">
                                    <img id="uploadedImage_one" src="<?php echo base_url(); ?><?php echo $student_profile; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start" class="mb-0">
                                        <div>Select Student Image </div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="student_signature"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">Student Signature
                                <span class="float-right"><a href="#" title="Help Guide" data-toggle="popover" data-trigger="focus" data-content="Some content"><i class="far fa-question-circle"></i></a></span>
                                </div>
                                <input type="file" class="form-control-sm" id="vImg1" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg1" id="file-drag" class="my-0">
                                    <img id="uploadedImage_two" src="<?php echo base_url(); ?><?php echo $student_sign; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select Student Signature</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg1-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>  
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="caste_certificates"/>
                                <div class="card-header text-dark border-success table_row_backgrond mb-0">Caste/Income Certificates
                                <span class="float-right"><a href="#" title="Help Guide" data-toggle="popover" data-trigger="focus" data-content="Some content"><i class="far fa-question-circle"></i></a></span>
                                </div>
                                <input type="file" class="form-control-sm" id="vImg2" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg2" id="file-drag" class="my-0">
                                    <img id="uploadedImage_three" src="<?php echo base_url(); ?><?php echo $caste_certificate; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select Caste/Income Certificates</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg2-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>   
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="sslc_mark_card"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">10TH Mark Card</div>
                                <?php if(!empty($sslc_mark_card)){ ?>
                                    <input type="file" class="form-control-sm" id="vImg3" name="userfile[]" multiple accept="image/png, image/jpeg, image/jpg">
                                <?php }else{ ?>
                                    <input type="file" class="form-control-sm" id="vImg3" name="userfile[]" multiple required accept="image/png, image/jpeg, image/jpg">
                                <?php } ?>
                                <label for="vImg3" id="file-drag" class="my-0">
                                    <img id="uploadedImage_four" src="<?php echo base_url(); ?><?php echo $sslc_mark_card; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select SSLC Mark Card</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg3-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>  
                    <?php if($personalInfo->physically_challenged == 'YES'){ ?>
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="physically_challenged_certificate"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">Physically Challenged Certificate (PH)</div>
                                <input type="file" class="form-control-sm" id="vImg4" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg4" id="file-drag" class="my-0">
                                    <img id="uploadedImage_five" src="<?php echo base_url(); ?><?php echo $physically; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select Physically Challenged Certificate</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg4-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
                    <?php if($personalInfo->dyslexia_challenged == 'YES'){ ?>
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="dyslexia_certificate"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">Dyslexia Certificate</div>
                                <input type="file" class="form-control-sm" id="vImg5" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg5" id="file-drag" class="my-0">
                                    <img id="uploadedImage_six" src="<?php echo base_url(); ?><?php echo $dyslexia; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select Dyslexia Certificate</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg5-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
                    <?php if($admissionInfo->national_level_sports_status == 'YES'){ ?>
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="national_level_sports_certificate"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">National Level Sports Certificate</div>
                                <input type="file" class="form-control-sm" id="vImg6" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg6" id="file-drag" class="my-0">
                                    <img id="uploadedImage_seven" src="<?php echo base_url(); ?><?php echo $sports_certificate; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select National Level Sports Certificate</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg6-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
                    <?php if($admissionInfo->ncc_certificate_status == 'YES'){ ?>
                    <div class="col-lg-6 col-md-4 col-12 column_padding_card">
                        <div class="card mb-2">
                            <div class="uploader text-center">
                                <input type="hidden" name="doc_name[]" id="doc_name" value="ncc_certificate"/>
                                <div class="card-header text-dark border-success text-center table_row_backgrond mb-0">NCC Certificate
                                <span class="float-right"><a href="#" title="Help Guide" data-toggle="popover" data-trigger="focus" data-content="Some content"><i class="far fa-question-circle"></i></a></span>
                                </div>
                                <input type="file" class="form-control-sm" id="vImg7" name="userfile[]" accept="image/png, image/jpeg, image/jpg">
                                <label for="vImg7" id="file-drag" class="my-0">
                                    <img id="uploadedImage_eight" src="<?php echo base_url(); ?><?php echo $ncc_certificate; ?>" alt="Preview" class="hidden mt-1" width="120" height="120">
                                    <div id="start">
                                        <div>Select NCC Certificate</div>
                                        <p class="text-danger mb-1">Note: Maximum File Size 100KB</p>
                                        <div id="notimage" class="hidden">Please select an image</div>
                                        <span id="vImg7-btn" class="btn btn-primary btn_file">Select a file</span>
                                    </div>
                                </label>             
                            </div>
                        </div>
                    </div>   
                    <?php } ?>
                </div>     
            </div>

            <div class="card-footer card_head_dashboard p-2">
                <div class="row ">
                    <div class="col-6 text-left">
                        <a href="<?php echo base_url(); ?>viewCombinationDetail" class="btn btn-md btn-primary"><i class="fas fa-angle-double-left"></i> Previous</a>                                      
                    </div>
                    <div class="col-6 text-right">
                        <button type="submit" class="btn btn-md btn-success text-right" id="NextButton">Next <i class="fas fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>       
    </div>

</div>     

<script type="text/javascript">
$(function () {
    $("#icons").css('color', '#008000');
    $("#icon").css('color', '#008000');
    $("#combination").css('color', '#008000');
    $("#NextButton").click(function () {
        $("#document").css('color', '#008000');
    });
}); 

$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});

function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_one').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg").change(function() {
    readURL1(this);
});
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_two').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg1").change(function() {
    readURL2(this);
});
function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_three').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg2").change(function() {
    readURL3(this);
});
function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_four').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg3").change(function() {
    readURL4(this);
});
function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_five').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg4").change(function() {
    readURL5(this);
});
function readURL6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_six').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg5").change(function() {
    readURL6(this);
});
function readURL7(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_seven').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg6").change(function() {
    readURL8(this);
});
function readURL8(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_seven').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#vImg7").change(function() {
    readURL9(this);
});
function readURL9(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadedImage_eight').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function updateList() {
  var input = document.getElementById("image_filename"); 
  var output = document.getElementById('vImg1');

  output.innerHTML = '<ul>';
  for (var i = 0; i < input.files.length; ++i) {
    output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML += '</ul>';
}
</script>