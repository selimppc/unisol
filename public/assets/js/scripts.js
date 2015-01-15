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
    var count = 3;
    window.createInput = function(){
        var field_area = document.getElementById('fields1')
        var div = document.createElement("div");
        var label = document.createElement("label");
        label.for = "option";
        label.innerHTML = "Option "+ count + ":";
        div.appendChild(label);

        var input = document.createElement("input");
        input.id = 'option'+count;
        input.className = 'option_class';
        input.name = 'option[]';
        input.type = "text";
        div.appendChild(input);

        field_area.appendChild(div);
        //remove area
        var removalLink = document.createElement('a');
        removalLink.className = "remove";

        removalLink.onclick = function(){
        field_area.removeChild(div);
        }
        removalLink.appendChild(document.createTextNode('remove'));
        div.appendChild(removalLink);
        count++;
        }

});