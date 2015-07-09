<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
    <div class='form-group'>
      {{ Form::hidden('hr_salary_id', $s_id , Input::old('hr_salary_id'),['class'=>'form-control', 'required']) }}
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'),['id'=>'salary_allowance_title','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('hr_allowance_id', 'Allowance') }}
           {{ Form::select('hr_allowance_id',$allowance_list ,Input::old('hr_allowance_id'),['id'=>'salary_allowance_list','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
          {{ Form::label('is_percentage', 'Is Percentage ?') }}
          {{ Form::select('is_percentage',array('yes'=>'Yes','no'=>'No') , Input::old('is_percentage'),['id'=>'salary_allowance_is_percentage','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('percentage', 'Percentage(%)') }}
             {{ Form::text('percentage', Input::old('percentage'),['id'=>'salary_allowance_percentage','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
            {{ Form::label('allowance_type', 'Allowance Type') }}
             {{ Form::select('allowance_type' , array(''=>'Select Allowance Type','%-of-basic'=>'% of Basic','fixed-amount'=>'Fixed Amount') ,
                Input::old('allowance_type'),['id'=>'salary_allowance_all_type','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
          {{ Form::label('amount', 'Amount') }}
            {{ Form::text('amount', Input::old('amount'),['id'=>'salary_allowance_amount','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('status', 'Status') }}
             {{ Form::select('status',array(''=>'Select Status','active'=>'active','close'=>'close'),
                Input::old('status'),['id'=>'salary_allowance_status','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group'>
            <input type="button" class="pull-right btn-xs btn-linkedin" id="add-salary-allowance" value="+Add">
         </div>
    </div>

</div>

<div class="table-hide">
<p>
    <b> Salary Allowance</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
        <th>Allowance</th>
        <th>Title</th>
        <th>Is Percentage ?</th>
        <th>Percentage</th>
        <th>Allowance Type</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>
    </thead>

    <tbody id="test">

    </tbody>

    <tbody>
      <?php $counter = 0;?>
       @foreach($model as $values)
            <tr>
               <td>{{ $values->relHrAllowance->title }}</td>
              <td>{{ $values->title }}</td>
              <td>{{ $values->is_percentage }}</td>
              <td>{{ $values->percentage }}</td>
              <td>{{ ($values->allowance_type) }}</td>
              <td>{{ $values->amount }}</td>
              <td>{{ ucfirst($values->status) }}</td>

               <td>
                   <a data-href="{{ $values->id }}" class="btn btn-default btn-sm delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 15px;color: red"></i></a>
               </td>
            </tr>
             <?php $counter++;?>
       @endforeach
    </tbody>
</table>

<div class="modal-footer">
    {{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success', 'style'=>'padding: 1.5%;'] ) }}
        <button class="btn btn-primary btn-large" data-dismiss="modal" type="button">Close</button>
</div>
</div>
<p>&nbsp;</p>

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
$(function(){

    //Beneficial Add(s) : ok
     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

     $("#add-salary-allowance").click(function(event){
         var $sal_id = "<?php echo $s_id; ?>";

         $salary_id = $sal_id;
         $sal_all_title = $("#salary_allowance_title").val();
         $sal_allowance_id = $("#salary_allowance_list").val();
         $sal_all_is_percentage = $("#salary_allowance_is_percentage").val();
         $sal_all_percentage = $("#salary_allowance_percentage").val();
         $sal_all_allowance_type = $("#salary_allowance_all_type").val();
         $sal_all_amount = $("#salary_allowance_amount").val();
         $sal_all_status = $("#salary_allowance_status").val();

         if($sal_all_title==null || $sal_all_is_percentage==null || $sal_all_percentage==null ||
            $sal_all_allowance_type==null || $sal_all_amount==null || $sal_all_status == null ){
             alert("please Provide All Salary Transaction Details and then try Again!");
             return false;
         }else{
             $salary_id = $sal_id; // Salary Transaction ID
             alert($sal_id);

             var index = $.inArray($sal_id, $arrayRnc);
             if (index>=0) {
                 alert("You already added this Salary Transaction in the below table");
                 //also flash the existing text field
                 $("#salary_allowance_title").val("");
                 $("#salary_allowance_list").val("");
                 $("#salary_allowance_is_percentage").val("");
                 $("#salary_allowance_percentage").val("");
                 $("#salary_allowance_all_type").val("");
                 $("#salary_allowance_amount").val("");
                 $("#salary_allowance_status").val("");

                 return false;
             } else {
                $('#test').append("<tr> " +
                      "<td><input type='hidden' name='hr_salary_id' value='" + $sal_id + "' readonly><input name='title[]' value='"+ $sal_all_title +"' readonly></td>" +
                      "<td><input name='hr_allowance_id[]' value='"+ $sal_allowance_id +"' readonly> </td>" +
                      "<td><input name='is_percentage[]' value='"+ $sal_all_is_percentage +"' readonly> </td>" +
                      "<td><input name='percentage[]' value='"+ $sal_all_percentage +"' readonly> </td>" +
                      "<td><input name='allowance_type[]' value='"+ $sal_all_allowance_type +"' readonly> </td>" +
                      "<td><input name='amount[]' value='"+ $sal_all_amount +"' readonly></td>" +
                      "<td><input name='status[]' value='"+ $sal_all_status +"' readonly></td>" +

                  " </tr>");

                 $arrayRnc.push($salary_id);

                 //flush the input fields
                $("#salary_allowance_title").val("");
                $("#salary_allowance_list").val("");
                $("#salary_allowance_is_percentage").val("");
                $("#salary_allowance_percentage").val("");
                $("#salary_allowance_all_type").val("");
                $("#salary_allowance_amount").val("");
                $("#salary_allowance_status").val("");
             }
         }
 	 });

    //delete : ok
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'hr-salary-allowace-ajax-delete',
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