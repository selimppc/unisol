
<script type="text/javascript">
$(function(){

     $tableItemCounter = 0; //To stop additem if exist
     $("#add-leave-type").click(function(event){
         $leave_type_id = $("#id").val();
         $title = $("#title").val();
         $code = $("#code").val();
         $employee_type = $("#employee_type").val();

         if($title == "" || $code == "" || $employee_type == ""){
//              alert("Please Provide All and Then Try Again!");
              document.getElementById('something-added').innerHTML=" Please fill up  all fields and try again to add!";
              return false;
         }else{
              document.getElementById('something-added').innerHTML="";
         }
         $('#test').append("<tr> " +
              "<td hidden='hidden'><input name='id' value='"+ $leave_type_id +"' readonly> </td>" +
              "<td><input name='title'  value='"+ $title +"' readonly> </td>" +
              "<td><input name='code' value='"+ $code +"' readonly> </td>" +
              "<td><input name='employee_type' value='"+ $employee_type +"' readonly> </td>" +
         "</tr>");
 	 });

      //edit
   	 $(".type").click(function(event){
           var $row = $(this).closest("tr");
           $id = $row.find(".leave_type_id").text();
           $data_1 = $row.find(".title").text();
           $data_2 = $row.find(".code").text();
           $data_3 = $row.find(".employee_type").text();

           $(".ok-456").show();

           $('.view').html("<tr> " +"" +
          "<td hidden='hidden'><input name='leave_type_id' value='"+ $id +"'></td>"+
          "<td><input name='title' value='"+ $data_1 +"'> </td>" +
          "<td><input name='code' value='"+ $data_2 +"'> </td>" +
          "<td>" +
             "<select id=emp-type>" +
                "<option>Permanent</option>" + "<option>Full-Time</option>" +
                "<option>Part-Time</option>" + "<option>Contractual</option>" +
                "<option>Project</option>" +
             "</select>" +
          "</td>" +
          "</tr>");

          $("#emp-type").show();
      	 });

    //delete
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'leave-type/delete',
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
     $('.lt-edit').click(function() {
        $(".ok-123").hide();
//        $(".ok-456").show();
        return false;
     });
});
</script>