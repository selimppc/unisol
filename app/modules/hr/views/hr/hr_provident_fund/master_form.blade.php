
<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">

<div class="form-group">
        <div class="col-lg-4" style="padding-left: 0;">
          {{ Form::label('hr_employee_id', 'HR Employee') }}<span class="text-danger">*</span>
          {{ Form::select('hr_employee_id', $employee_list, Input::old('hr_employee_id'), array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
           {{ Form::label('date', 'Date') }}
           {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker']) }}
        </div>
    </div>
    <div class="form-group">
       {{ Form::label('month', 'Month') }}
       {{ Form::select('month', array('' => 'Select Month ') + $month,Input::old('month'), array('class' => 'form-control','required'=>'required') ) }}
    </div>

    <div class='form-group'>
       {{ Form::label('employee_contribution_amount', 'Employee Contribution Amount') }}
       {{ Form::text('employee_contribution_amount', Input::old('employee_contribution_amount'),['class'=>'form-control', 'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('company_contribution_amount', 'Company Contribution Amount') }}
       {{ Form::text('company_contribution_amount', Input::old('company_contribution_amount'),['class'=>'form-control', 'required']) }}
    </div>

    <div class="form-group" >
         {{ Form::label('status', 'Status') }}
         {{ Form::select ('status',  array('' => 'Select one',
             'open' => 'Open', 'pending' => 'Pending','approved'=>'Approved',
             'cancel'=>'Cancel'), Input::old('status'),
              array('class' => 'form-control ','required')) }}

    </div>
</div>

<div class="table-hide">
<p>
    <b> Loan Detail</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
    </thead>

    <tbody id="test"> </tbody>

    <tbody>
      <?php $counter = 0;?>
        @foreach($model as $values)
         <tr>
            <td>{{ $values->amount }}</td>
            <td>{{ $values->date }}</td>
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

     $("#add-hr-loan-detail").click(function(event){
         var $ln_hd_id = "<?php echo $loan_head_id; ?>";

         $loan_head_id = $ln_hd_id;
         $hr_ln_dtl_amount = $("#hr_loan_detail_amount").val();
         $hr_ln_dtl_date = $("#hr_loan_detail_date").val();

         if($hr_ln_dtl_amount==null || $hr_ln_dtl_date==null ){
             alert("please Provide All Salary Transaction Details and then try Again!");
             return false;
         }else{
             $hr_loan_head_id = $ln_hd_id; // Salary Transaction ID

             var index = $.inArray($ln_hd_id, $arrayRnc);
             if (index>=0) {
                 alert("You already added this Salary Transaction in the below table");
                 //also flash the existing text field
                 $("#hr_loan_detail_amount").val("");
                 $("#hr_loan_detail_date").val("");

                 return false;
             } else {
                $('#test').append("<tr> " +
                      "<td><input type='hidden' name='hr_salary_transaction_id' value='" + $ln_hd_id + "' readonly>" +"<input name='amount[]' value='"+ $hr_ln_dtl_amount +"' readonly></td>" +
                       "<td><input name='date[]' value='"+ $hr_ln_dtl_date +"' readonly></td>" +
                  " </tr>");

                 $arrayRnc.push($hr_loan_head_id);

                 //flush the input fields
                 $("#hr_loan_detail_amount").val("");
                 $("#hr_loan_detail_date").val("");
             }
         }
 	 });

    //delete : ok
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'ajax-delete-salary-trn-dtl',
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