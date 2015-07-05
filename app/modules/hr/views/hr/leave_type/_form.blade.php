
<div style="padding: 0px 20px 20px 20px;">
    <div class='form-group'>
       {{ Form::label('title', 'Title') }}
       {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
    </div>

    <div class='form-group'>
       {{ Form::label('code', 'Code') }}
       {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'required']) }}
    </div>

    <div class="form-group">
        {{ Form::label('employee_type', 'Employee Type') }}
            <div>{{ Form::select ('employee_type',  array('' => 'Select one',
                'permanent' => 'Permanent', 'full-time' => 'Full Time','part-time'=>'Part Time','contractual'=>'Contractual','project'=>'Project'), Input::old('employee_type'),
                 array('class' => 'form-control ','required')) }}</div>
            </div>
    </div>

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>