
<div style="padding: 0px 20px 20px 20px;">

    <div class="form-group">
      {{ Form::label('hr_employee_id', 'HR Employee') }}<span class="text-danger">*</span>
      {{ Form::select('hr_employee_id', $employee_list, Input::old('hr_employee_id'), array('class' => 'form-control','required'=>'required')) }}
    </div>

    <div class='form-group'>
       {{ Form::label('date', 'Date') }}
       {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('sign_in_time', 'Sign In Time') }}
       {{ Form::Select('sign_in_time',
           array(''=>'Select Time','08:00:00'=>'08:00:00','08:30:00'=>'08:30:00','09:00:00'=>'09:00:00','09:30:00'=>'09:30:00',
               '10:00:00'=>'10:00:00','10:30:00'=>'10:30:00','11:00:00'=>'11:00:00','11:30:00'=>'11:30:00',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('sign_in_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('sign_out_time', 'Sign Out Time') }}
       {{ Form::Select('sign_out_time',
           array(''=>'Select Time','08:00:00'=>'08:00:00','08:30:00'=>'08:30:00','09:00:00'=>'09:00:00','09:30:00'=>'09:30:00',
               '10:00:00'=>'10:00:00','10:30:00'=>'10:30:00','11:00:00'=>'11:00:00','11:30:00'=>'11:30:00',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('sign_out_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('lunch_break_out_time', 'Lunch Break Out Time') }}
       {{ Form::Select('lunch_break_out_time',
           array(''=>'Select Time',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('lunch_break_out_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('lunch_break_in_time', 'Lunch Break In Time') }}
       {{ Form::Select('lunch_break_in_time',
           array(''=>'Select Time',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('lunch_break_in_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('break_out_time', 'Break Out Time') }}
       {{ Form::Select('break_out_time',
           array(''=>'Select Time','08:00:00'=>'08:00:00','08:30:00'=>'08:30:00','09:00:00'=>'09:00:00','09:30:00'=>'09:30:00',
               '10:00:00'=>'10:00:00','10:30:00'=>'10:30:00','11:00:00'=>'11:00:00','11:30:00'=>'11:30:00',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('break_out_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('break_in_time', 'Break In Time') }}
       {{ Form::Select('break_in_time',
           array(''=>'Select Time','08:00:00'=>'08:00:00','08:30:00'=>'08:30:00','09:00:00'=>'09:00:00','09:30:00'=>'09:30:00',
               '10:00:00'=>'10:00:00','10:30:00'=>'10:30:00','11:00:00'=>'11:00:00','11:30:00'=>'11:30:00',
               '12:00:00'=>'12:00:00','12:30:00'=>'12:30:00','01:00:00'=>'01:00:00','01:30:00'=>'01:30:00',
               '02:00:00'=>'02:00:00','02:30:00'=>'02:30:00','03:00:00'=>'03:00:00','03:30:00'=>'03:30:00',
               '04:00:00'=>'04:00:00','04:30:00'=>'04:30:00','05:00:00'=>'05:00:00','05:30:00'=>'05:30:00'),
           Input::old('break_in_time'),['class'=>'form-control ','required'=>'required']) }}
    </div>

    <div class='form-group'>
           {{ Form::label('note', 'Note') }}
           {{ Form::text('note',  Input::old('note'),['class'=>'form-control ']) }}
        </div>

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>