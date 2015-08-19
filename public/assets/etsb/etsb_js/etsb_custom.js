/**
 * Created by SELIM on 3/18/2015.
 */

(function () {
    'use strict';
    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
        var msViewportStyle = document.createElement('style')
        msViewportStyle.appendChild(
            document.createTextNode(
                '@-ms-viewport{width:auto!important}'
            )
        )
        document.querySelector('head').appendChild(msViewportStyle)
    }
})();

$(function() {
    //date_picker
    $('.date_picker').each(function() {
        var $picker = $(this);
        $picker.datepicker({
            format:'yyyy-mm-dd'
        });
        var pickerObject = $picker.data('date_picker');
        $picker.on('changeDate', function(ev){
            $picker.datepicker('hide');
        });
    });

    $('#event_period').datepicker({
        inputs: $('.actual_range').toArray()
    });

});

