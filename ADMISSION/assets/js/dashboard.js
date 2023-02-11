$(document).ready(function () {
    //Initialize tooltips
    // $(function() {
    //     $(this).bind("contextmenu", function(e) {
    //         e.preventDefault();
    //     });
    // }); 

    $(".schoolDetail").addClass('disabled');
    $(".combinationDetail").addClass('disabled');
    

    $(".next-step-personal").click(function (e) {
        $(".schoolDetail").removeClass('disabled');
    });

    $(".next-step-examination").click(function (e) {
        $(".schoolDetail").removeClass('disabled');
        $(".combinationDetail").removeClass('disabled');
    });

});