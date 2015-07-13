<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_in', 'Sign In') }}
   {{ Form::text('sign_in',  Input::old('sign_in'),['class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_out', 'Sign Out') }}
   {{ Form::text('sign_out',  Input::old('sign_out'),['class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('unit_cost', 'Unit Cost') }}
   {{ Form::text('unit_cost',  Input::old('unit_cost'),['class'=>'unit form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('quantity', 'Quantity') }}
   {{ Form::text('quantity',  Input::old('quantity'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount',  Input::old('amount'),['class'=>'amount form-control','id'=>'amount']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status',[''=>'Select Status','active'=>'active','close'=>'close'], Input::old('status'),['class'=>'form-control', 'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>



<script type="text/javascript">

//$(function(){
//    $('.amount').change(function(){
//           var a = $('.unit').val();
//           var b = $('.hour').val();
//
//           var amount = document.getElementById('amount');
//           var myResult = a * b;
//           amount.value = myResult;
//
//           $('.std_amount').prop('disabled', true);
//     });
//});

</script>
