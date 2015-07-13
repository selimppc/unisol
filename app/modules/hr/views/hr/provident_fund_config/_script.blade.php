
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
         "</tr>");
 	 });

      //edit
   	 $(".edit-pvd-config").click(function(event){
           var $row = $(this).closest("tr");
           $data_1 = $row.find(".et").text();
           $data_2 = $row.find(".ca").text();
           $data_3 = $row.find(".cc_0").text();
           $data_4 = $row.find(".cc_25").text();
           $data_5 = $row.find(".cc_50").text();
           $data_6 = $row.find(".cc_75").text();
           $data_7 = $row.find(".cc_100").text();
           $id = $row.find(".config-id").text();

           $(".ok-456").show();

           $('.view').html("<tr> " +"" +
          "<td hidden='hidden'><input name='config_id' value='"+ $id +"'></td>"+
          "<td ><input name='employee_type' value='"+ $data_1 +"'> </td>" +
          "<td ><input name='contribution_amount' value='"+ $data_2 +"'> </td>" +
          "<td ><input name='company_contribution_0' value='"+ $data_3 +"'> </td>" +
          "<td ><input name='company_contribution_25' value='"+ $data_4 +"'> </td>" +
          "<td ><input name='company_contribution_50' value='"+ $data_5 +"'> </td>" +
          "<td ><input name='company_contribution_75' value='"+ $data_6 +"'> </td>" +
          "<td ><input name='company_contribution_100' value='"+ $data_7 +"'> </td>" +
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
//        $(".ok-456").show();
        return false;
     });
});
</script>