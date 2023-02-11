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

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
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
                            <div class="col-lg-4 col-12 col-md-4 box-tools">
                                <span class="page-title">
                                    <i class="fa fa-file"></i> SMS Report
                                </span>

                            </div>
                            <div class="col-lg-4 col-md-4 col-12">
                                <span class="page-title">SMS Sent: <?php echo $sms_count->total_sent_sms; ?></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">


                                    <div class="btn-group " role="group">
                                        <div class="input-group" id="adv-search">
                                            <!-- <input type="text" class="form-control" placeholder="Search for snippets" /> -->
                                            <div class="input-group-btn">
                                                <div class="btn-group" role="group">
                                                    <div class="dropdown dropdown-lg">
                                                        <button type="button"
                                                            class="btn btn-success dropdown-toggle "
                                                            data-toggle="dropdown" aria-expanded="false">Filter <span
                                                                class="caret"></span></button>
                                                        <div style="padding:4px;"
                                                            class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <form action="<?php echo base_url(); ?>openSMSSentReport"
                                                                method="post" class="form-horizontal" role="form">
                                                                <div class="form-group">
                                                                    <label for="filter">Term</label>
                                                                    <select id="term_name" name="term_name"
                                                                        class="form-control">
                                                                        <option value="<?php echo $term_name; ?>">
                                                                            Filtered:
                                                                            <?php echo $term_name; ?></option>
                                                                        <option value="ALL">ALL</option>
                                                                        <option value="I PUC">I PUC</option>
                                                                        <option value="II PUC">II PUC</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contain">By Date</label>
                                                                    <input class="form-control"
                                                                        value="<?php echo $date_search; ?>"
                                                                        name="date_search" id="search_datepicker"
                                                                        type="text" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="contain">Mobile Number</label>
                                                                    <input maxlength="10" value="<?php echo $mobile; ?>"
                                                                        id="mobile" class="form-control" name="mobile"
                                                                        type="number" />
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary float-right">Search</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- <button type="button" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                   

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-0 column_padding_card">
        <div class="col column_padding_card">
            <div class="card card-small mb-4">
                <div class="card-body p-1 pb-2 text-center table-responsive">
                    <table id="item-list" style="width:100%"
                        class="display table  table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Term</th>
                                <th>Stream</th>
                                <th>Message</th>
                                <th>Mobile</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Term</th>
                                <th>Stream</th>
                                <th>Message</th>
                                <th>Mobile</th>
                                <th>Cost</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
    // $('.datepicker, #dateSearch').datepicker({
    //     autoclose: true,
    //     orientation: "bottom",
    //     format: "dd-mm-yyyy"

    // });
    $(function() {
        $("#dateSearch, #search_datepicker").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            orientation: "bottom",
        });
    });

    $('#item-list thead tr').clone(true).appendTo('#item-list thead');
    $('#item-list thead tr:eq(1) th').each(function(i) {
        var title = $(this).text();
        if (title == 'Date') {
            $(this).html(
                '<div class="form-group position-relative mb-0 mt-0" style="margin-top: -5px !important; margin-bottom: -5px !important;" ><input style="border: 1px solid #75787b !important;" type="text" id="dateSearch" class="form-control input-sm" placeholder="Search ' +
                title + '" /> </div>');
        } else {
            $(this).html(
                '<div class="form-group position-relative mb-0 mt-0" style="margin-top: -5px !important; margin-bottom: -5px !important;" ><input style="border: 1px solid #75787b !important;" type="text" class="form-control input-sm" placeholder="Search ' +
                title + '" /> </div>');
        }


        $('input', this).on('keyup change', function() {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        });
    });


    var table = $('#item-list').DataTable({
        columnDefs: [
            // { className: "my_class", targets: "_all" },
            {
                className: "text-left",
                targets: 4,

            },
            // {
            //     className: "text-left",
            //     targets: 1,

            // }
        ],
        lengthMenu: [
            [200, 150, 100, 50, 20, 10],
            [200, 150, 100, 50, 20, 10]
        ],
        processing: true,
        orderCellsTop: true,
        fixedHeader: true,
        responsive: true,
        language: {
            "info": "Showing _START_ to _END_ of _TOTAL_ SMS Report",
            "infoFiltered": "(filtered from _MAX_ total SMS Report)",
            "search": "",
            searchPlaceholder: "Search SMS Report",
            "lengthMenu": "Show _MENU_ SMS Report",
            "infoEmpty": "Showing 0 to 0 of 0 SMS Report",
            //processing: '<img src="'+baseURL+'assets/images/loader.gif" width="150"  alt="loader">'
        },

        "ajax": {
            url: '<?php echo base_url(); ?>/get_sms_report',
            type: 'POST',
            data: {
                term_name: $('#term_name').val(),
                date_search: $('#search_datepicker').val(),
                mobile: $('#mobile').val(),
            }
            // dataType: 'json',
        },

    });

    new $.fn.dataTable.FixedHeader(table);

});
</script>