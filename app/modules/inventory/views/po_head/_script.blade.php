<script>
$(function() {
     $('#cost-price').keypress(function(eve) {
      if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
        eve.preventDefault();
      }
         // this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
         $('#cost-price').keyup(function(eve) {
          if($(this).val().indexOf('.') == 0) {    $(this).val($(this).val().substring(1));
          }
         });
    });
});


$(function(){
    $('#discount-rate').change(function(e) {
        e.preventDefault();
        var $disc_rate = $('#discount-rate').val();
        var $amount = $('#amount').val();
        var $disc_amount = ($disc_rate * $amount) / 100;
        $('#discount-amount').val($disc_amount);
      });
})

</script>