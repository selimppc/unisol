<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
    <div class='form-group'>
       {{ Form::hidden('hr_loan_head_id',$loan_head_id , Input::old('hr_loan_head_id'),['class'=>'form-control']) }}
    </div>

    <div class='form-group'>
       {{ Form::hidden('hr_employee_id',$employee_id, Input::old('hr_employee_id'),['class'=>'form-control']) }}
    </div>

    <div class="col-sm-2">
        <div class='form-group'>
           {{ Form::label('title', 'Title') }}
           {{ Form::text('title',  Input::old('title'),['id'=>'hr_sal_deduction_title','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
        <div class='form-group'>
           {{ Form::label('type', 'Type') }}
           {{ Form::select('type', array(''=>'Select Type','loan'=>'Loan','salary-advance'=>'Salary Advance',
           'tax'=>'Tax','other'=>'Other'),Input::old('type'),['id'=>'hr_sal_deduction_type','class'=>'form-control']) }}
        </div>
    </div>

     <div class="col-sm-2">
         <div class='form-group'>
           {{ Form::label('hr_salary_advance_id', 'Salary Advance') }}
           {{ Form::select('hr_salary_advance_id',$salary_advance_list , Input::old('hr_salary_advance_id'),['id'=>'hr_sal_deduction_advance','class'=>'form-control']) }}
         </div>
     </div>

    <div class="col-sm-2">
        <div class='form-group'>
           {{ Form::label('amount', 'Amount') }}
           {{ Form::text('amount',  Input::old('amount'),['id'=>'hr_sal_deduction_amount','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
        <div class='form-group'>
           {{ Form::label('date', 'Date') }}
           {{ Form::text('date',  Input::old('date'),['id'=>'hr_sal_deduction_date','class'=>'form-control date_picker']) }}
        </div>
    </div>

    <div class="col-sm-2">
        <div class='form-group'>
           {{ Form::label('status', 'Status') }}
           {{ Form::select('status', array(''=>'Select Status','active'=>'Active','close'=>'Close') ,Input::old('status'),['id'=>'hr_sal_deduction_status','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group'>
            <input type="button" class="pull-right btn-xs btn-linkedin" id="add-salary-deduction" value="+Add">
         </div>
    </div>

</div>

<div class="table-hide">
<p>
    <b> Salary Transaction Detail</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
        <th>Title</th>
        <th>Type</th>
        <th>Salary Advance</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
    </thead>

    <tbody id="test">

    </tbody>

    <tbody>
      <?php $counter = 0;?>
       @foreach($model as $values)
            <tr>
               <td>{{ ucfirst($values->title) }}</td>
               <td>{{ ucfirst($values->type) }}</td>
               <td>{{ ucfirst($values->relHrSalaryAdvance->title) }}</td>
               <td>{{ $values->amount }}</td>
               <td>{{ $values->date }}</td>
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

     $("#add-salary-deduction").click(function(event){
         var $ln_hd_id = "<?php echo $loan_head_id; ?>";
         var $sal_dedc_employee_id = "<?php echo $employee_id; ?>";

         $loan_head_id = $ln_hd_id;
         $salary_deduction_employee_id = $sal_dedc_employee_id;

         $sal_deduction_title = $("#hr_sal_deduction_title").val();
         $sal_deduction_type = $("#hr_sal_deduction_type").val();
         $sal_salary_advance = $("#hr_sal_deduction_advance").val();
         $sal_deduction_amount = $("#hr_sal_deduction_amount").val();
         $sal_deduction_date = $("#hr_sal_deduction_date").val();
         $sal_deduction_status = $("#hr_sal_deduction_status").val();

         if($sal_deduction_title==null || $sal_deduction_type==null || $sal_salary_advance==null ||
                $sal_deduction_amount==null || $sal_deduction_date==null || $sal_deduction_status==null ){
             alert("please Provide All Salary Deduction and then try Again!");
             return false;
         }else{
             $hr_loan_head_id = $ln_hd_id; // Loan Head ID
             $hr_employee_id = $sal_dedc_employee_id; // Employee ID

             var index = $.inArray($arrayRnc);
             if (index>=0) {
                 alert("You already added this Salary Deduction in the below table");
                 //also flash the existing text field
                 $("#hr_sal_deduction_title").val("");
                 $("#hr_sal_deduction_type").val("");
                 $("#hr_sal_deduction_advance").val("");
                 $("#hr_sal_deduction_amount").val("");
                 $("#hr_sal_deduction_date").val("");
                 $("#hr_sal_deduction_status").val("");

                 return false;
             } else {
                $('#test').append("<tr> " +
                      "<td><input type='hidden' name='hr_loan_head_id[]' value='" + $ln_hd_id + "' readonly>" + "<input name='title[]' value='"+ $sal_deduction_title +"' readonly> </td>" +
                      "<td><input type='hidden' name='hr_employee_id' value='" + $sal_dedc_employee_id + "' readonly>" + "<input name='type[]' value='"+ $sal_deduction_type +"' readonly> </td>" +
                      "<td><input name='hr_salary_advance_id[]' value='"+ $sal_salary_advance +"' readonly></td>" +
                      "<td><input name='amount[]' value='"+ $sal_deduction_amount +"' readonly></td>" +
                      "<td><input name='date[]' value='"+ $sal_deduction_date +"' readonly></td>" +
                      "<td><input name='status[]' value='"+ $sal_deduction_status +"' readonly></td>" +
                  " </tr>");

                 $arrayRnc.push($hr_loan_head_id , $hr_employee_id);

                 //flush the input fields
                $("#hr_sal_deduction_title").val("");
                 $("#hr_sal_deduction_type").val("");
                 $("#hr_sal_deduction_advance").val("");
                 $("#hr_sal_deduction_amount").val("");
                 $("#hr_sal_deduction_date").val("");
                 $("#hr_sal_deduction_status").val("");
             }
         }
 	 });

    //delete : ok
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'hr-salary-deduction-ajax-delete',
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