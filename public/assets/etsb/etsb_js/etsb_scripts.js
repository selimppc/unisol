/**
 * Created by SELIM on 3/10/2015.
 */
(function($){
    $(document).ready(function(){
        var triggeredByChild = false;
        $('input').iCheck({
            checkboxClass: 'checkbox-default',
            radioClass: 'radio-default'
        });
        $('#checkbox').on('ifChecked', function (event) {
            $('.myCheckbox').iCheck('check');
            triggeredByChild = false;
            $("#hide-button").show();
        });
        $('#checkbox').on('ifUnchecked', function (event) {
            if (!triggeredByChild) {
                $('.myCheckbox').iCheck('uncheck');
                $("#hide-button").hide();
            }
            triggeredByChild = false;
        });

        //single row selection
        $('.myCheckbox').on('ifChecked', function (event) {
            triggeredByChild = false;
            $("#hide-button").show();
        });
        $('.myCheckbox').on('ifUnchecked', function (event) {
            if (!triggeredByChild) {
                $("#hide-button").hide();
            }
            triggeredByChild = false;
        });

        // Removed the checked state from "All" if any checkbox is unchecked
        $('.myCheckbox').on('ifUnchecked', function (event) {
            triggeredByChild = true;
            $('#checkbox').iCheck('uncheck');
        });
        $('.check').on('ifChecked', function (event) {
            if ($('.myCheckbox').filter(':checked').length == $('.myCheckbox').length) {
                $('#checkbox').iCheck('check');
            }
        });

    });
}(jQuery.noConflict(true)));


