<script>
    $(document).ready(function() {
        var options = {
            beforeSubmit:  showRequest,
            success:       showResponse,
            dataType: 'json'
            };
        $('body').delegate('#image','change', function(){
            $('#upload').ajaxForm(options).submit();
        });
    });

    function showRequest(formData, jqForm, options) {
        $("#validation-errors").hide().empty();
        $("#output").css('display','none');
        return true;
    }
    function showResponse(response, statusText, xhr, $form)  {
        if(response.success == false)
        {
            var arr = response.errors;
            $.each(arr, function(index, value)
            {
                if (value.length != 0)
                {
                    $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                }
            });
            $("#validation-errors").show();
        } else {
             $("#output").html("<img src='"+response.file+"' />");
             $("#output").css('display','block');
        }
    }
</script>