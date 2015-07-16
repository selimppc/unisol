{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
    $(function(){

        $("#add_billing_applicant_detail").click(function(event)
        {
            var $billing_head_id = "<?php echo $billing_head_id; ?>";
            $billing_item_id = $("#billing_item_id").val();
            var listItemTitle = $(" #billing_item_id option:selected ").text();
            $waiver_id = $("#waiver_id").val();
            if($waiver_id !=="")
            {
                var waiverTitle = $( " #waiver_id option:selected " ).text();
            }
            else{
                var waiverTitle = "";
            }
            $waiver_amount = $("#waiver_amount").val();
            $cost_per_unit = $("#cost_per_unit").val();
            $quantity= $("#quantity").val();
            $total_amount = $("#total_amount").val();

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

            // Insert item_id as INT to array otherwise it may be added like string
            //arrayItems.push(ItemId);//To stop additem if exist

            //flush the input fields
            $("#billing_item_id").val("");
            $("#waiver_id").val("");
            $("#waiver_amount").val("");
            $("#cost_per_unit").val("");
            $("#quantity").val("");
            $("#total_amount").val("");

        });
    });



    //---------------------Billing details ajax delete in popup----------------------------}}

    function deleteNearestTr(getId, detailsId)
    {
        var detail_id = detailsId;
        var url = '{{URL::to('fees/detail/applicantdelete/ajax')}}' ;
        console.log(url);
        if(detail_id > 0){
            var check = confirm("Are you sure to delete this item??");
            if(check)
            {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {billing_applicant_detail_id: detail_id}
                })
                        .done(function(msg) {
                            console.log(msg);
                            var whichtr = $('#'+getId).closest("tr");
                            whichtr.fadeOut(500).remove();
                           // $('#something-delete').html(response);
                            //arrayItems.pop(getId);//To stop additem if exist
                        });
            }
            else
            {
                return false;
            }

        }else{
            //if billing_applicant_detail_id id not found jst remove the tr form the popup. that will not delete the data form the db.
            var whichtr = $('#'+getId).closest("tr");
            whichtr.fadeOut(500).remove();
           // arrayItems.pop(getId);//To stop additem if exist
        }
    }

</script>