{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
    $(function(){

        /*   $tableItemCounter = 0; //To stop additem if exist*/
        $("#add_billing_applicant_detail").click(function(event){

            var $billing_head_id = "<?php echo $billing_head_id; ?>";
            $billing_item_id = $("#billing_item_id").val();
            // alert($billing_item_id);
            var listItemTitle = $(" #billing_item_id option:selected ").text();
            //alert(listItemTitle);
            $waiver_id = $("#waiver_id").val();
            var waiverTitle = $( " #waiver_id option:selected " ).text();
            // alert(waiverTitle);
            $waiver_amount = $("#waiver_amount").val();
            $cost_per_unit = $("#cost_per_unit").val();
            $quantity= $("#quantity").val();
            $total_amount = $("#total_amount").val();

            $('#item').append("<tr> " +
            "<td><input type='hidden' name='billing_applicant_head_id[]' value='"+ $billing_head_id +"' ><input type='hidden' name='billing_item_id[]' value='"+ $billing_item_id +"' ><input type='text' value='"+ listItemTitle +"' ></td>" +
            "<td><input type='hidden' name='waiver_id[]' value='"+ $waiver_id +"' readonly>" +"<input type='text' value='"+ waiverTitle +"' readonly></td>" +
            "<td><input name='waiver_amount[]' value='"+ $waiver_amount +"'> </td>" +
            "<td><input name='cost_per_unit[]' value='"+ $cost_per_unit +"' > </td>" +
            "<td><input name='quantity[]' value='"+ $quantity +"' ></td>" +
            "<td><input name='total_amount[]' value='"+ $total_amount +"' ></td>" +
            "<td></td>"+
            "</tr>");

        });
    });
</script>
