{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
   /* $(function(){* same */
   $( document ).ready(function()
   {
   /*================================Add New Item====================================*/

        $("#add_billing_student_detail").click(function(event)
        {
            var $billing_head_id = "<?php echo $billing_head_id; ?>";
            $billing_item_id = $("#billing_item_id2").val();
            var listItemTitle = $(" #billing_item_id2 option:selected ").text();
            $waiver_id = $("#waiver_id2").val();
            if($waiver_id !=="")
            {
                var waiverTitle = $( " #waiver_id2 option:selected " ).text();
            }
            else{
                var waiverTitle = "";
            }
            $waiver_amount = $("#waiver_amount2").val();
            $cost_per_unit = $("#cost_per_unit2").val();
            $quantity= $("#quantity2").val();
            $total_amount = $("#total_amount2").val();

            /* if($billing_item_id == "" || $cost_per_unit == "" || $total_amount == "") {
             alert("Please Add Item and try Again!");
             return false;
             }
             else{ $('#item').append("<tr> " + ........ */

            if($billing_item_id == "" || $cost_per_unit == "" || $total_amount == "")
            {
                document.getElementById('fill-up-form').innerHTML=" Please Fill Up  All Fields And try Again!";
                return false;
            }else{
                document.getElementById('fill-up-form').innerHTML="";
            }
            $('#item').append("<tr> " +
            "<td width='300'><input type='hidden' name='billing_applicant_head_id[]' value='" + $billing_head_id + "' ><input type='hidden' name='billing_item_id[]' value='" + $billing_item_id + "' ><input type='text' value='" + listItemTitle + "' readonly ></td>" +
            "<td><input type='hidden' name='waiver_id[]' value='" + $waiver_id + "' readonly>" + "<input type='text' value='" + waiverTitle + "' readonly></td>" +
            "<td><input name='waiver_amount[]' value='" + $waiver_amount + "' readonly > </td>" +
            "<td><input name='cost_per_unit[]' value='" + $cost_per_unit + "' readonly > </td>" +
            "<td><input name='quantity[]' value='" + $quantity + "' readonly></td>" +
            "<td><input name='total_amount[]' value='" + $total_amount + "' readonly></td>" +
            "<td><a class='btn btn-default btn-sm' id='removeTrId' onClick='deleteNearestTr(this.id, 0)'><i class='fa  fa-trash-o text-red' style='font-size: 15px'></i></a></td>" +
            "</tr>");

            //flush the input fields
            $("#billing_item_id2").val("");
            $("#waiver_id2").val("");
            $("#waiver_amount2").val("");
            $("#cost_per_unit2").val("");
            $("#quantity2").val("");
            $("#total_amount2").val("");

        });



    /*=======To hide waiver select box and waiver amount text box when select this 2 item below======*/

    /* $('#billing_item_id2').change(function(){
         selection = $(this + 'option:selected').text();
         switch(selection)
         {
             case 'Admission Application form charge':
                 $('#waiver_amount2').prop("disabled", true);
                 break;

             case 'Admission time charge.':
                 $('#waiver_amount2').prop("disabled", true);
                 break;

             default:
                 $('#waiver_amount2').prop("disabled", false);
                 break;
         }
         console.log(selection);
     });*/

        $('#billing_item_id2').change(function(){
            selection = $(this).text();
            //var selection = $(':selected', this).attr('selection');
            switch(selection)
            {
                case 'Admission Application form charge':
                    $('#waiver_id2').hide();
                    $('#waiver_amount2').attr('disabled', 'disabled');
                    break;

                case 'Admission time charge.':
                    $('#waiver_id2').hide();
                    $('#waiver_amount2').attr('disabled', 'disabled');
                    break;

                default:
                    $('#waiver_id2').show();
                    $('#waiver_amount2').show();
                    break;
            }
            /*console.log(selection);*/
        });



    /*=============Calculation starts to make total amount using waiver information ================*/

        $('#billing_item_id2').change(function(){
            var quan = $('#quantity2').val();
            var waiver_amount = $('#waiver_amount2').val();
            $.get("{{ url('fees/get-cost-by-billing-id')}}",
                    { billing_item_id: $(this).val() },
                    function(data) {
                        $('#cost_per_unit2').val(data);

                        calculate_sum_data(data, quan, waiver_amount);
                    });
        });

        $('#waiver_id2').change(function(){
            $.get("{{ url('fees/get-cost-by-waiver-id')}}",
                    { billing_waiver_id: $(this).val() },
                    function(data) {
                        $('#waiver_amount2').val(data);
                        var quan = $('#quantity2').val();
                        var waiver_amount = $('#waiver_amount2').val();
                        var total_am = $('#cost_per_unit2').val();

                        calculate_sum_data(total_am, quan, data);
                    });
        });

        $('#quantity2').on('blur', function(){
            var quan = $('#quantity2').val();
            var waiver_amount = $('#waiver_amount2').val();
            var total_am = $('#cost_per_unit2').val();

            calculate_sum_data(total_am, quan, waiver_amount);

        });

        function calculate_sum_data(data, quan, waiver_amount)
        {
            var sum_data = 0;
            if(quan > 0 && quan != "")
            {
                sum_data = parseFloat((quan * data) - waiver_amount ,10).toFixed(2);
            }
            else
            {
                $('#quantity2').val(1);
                sum_data = parseFloat(data - waiver_amount ,10).toFixed(2);
            }
            $('#total_amount2').val(sum_data);
        }


    });


    /*=================================Ajax delete in popup========================================*/

    function deleteNearestTr(getId, detailsId)
    {
        var detail_id = detailsId;
        var url = '{{URL::to('fees/detail/student/delete/ajax')}}' ;
        console.log(url);
        if(detail_id > 0){
            var check = confirm("Are you sure to delete this item??");
            if(check)
            {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {billing_student_detail_id: detail_id}
                })
                        .done(function(msg) {
                            console.log(msg);
                            var whichtr = $('#'+getId).closest("tr");
                            whichtr.fadeOut(500).remove();
                        });
            }
            else
            {
                return false;
            }

        }else{
            //if billing_student_detail_id id not found jst remove the tr form the popup. that will not delete the data form the db.
            var whichtr = $('#'+getId).closest("tr");
            whichtr.fadeOut(500).remove();
        }
    }

</script>
