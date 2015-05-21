<style>
.items tr{
    cursor: pointer;
    background-color: #efad60;
}
</style></sty>

<script type="text/javascript">

$(document).ready(function(){
	$(".items tr").click(function() {
	    var tableData = $(this).children("td").map(function() {
	        return $(this).text();
	    }).get();
	    //change row color on click 
	    $(".items tr").each(function(index, elem){
	       $(elem).removeClass("active");
	    });
	    $(this).addClass("active");  

	    $("#product-code").val($.trim(tableData[0]));
	    $("#product-name").val($.trim(tableData[1]));
	    $("#unit-id").val($.trim(tableData[2]));
	    $("#unit-qty").val($.trim(tableData[3]));
	    $("#rec-qty").val($.trim(tableData[4]));
	    $("#cost-price").val($.trim(tableData[4]));
	    $("#purchase-rate").val($.trim(tableData[5]));
	    $("#row-amount").val($.trim(tableData[6]));
	});
});

$(function() {
    $("#unit-quantity").change(function(){
            setTarget();
    });
        $("#purchase-rate").change(function(){
            setTarget();
    });
});

function setTarget(){
    var a = $("#unit-quantity").val();
    var b = $("#purchase-rate").val();
    var c = $("#quantity").val();
    var data = (a * b * c);
    $('#total-ammount').val(data);
}

function getQuantity(){
    var rcvQty = document.getElementById("receive_quantity_limit").value;
    var changeQty = document.getElementById("unit-quantity").value;

    if(parseInt(changeQty) > parseInt(rcvQty) ){
            alert("Received quantity must be Less OR Equal to " + rcvQty);
            document.getElementById("unit-quantity").value = rcvQty;

        }
}

$(function() {
 $( '#comment' ).on( 'submit', function(e) {
        e.preventDefault();
      var name = $('#name').val();
      var message = $('#message').val();
      var postid = $('#post_id').val();
      $.ajax({
            type: "POST",
            url: host+'/comment/add',
            data: {name:name, message:message, post_id:postid}
            success: function( msg ) {
            alert( msg );
            }
        });
   });
});
</script>