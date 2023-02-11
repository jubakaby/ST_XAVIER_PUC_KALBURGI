<style>
.select2-container .select2-selection--single {
    height: 38px !important;
    width: 360px !important;
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
                    <div class="card-body p-2">
                        <div class="row c-m-b">
                            <div class="col-lg-7 col-12 col-md-7 box-tools">
                                <span class="page-title">
                                    <i class="material-icons">chat</i> SMS Portal
                                </span>
                            </div>
                            <div class="col-lg-5 col-md-5 col-12 text-right">
                                <!-- <a onclick="window.history.back();"
                                    class="btn primary_color mobile-btn float-right text-white border_left_radius"
                                    value="Back"><i class="fa fa-arrow-circle-left"></i> Back </a> -->
                                <span class="page-title ">SMS Balance:
                                    <?php echo $sms_balance; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-0 column_padding_card">
            <div class="col column_padding_card">
                <div class="card card-small mb-4">
                    <div class="card-body p-1 pb-2 text-center ">
                        <form method="POST" action="<?php echo base_url() ?>sendBulkSMS" id="formSmsBulk">
                            <div id="errorMsg"></div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="card text-center">
                                        <div class="card-header bg-info">
                                            <div class="row">
                                                <div class="col-6 col-md-6 text-left h5 text-black">
                                                    Choose send options
                                                </div>
                                                <div class="col-6 col-md-6 text-right">
                                                    <a tabindex="0" class="btn btn-sm btn-info" role="button"
                                                        data-toggle="popover" data-trigger="focus"
                                                        title="Send Option Help"
                                                        data-content="Choose Select option for specified students and Check the below option for specified mobile number.">Help
                                                        <span class="material-icons small">
                                                            help
                                                        </span></a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                <label style="float:left" for="stream_section_select">Select By Term</label>
                                                    <select class="form-control" name="term_name" id="term_name_select"
                                                        required>
                                                        <option value="">Select Term</option>
                                                       
                                                        <option value="I">I PUC</option>
                                                        <option value="II">II PUC</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                <label style="float:left"  for="stream_section_select">Select By Stream</label>
                                                    <select data-live-search="true" class="form-control"
                                                        name="stream_name" id="stream_stream_select" required>
                                                        <option value="">Select Stream</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                            
                                                <div class="form-group col-6">
                                                <label style="float:left"  for="stream_section_select">Select By Section Name</label>
                                                    <select data-live-search="true" class="form-control"
                                                        name="section_name" id="stream_section_select" required>
                                                        <option value="ALL">ALL</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="form-group col-6">
                                                    <div class="customCheckBox ">
                                                        <input id="parentsMobile" type="checkbox" value="parentsMobile"
                                                            name="parentsMobile">
                                                        <label for="parentsMobile">Parent's Mobile</label>
                                                        <span></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="customCheckBox">
                                                        <input id="onlyStudent" type="checkbox" value="onlyStudent"
                                                            name="onlyStudent">
                                                        <label for="onlyStudent">Student's Mobile</label>
                                                        <span></span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <div class="customCheckBox">
                                                        <input id="onlyGuardian" type="checkbox" value="onlyGuardian"
                                                            name="onlyGuardian">
                                                        <label for="onlyGuardian">Guardian's Mobile</label>
                                                        <span></span>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- <div class="row">
                                                <div class="form-group col-12">
                                                    <textarea class="form-control" rows="2" onkeypress="allowNumbersOnly(event)"
                                                        placeholder="Enter Mobile Number here...(without 91)"
                                                        id="mobile" name="mobile"></textarea>
                                                </div>

                                            </div> -->
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="card text-center">
                                        <div class="card-header bg-info h4 text-black">
                                            Message
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" value="" id="per_sms_cost" name="sms_cost" />
                                            <div class="form-group">
                                                <textarea class="form-control" rows="6"
                                                    placeholder="Write messages here...(Messages above 159 characters will be sent as 2 texts)"
                                                    id="message" name="message" required></textarea>
                                            </div>
                                            <input type="button" class="btn btn-success font-weight-bold btn-block"
                                                id="submitBtn" value="Send" />
                                        </div>

                                    </div>
                                </div>




                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Model alert -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Before Send
            </div>
            <div class="modal-body" style="padding:2px;">
                Are you sure you want to send the SMS?

                <!-- We display the details entered by the user here -->
                <table class="table">
                    <tr>
                        <th>Term</th>
                        <td id="term_name_selected"></td>
                    </tr>
                    <tr>
                        <th>Stream</th>
                        <td id="stream_stream_selected"></td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td id="sms_to_checked"></td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td id="written_msg"></td>
                    </tr>
                    <tr>
                        <th>Per SMS Cost</th>
                        <td id="sms_cost"></td>
                    </tr>
                </table>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Confirm</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function() {
    $('#errorMsg').html('');
    $("#term_name_select").on('change', function() {
        $('#stream_stream_select option:not(:first)').remove();
        var term_name = this.value;

        if (term_name == "") {
            $('#stream_stream_select').attr('disabled', true);
        } else {
            $.ajax({
                url: '<?php echo base_url(); ?>/getStreamNamesByTermSelected',
                type: 'POST',
                data: {
                    term_name: term_name
                },
                success: function(data) {
                    $("#stream_stream_select").append(new Option("ALL", "ALL"));
                    $('#stream_stream_select').attr('disabled', false);
                    var count = data.term_name.length;
                    for (var i = 0; i < count; i++) {

                        $("#stream_stream_select").append(new Option(data.term_name[i]
                            .stream_name, data.term_name[i].stream_name));
                    }
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



    jQuery('.datepicker, .dateSearch').datepicker({
        autoclose: true,
        orientation: "bottom",
        format: "dd-mm-yyyy"

    });

    $(function() {
        $('[data-toggle="popover"]').popover()
    })
});

function allowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
        e.preventDefault();
    }
}

$('#submitBtn').click(function() {

    var error_msg = "";
    var to_send = "";

    if ($('#message').val() == "") {
        error_msg = "Please Write valid message";
    }
    if ($('#term_name_select').val() == "") {
        error_msg = "Please select Term Name option";
    }
    if ($('#stream_stream_select').val() == "") {
        error_msg = "Please select Stream option";
    }

    var invalid_destination = true;
    if ($('#parentsMobile').prop("checked")) {
        invalid_destination = false;
        to_send += " Parent's ";
    }
    if ($('#onlyStudent').prop("checked")) {
        invalid_destination = false;
        to_send += " Student ";
    }
    if ($('#onlyGuardian').prop("checked")) {
        invalid_destination = false;
        to_send += " Guardian ";
    }

    if (invalid_destination == true) {
        error_msg = "Please choose sms delivery destination";
    }

    if (error_msg == "") {
        $('#errorMsg').html();
        $('#sms_to_checked').text(to_send);
        /* when the button in the form, display the entered values in the modal */
        $('#written_msg').text($('#message').val());
        $('#term_name_selected').text($('#term_name_select').val());
        $('#stream_stream_selected').text($('#stream_stream_select').val());
        var msg_count = $('#message').val().length;
        //var msg_cost = Math.ceil(msg_count/160);

        var msg_cost = countSmsCost(msg_count);
        $('#per_sms_cost').val(msg_cost);

        $('#sms_cost').text(msg_cost);
        $('#confirm-submit').modal('show');
    } else {
        $('#errorMsg').html(`<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> ` + error_msg + `</div>`);
        return;
    }


});

$('#submit').click(function() {
    /* when the submit button in the modal is clicked, submit the form */
    $('#formSmsBulk').submit();
    $('#submitBtn').prop('disabled', true);
    $('#errorMsg').html(`<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Processing..</strong> Please Wait...</div>`);
    $('#confirm-submit').modal('hide');
});



function countSmsCost(len) {

    if (len <= 160) {
        return 1;
    } else if (len >= 161 && len <= 306) {
        return 2;
    } else if (len >= 306 && len <= 459) {
        return 3;
    } else if (len >= 459 && len <= 612) {
        return 4;
    } else if (len >= 612 && len <= 765) {
        return 5;
    } else if (len >= 765 && len <= 918) {
        return 6;
    } else if (len >= 918 && len <= 1071) {
        return 7;
    } else if (len >= 1071 && len <= 1224) {
        return 8;
    } else if (len >= 1224 && len <= 1377) {
        return 9;
    } else if (len >= 1377 && len <= 1530) {
        return 10;
    } else {
        return 11;
    }

}
</script>