<script type="text/javascript">

 $(function(){

     $tableItemCounter = 0; //To stop additem if exist
     $("#add-pvd-config").click(function(event){
         $config_id = $("#id").val();
         $employee_type = $("#employee_type").val();
         $contribution_amount = $("#contribution_amount").val();
         $company_contribution_0 = $("#company_contribution_0").val();
         $company_contribution_25 = $("#company_contribution_25").val();
         $company_contribution_50 = $("#company_contribution_50").val();
         $company_contribution_75 = $("#company_contribution_75").val();
         $company_contribution_100 = $("#company_contribution_100").val();

         if($contribution_amount == "" || $company_contribution_0 == "" || $company_contribution_25 == "" ||
              $company_contribution_50 == "" || $company_contribution_75 == "" || $company_contribution_100 == ""){
//              alert("Please Provide All and Then Try Again!");
              document.getElementById('something-added').innerHTML=" Please fill up  all fields and try again to add!";
              return false;
         }else{
              document.getElementById('something-added').innerHTML="";
         }

         $('#test').append("<tr> " +
              "<td><input name='id' value='"+ $config_id +"' readonly> </td>" +
              "<td><input name='employee_type' value='Permanent' readonly> </td>" +
              "<td><input name='contribution_amount' value='"+ $contribution_amount +"' readonly> </td>" +
              "<td><input name='company_contribution_0' value='"+ $company_contribution_0 +"' readonly> </td>" +
              "<td><input name='company_contribution_25' value='"+ $company_contribution_25 +"' readonly> </td>" +
              "<td><input name='company_contribution_50' value='"+ $company_contribution_50 +"' readonly></td>" +
              "<td><input name='company_contribution_75' value='"+ $company_contribution_75 +"' readonly></td>" +
              "<td><input name='company_contribution_100' value='"+ $company_contribution_100 +"' readonly></td>" +
              "<td></td>"+
         "</tr>");
 	 });

    //delete
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'provident-fund-config/delete',
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

$(function(){
     $('.edit').click(function() {
        $(".ok-123").hide();
        return false;
     });
});
</script>