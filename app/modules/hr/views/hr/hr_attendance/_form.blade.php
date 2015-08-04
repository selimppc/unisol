
<div style="padding: 0px 20px 20px 20px;">

    <div class="form-group">
      {{ Form::label('hr_employee_id', 'HR Employee') }}<span class="text-danger">*</span>
      {{ Form::select('hr_employee_id', $employee_list, Input::old('hr_employee_id'), array('class' => 'form-control','required'=>'required')) }}
    </div>

   <div class='form-group'>
        <div class="col-lg-4" style="padding-left: 0;">
           {{ Form::label('date', 'Date') }}
           {{ Form::text('date',Input::old('date'),['class'=>'form-control date_picker','required']) }}
        </div>
        <div class="col-lg-4" style="padding-left: 0;">
           {{ Form::label('sign_in_time', 'Sign In Time') }}
           {{ Form::text('sign_in_time',Input::old('sign_in_time'),['class'=>'form-control date_picker','required']) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
           {{ Form::label('sign_out_time', 'Sign Out Time') }}
            {{ Form::text('sign_out_time',Input::old('sign_out_time'),['class'=>'form-control date_picker']) }}
        </div>
   </div>
<p>&nbsp;</p>
    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
           {{ Form::label('lunch_break_out_time', 'Lunch Break Out Time') }}
           {{ Form::text('lunch_break_out_time',Input::old('lunch_break_out_time'),['class'=>'form-control date_picker']) }}
        </div>

        <div class="col-lg-6" style="padding-right: 0;">
           {{ Form::label('lunch_break_in_time', 'Lunch Break In Time') }}
           {{ Form::text('lunch_break_in_time',Input::old('lunch_break_in_time'),['class'=>'form-control date_picker']) }}
        </div>
    </div>
<p>&nbsp;</p>
    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
           {{ Form::label('break_out_time', 'Break Out Time') }}
           {{ Form::text('break_out_time',Input::old('break_out_time'),['class'=>'form-control date_picker']) }}
        </div>

        <div class="col-lg-6" style="padding-right: 0;">
           {{ Form::label('break_in_time', 'Break In Time') }}
           {{ Form::text('break_in_time',Input::old('break_in_time'),['class'=>'form-control date_picker']) }}
        </div>
    </div>
 <p>&nbsp;</p>
    <div class='form-group'>
           {{ Form::label('note', 'Note') }}
           {{ Form::textarea('note',  Input::old('note'),['class'=>'form-control','size' => '18x4']) }}
    </div>

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>

 </div>

{{ HTML::script('assets/js/custom.js')}}