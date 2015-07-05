
<div style="padding: 0px 20px 20px 20px;">

    <div class="form-group">
      {{ Form::label('hr_employee_id', 'HR Employee') }}<span class="text-danger">*</span>
      {{ Form::select('hr_employee_id', $employee_list, Input::old('hr_employee_id'), array('class' => 'form-control','required'=>'required')) }}
    </div>

    <div class='form-group'>
       {{ Form::label('date', 'Date') }}
       {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker']) }}
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

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>