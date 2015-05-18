<script type="text/javascript">
    $(function(){
         $( "#search_product" ).autocomplete({
          source: "ajax/get-product-auto-complete",
          minLength: 3,
          select: function(event, ui) {
            $('#search_product').val(ui.item.label);
            $('#product-id').val(ui.item.id);
            $('#product-rate').val(ui.item.rate);
            $('#product-unit').val(ui.item.unit);
          }
        });
    });

    function addProduct(){
      alert("OK");
    }
</script>

