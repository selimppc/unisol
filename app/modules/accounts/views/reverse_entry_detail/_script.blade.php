<script type="text/javascript">
    $(function(){
         $( "#search-coa" ).autocomplete({
          source: "coa-auto-complete",
          minLength: 1,
          select: function(event, ui) {
            $('#search-coa').val(ui.item.label);
            $('#coa-id').val(ui.item.id);
            $('#coa-code').val(ui.item.code);
            $('#coa-name').val(ui.item.name);
          }
        });
    });

    $(function(){
      $('.delete-dt').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'jv-ajax-delete-detail',
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
        $coa_id = $("#coa-id").val();
        $coa_code = $("#coa-code").val();
        $coa_name = $("#coa-name").val();
        $db_cr_amt = $("#debit-credit-amount").val();
        $note = $("#coa-note").val();

        if($coa_id == "" || $coa_code== "" || $db_cr_amt == "" || $note == "" ){
            alert("please add your accounts information and try Again!");
            return false;
        }else{
            $ele = $(event.target);
            if($ele.is("input[type=button]")){
                $td_productCode = $("#coa-id").val();
                var index = $.inArray($td_productCode, $arrayProducts);
                if (index>=0) {
                    alert("You already added this account code !");
                    return false;
                } else {
                    $('#test').append("<tr> <td><input value='"+$coa_name+"' readonly> <input name='acc_chart_of_accounts_id[]' type='hidden' value='"+$coa_id+"'></td> <td><input name='prime_amount[]' value='"+$db_cr_amt+"' readonly></td>  <td><input name='note[]' value='"+$note+"' readonly></td></tr>");
                    $arrayProducts.push($td_productCode);
                    //flush the input fields
                    $("#search-coa").val("");
                    $("#coa-id").val("");
                    $("#coa-code").val("");
                    $("#coa-name").val("");
                    $("#debit-credit-amount").val("");
                    $("#coa-note").val("");
                }
            }
        }

	});

</script>
