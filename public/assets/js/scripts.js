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
    var count = 2;
    window.createInput = function(){
        var field_area = document.getElementById('fields1')
        var div = document.createElement("div");
        var label = document.createElement("label");
        label.for = "option";
        label.innerHTML = "Option "+ (count + 1) + ":";
        div.appendChild(label);


        var input = document.createElement("input");
        input.id = 'option'+count;
        input.className = 'option_class';
        input.name = 'option_title[]';
        input.type = "text";
        div.appendChild(input);



        //if(question_type == radio){
        //
        //}else{
        //
        //}

        //Radio
        // <input type="radio" name="answerType" id="inlineRadio2" value="Female">
        var input = document.createElement("input");
        input.id = 'answer'+count;
        input.className = 'radio_class';
        input.name = 'answer[]';
        //input.type = "radio";
        input.type = "checkbox";
        input.value = count;


        //var input = document.createElement("input");
        //input.id = 'answer'+count;
        //input.className = 'radio_class';
        //input.name = 'answer[]';
        ////input.type = "radio";
        //input.type = "radio";
        //input.value = count;



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
        }

});

