<script>
$(function() {
    $('input[name=amount]').change(function() {
        var $amount = $('#amount-for-pay').val();
        $('#pay-for-amount').val($amount);
     });


});
</script>