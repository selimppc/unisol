$(function () {
    // Side Bar Toggle
    $('.hide-sidebar').click(function () {
        $('#sidebar').hide('fast', function () {
            $('#content').removeClass('span9');
            $('#content').addClass('span12');
            $('.hide-sidebar').hide();
            $('.show-sidebar').show();
        });
    });

    $('.show-sidebar').click(function () {
        $('#content').removeClass('span12');
        $('#content').addClass('span9');
        $('.show-sidebar').hide();
        $('.hide-sidebar').show();
        $('#sidebar').show('fast');
    });
});

// add field js
$(function() {
    var count = $('#exmQuestionOptionAns tr').length - 2;;
    var count_value_option = 2;
    window.createInput = function(){
        var field_area = document.getElementById('fields1')
        var div = document.createElement("div");
        var label = document.createElement("label");
        label.for = "option";
        label.innerHTML = "Option "+ (count_value_option + 1) + ":";
        div.appendChild(label);

        var input = document.createElement("input");
        input.id = 'option'+count_value_option;
        input.className = 'option_class';
        input.name = 'option_title[]';
        input.type = "text";
        div.appendChild(input);

        var input = document.createElement("input");
        input.id = 'answer'+count;
        input.className = 'radiocheck';
        input.name = 'answer[]';
        //input.type = "radio";
        input.type = "radio";
        input.value = count_value_option;

        div.appendChild(input);
        field_area.appendChild(div);
        //remove area
        var removalLink = document.createElement('a');
        removalLink.className = "remove";

        removalLink.onclick = function(){
            field_area.removeChild(div);
            }
            removalLink.appendChild(document.createTextNode('Remove (-)'));
            div.appendChild(removalLink);
            count++;
            count_value_option++;
        }
});


