<script type="text/javascript">
    $(function(){
         $( "#search_product" ).autocomplete({
          source: "transfer-ajax-to",
          minLength: 3,
          select: function(event, ui) {
            $('#search_product').val(ui.item.label);
            $('#product-id').val(ui.item.id);
            $('#product-rate').val(ui.item.rate);
            $('#product-unit').val(ui.item.unit);
            $('#product-name').val(ui.item.name);
            $('#product-quantity').val(ui.item.po_unit_qty);
            $('#available-qty').html(ui.item.available_qty);
          }
        });
    });

    $(function(){
      $('.delete-dt').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'sd-ajax-delete-dt/{id}',
            type: 'POST',
            dataType: 'json',
            data: { id:  $(this).data("href") },
            success: function(response)
            {
                $btn.closest("tr").remove();
                $('#something-delete').html(response);

            }
        });
      });
   });

    //Product Add(s)
    $tableItemCounter = 0; //To stop additem if exist
    var $arrayProducts = []; //To stop additem if exist

    function pushListItem(productsId){
        $arrayProducts.push(productsId);
    };

    $("#add-new-product").click(function(event){
        $pid = $("#product-id").val();
        $prate = $("#product-rate").val();
        $punit = $("#product-unit").val();
        $pqty = $("#product-quantity").val();
        $avail_qty = $("#available-qty").html();


        if($pid == "" || $prate== "" || $punit == "" || $pqty == ""){
            alert("please add your product information and try Again!");
            return false;
        }else{
            $ele = $(event.target);
            if($ele.is("input[type=button]")){
                $td_productCode = $("#product-id").val();
                var index = $.inArray($td_productCode, $arrayProducts);
                if (index>=0) {
                    alert("You already added this product code in line #" + (index + 1));
                    return false;
                } else {
                    if($avail_qty < $pqty){
                        alert("Quantity can not be more than Available Quantity");
                        return false;
                    }else{
                        $product_name = $("#product-name").val();
                        $product_id = $("#product-id").val();
                        $invProductRate = $("#product-rate").val();
                        $invProductUnit = $("#product-unit").val();
                        $invProductQuantity = $("#product-quantity").val();

                        $('#test').append("<tr> <td><input value='"+$product_name+"' readonly> <input name='inv_product_id[]' type='hidden' value='"+$product_id+"'></td>  <td><input name='unit[]' value='"+$invProductUnit+"' readonly></td> <td><input name='quantity[]' value='"+$invProductQuantity+"' readonly></td> <td><input name='rate[]' value='"+$invProductRate+"' readonly></td> </tr>");
                        $arrayProducts.push($td_productCode);

                        //flush the input fields
                        $("#product-name").val("");
                        $("#product-id").val("");
                        $("#product-rate").val("");
                        $("#product-unit").val("");
                        $("#product-quantity").val("");
                        $("#search_product").val("");
                    }

                }
            }
        }

	});

</script>
