<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_in', 'Sign In') }}
   {{ Form::text('sign_in', Input::old('sign_in'),['id'=>'in_time','class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_out', 'Sign Out') }}
   {{ Form::text('sign_out', Input::old('sign_out'),['id'=>'out_time','class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('unit_cost', 'Unit Cost') }}
   {{ Form::text('unit_cost', Input::old('unit_cost'),['class'=>'form-control','id'=>'unit']) }}
</div>

<div class='form-group'>
   {{ Form::label('quantity', 'Quantity') }}
   {{ Form::text('quantity', Input::old('quantity'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount', Input::old('amount'),['class'=>'form-control','id'=>'amount']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status',[''=>'Select Status','active'=>'active','close'=>'close'], Input::old('status'),['class'=>'form-control', 'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>



<script type="text/javascript">

$(function(){
    $('#unit').change(function(){
        sign_time = $('#in_time').val();
        out_time = $('#out_time').val();
        unit = $('#unit').val();

        start_actual_time = new Date(sign_time);
        end_actual_time = new Date(out_time);

        diff = end_actual_time - start_actual_time;

        diffSeconds = diff / 1000;
        HH = Math.floor(diffSeconds / 3600);
        MM = Math.floor(diffSeconds % 3600) / 60;

        formatted = ( (MM <= 30) ? HH : HH+1 ) + "." + ( (MM <= 30) ? (5) : 0);

        // others
        var amount = document.getElementById('amount');
        var price = formatted * unit;
        amount.value = price;

    });
});

</script>
