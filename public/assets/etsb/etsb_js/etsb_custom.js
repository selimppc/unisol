/**
 * Created by SELIM on 3/18/2015.
 */

$(function() {
    $('.date-picker').each(function() {

        var $picker = $(this);
        $picker.datepicker({
            format:'yyyy-mm-dd'
        });
        var pickerObject = $picker.data('date-picker');

        $picker.on('changeDate', function(ev){
            $picker.datepicker('hide');
        });
    });
    /*$('.date-picker').datepicker().next().on(ace.click_event, function(){
     $(this).prev().focus();
     var $picker = $(this);
     $picker.datepicker({
     format:'yyyy-mm-dd'
     });
     var pickerObject = $picker.data('date_picker');

     $picker.on('changeDate', function(ev){
     $picker.datepicker('hide');
     });
     });*/
});

/*
$(function() {
    $("#example1").dataTable({
        "bPaginate": false,
        "bSort": true,
        "bInfo": true
    });
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});*/
