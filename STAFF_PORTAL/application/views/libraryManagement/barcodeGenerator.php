<style>
    .generate {
        margin: 0 auto;
        padding: 0px;
        text-align: center;
        width: 100%;
        font-family: "Myriad Pro", "Helvetica Neue", Helvetica, Arial, Sans-Serif;
        background-color: #F5EEF8;
    }

    #wrapper {
        margin: 0 auto;
        padding: 0px;
        text-align: center;
        width: 995px;
    }

    #wrapper h1 {
        margin-top: 50px;
        font-size: 45px;
        color: #884EA0;
    }

    #wrapper h1 p {
        font-size: 18px;
    }

    #barcode_div input[type="text"] {
        width: 300px;
        height: 35px;
        border: none;
        padding-left: 10px;
        font-size: 17px;
    }

    #barcode_div input[type="submit"] {
        background-color: #884EA0;
        border: none;
        height: 35px;
        color: white;
    }
</style>
<div style="height:5vh" class="generate">

</div>
<div id="wrapper" class="generate" width="100%">

    <div id="barcode_div">
        <form role="form" method="post" action="<?php echo base_url() ?>generateBarcode">
            <input type="text" name="barcode_text" autocomplete="off" value="<?php echo $generate_barcode ?>">
            <input type="submit" name="generate_barcode" value="GENERATE">
        </form>
        
        
    </div>
    <div style="height:8vh"  class="generate p-2">
        <form role="form" method="post" action="<?php echo base_url() ?>deleteBarcode">
            <input type="submit" class="btn btn-danger" name="generate_barcode" value="Delete All">
        </form>
    </div>
    <div class="container generate row">
        <?php 
        $files = scandir('application/cache');
        foreach($files as $file) {
            if ($file !== "." && $file !== "..") {
                echo "<div class=' col-6 col-sm-4 col-md-3 mt-3 mb-3'>
                <img src='application/cache/$file' width='100%' /></div>";
            }
        }
        ?></a>
        <img src="<?php echo $generate_barcode; ?>">
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
    <script>
        jQuery(document).ready(function() {
            $('SelectorToPrint').printElement();
        });
    </script>