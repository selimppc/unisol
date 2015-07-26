
<script type="text/javascript">
$(function(){
    //add leave-type data........................................................
     $("#add-leave-type").click(function(event){
         $leave_type_id = $("#id").val();
         $title = $("#title").val();
         $code = $("#code").val();
         $employee_type = $("#employee_type").val();

         if($title == "" || $code == "" || $employee_type == ""){
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

      //edit............................................
      /*hide fields for inserting data  */
      $(function(){
           $('.lt-edit').click(function() {
              $(".text-field").hide();
              return false;
           });
      });
     /*show data to edit */
   	 $(".type-of-emp").click(function(event){
           var $row = $(this).closest("tr");
           $id = $row.find(".leave_type_id").text();
           $data_1 = $row.find(".title").text();
           $data_2 = $row.find(".code").text();
           $data_3 = $row.find(".employee_type").text();

           $(".table-data").show();

           $('.view').html("<tr> " +"" +
          "<td hidden='hidden'><input name='leave_type_id' value='"+ $id +"'></td>"+
          "<td><input name='title' value='"+ $data_1 +"'> </td>" +
          "<td><input name='code' value='"+ $data_2 +"'> </td>" +
          "<td>" +
             "<select id ='emp-type' name='employee_type'>" +
                "<option >Permanent</option>" + "<option >Full-Time</option>" +
                "<option>Part-Time</option>" + "<option>Contractual</option>" +
                "<option>Project</option>" +
             "</select>" +
          "</td>" +
          "</tr>");

      /*show employee-type in dropdown */
     $("#emp-type").show();
     });

     /*show selected employee-type in dropdown */
     $('.selected-emp').click(function(){
           employee_type = $data_3;
           $("#emp-type").val(employee_type);
     });

    //delete.........................................
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

</script>


