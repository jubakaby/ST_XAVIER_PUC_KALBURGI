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
    <div class="col-12">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
    </div>
</div>
<div class="main-content-container px-3 pt-1 overall_content">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row p-0 column_padding_card">
            <div class="col-12 column_padding_card">
                <div class="card card-small p-0 card_heading_title">
                    <div class="card-body p-2 ml-2">
                        <span class="page-title">
                         <i class="fas fa-sign-out-alt"></i> Edit Stock Out
                        </span>
                        <a onclick="window.history.back();" class="btn btn_back float-right text-white pt-2" style="background-color:brown;"
                            value="Back"><i class="fa fa-arrow-circle-left"></i> Back </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(empty($stockOutInfo)){ ?>
    <div class="row form-employee">
        <div class="col-lg-12 col-md-12 col-12 pr-0 text-center">
        <img height="270" src="<?php echo base_url(); ?>assets/images/404.png"/>
        </div>
    </div>
    <?php } else {  ?>
    <div class="row form-employee p-0 column_padding_card">
        <div class="col-12 column_padding_card">
            <div class="card card-small c-border mb-4 p-2">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-2">
                        <form role="form" action="<?php echo base_url() ?>updateStockOut" method="post" role="form">
                        <input type="hidden" value="<?php echo $stockOutInfo->row_id; ?>" name="row_id" id="row_id"/>
                            <div class="row p-0 column_padding_card">
                                <div class="col column_padding_card">
                                    <div class="form-row">
        
                                        <div class="form-group col-md-6">
                                            <label for="out_date">Out Date</label>
                                            <input type="text" class="form-control required inDate "
                                                id="out_date"  name="out_date" value="<?php echo date('d-m-Y',strtotime($stockOutInfo->out_date)); ?>" placeholder="Out Date" required autocomplete="off"/>
                                        </div>
                                       
                                        <div class="col-lg-2 col-6 form-group">
                                      <label for="exampleInputEmail1">Quantity</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number btn_minus btn btn-danger"
                                            data-type="minus" style="width:50px;" data-field="quantity">
                                            <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="quantity" class="form-control input-number"  id="quantity-input" value="<?php echo (int)$stockOutInfo->quantity; ?>" min="1"
                                        max="<?php 
                                            echo (int)($stockOutInfo->quantity+$remainingQuantity);
                                        ?>">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-number btn_plus btn btn-success" data-type="plus"
                                            data-field="quantity">
                                            <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    </div>
                                    </div>
                               
                                     <!-- <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label  for="price ">Sales Price</label>
                                            <input type="text" class="form-control required" name="sales_price" id="sales_price" value="<?php echo $stockOutInfo->sales_price; ?>" onkeypress="return isNumberKey(event)"placeholder="Sales Price" autocomplete="off" required/>
                                        </div>
                                    </div> -->
                                  
                                    <div class="form-row">
                                        <label for="comments">Comments</label>
                                        <textarea placeholder="Enter Comments" type="text" class="form-control required" id="comments" name="comments" autocomplete="off"><?php echo $stockOutInfo->comments; ?></textarea>
                                     </div>
                                    <button type="submit" class="btn btn-md btn-success float-right mt-1">Update</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php } ?>

</div>
<script type="text/javascript">
 
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
        (charCode < 48 || charCode > 57))
        return false;
    return true;
}



jQuery(document).ready(function() {
   
     jQuery('.inDate,.service,.permit').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",

    });

  
});

   $(".input-number").keyup(function(ee){
        try{
            let curVal = parseFloat($(this).val());
            let minVal = parseFloat($(this).attr('min'));
            let maxVal = parseFloat($(this).attr('max'));
            if(isNaN(curVal)){
                if(ee.keyCode == 69){
                    $(this).val(minVal);
                }
            }else{
                if(curVal < minVal){
                    alert('Sorry, the minimum value was reached');
                    $(this).val(minVal);
                }else if(curVal > maxVal){
                    alert('Sorry, the maximum value was reached');
                    $(this).val(maxVal);
                }
            }
        }catch(err){
            $(this).val(minVal);
        }
    });
    
    $(".btn_plus").click(function(e){
        try{
            let curVal = parseFloat($(".input-number").val());
            let maxVal = parseFloat($(".input-number").attr('max'));
            if(! isNaN(curVal) && ! isNaN(maxVal)){
                if(curVal >= maxVal){
                    alert('Sorry, the maximum value was reached');
                }else{
                    $(".input-number").val(curVal + 1);  
                }
            }
        }catch(ee){

        }
    });

    $(".btn_minus").click(function(e){
        try{
            let curVal = parseFloat($(".input-number").val());
            let minVal = parseFloat($(".input-number").attr('min'));
            if(! isNaN(curVal) && ! isNaN(minVal)){
                if(curVal <= minVal){
                    alert('Sorry, the minimum value was reached');
                }else{
                    $(".input-number").val(curVal - 1);  
                }
            }
        }catch(ee){
            
        }
    }); 

</script>
