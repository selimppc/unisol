<style>
.items tr{
    cursor: pointer;
    color: #0044cc;
    text-decoration: underline;
}
</style>

<script type="text/javascript">

    $(function() {
        $(".items tr").click(function() {
            var tableData = $(this).children("td").map(function() {
                return $(this).text();
            }).get();
            //change row color on click
            $(".items tr").each(function(index, elem){
               $(elem).removeClass("active");
            });
            $(this).addClass("active");

            $("#product-id").val($.trim(tableData[0]));
            $("#product-code").val($.trim(tableData[1]));
            $("#product-name").val($.trim(tableData[2]));
            $("#unit-id").val($.trim(tableData[3]));
            $("#unit-qty").val($.trim(tableData[4]));
            //$("#rec-qty").val($.trim(tableData[5]));
            $("#cost-price").val($.trim(tableData[6]));
            $("#row-amount").val($.trim(tableData[7]));
        });
    });

    $(function(){
      $( '#grn-sub-grn-data').on('submit', function(e) {
        e.preventDefault();
        var inv_grn_head_id = $('#inv_grn_head_id').val();
        var inv_product_id = $('#product-id').val();
        var batch_number = $('#batch_number').val();
        var expire_date = $('#expire_date').val();
        var unit = $('#unit-id').val();
        var unit_quantity = $('#unit-qty').val();
        var receive_quantity = $('#rec-qty').val();
        var cost_price = $('#cost-price').val();
        var row_amount = $('#row-amount').val();
        $.ajax({
            url: 'ajax-grn-detail-store',
            type: 'POST',
            dataType: 'json',
            data: { inv_grn_head_id:  inv_grn_head_id, inv_product_id: inv_product_id, batch_number: batch_number, expire_date: expire_date, unit: unit, unit_quantity: unit_quantity, receive_quantity: receive_quantity, cost_price: cost_price, row_amount: row_amount },
            success: function(response)
            {
                $("#grn-sub-grn-data").trigger('reset');
                $("#response-msg").html(response);

                location.reload(true);
                response.preventDefault();
                //window.location.reload(true);

                /*var currentURL = 'create-grn' + '/' + 1 + '/' + 1;
                window.location.href = currentURL;
                response.preventDefault();*/
            }
        });
      });
    });


    $(function() {
        $("#unit-id").change(function(){
                setTarget();
        });
        $("#rec-qty").change(function(){
                setTarget();
        });
        $("#cost-price").change(function(){
                setTarget();
        });
    });

    function setTarget(){
        var unit = $("#unit-id").val();
        var unitQty = $("#unit-qty").val();
        var recQty = $("#rec-qty").val();
        var costPrice = $("#cost-price").val();
        var data = (unit * recQty * costPrice);
        if( recQty <= unitQty ){
            $('#row-amount').val(data);
            return true;
        }else{
            alert("Receive Quantity Must be less or equal to Unit Quantity! ")
            $("#rec-qty").val("");
            return false;
        }

    }

    $(function(){
      $('.delete-dt').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'ajax-delete-grn-detail/{g_id}',
            type: 'POST',
            dataType: 'json',
            data: { g_id:  $(this).data("href") },
            success: function(response)
            {
                $btn.closest("tr").remove();
                $('#something-delete').html(response);
                //$("#something-delete").load(location.href + " #something-delete");

            }
        });
      });
   });

</script>