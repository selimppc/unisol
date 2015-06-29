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
         $amount = $.trim(tableData[1]);
         $date = $.trim(tableData[2]);


         var index = $.inArray($invoice_code, $arrayItems);
         if (index>=0) {
            alert("You already added this Invoice");
            return false;
         }else{
            $('#new-data').append("<tr> <td><input name='invoice[]' value='"+$invoice_code+"' readonly> <input name='inv_product_id[]' type='hidden' value='"+$invoice_code+"'></td>  <td><input name='amount[]' value='"+$amount+"' readonly></td> </tr>");
            $arrayItems.push($invoice_code);
         }


     });


});
</script>