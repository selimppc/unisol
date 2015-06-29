<script>
$(function() {
    $('input[name=amount]').change(function() {
        var $amount = $('#amount-for-pay').val();
        $('#pay-for-amount').val($amount);
     });


    //Product Add(s)
    $tableItemCounter = 0; //To stop add item if exists
    var $arrayItems = []; //To stop add item if exists

     $(".unpaid-items tr").click(function() {
         var tableData = $(this).children("td").map(function() {
             return $(this).text();
         }).get();
         //change row color on click
         $(".unpaid-items tr").each(function(index, elem){
            $(elem).removeClass("active");
         });
         $(this).addClass("active");

         //Get Table Data
         $invoice_code = $.trim(tableData[0]);
         $amount = Math.round($.trim(tableData[1]));
         $date = $.trim(tableData[2]);

         var index = $.inArray($invoice_code, $arrayItems);
         if (index>=0) {
            alert("You already added this Invoice");
            return false;
         }else{
            var $pay_amount = Math.round($('#pay-for-amount').val());
            if($pay_amount == null || $pay_amount == 0){
                alert("In-sufficient Amount!");
                return false;
            }else{
                if($pay_amount > $amount){
                    //Payable Amount
                    var $least_pay_amount = (Math.round($pay_amount) - Math.round($amount));
                    $('#pay-for-amount').val($least_pay_amount);
                    $pr_amount = Math.round($amount);

                    $('#new-data').append("<tr> <td><input name='invoice[]' value='"+$invoice_code+"' readonly> <input name='inv_product_id[]' type='hidden' value='"+$invoice_code+"'></td>  <td><input name='amount[]' value='"+$pr_amount+"' readonly></td> </tr>");
                    $arrayItems.push($invoice_code);

                }else if($pay_amount < $amount){
                    //Payable Amount
                    var $least_pay_amount = (Math.round($amount) - Math.round($pay_amount));
                    $('#pay-for-amount').val('0');
                    $pr_amount = Math.round($pay_amount);

                    $('#new-data').append("<tr> <td><input name='invoice[]' value='"+$invoice_code+"' readonly> <input name='inv_product_id[]' type='hidden' value='"+$invoice_code+"'></td>  <td><input name='amount[]' value='"+$pr_amount+"' readonly></td> </tr>");
                    $arrayItems.push($invoice_code);

                }
            }
            //total amount in the area of allocation
            var $total_amount_allocation = $('#allocation-total-amount').val();
            var $total_allocation_amt = (Math.round($total_amount_allocation) + Math.round($pr_amount));
            $('#allocation-total-amount').val($total_allocation_amt);
         }


     });


});
</script>