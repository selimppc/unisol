
<div style="padding: 0px 20px 20px 20px;">
    <div class="form-group">
       {{ Form::label('year_id', 'Year') }}
       {{ Form::select('year_id', $year, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}
    </div>

    <div class="form-group">
       {{ Form::label('month', 'Month') }}
       {{ Form::select('month', array('' => 'Select Month ') + $month,Input::old('month'), array('class' => 'form-control','required'=>'required') ) }}
    </div>

    <div class="form-group">
        {{ Form::label('day', 'Day') }}
        {{ Form::select('day', array('' => 'Select Day ') + $day,Input::old('day'), array('class' => 'form-control','required'=>'required') ) }}
    </div>

    <div class="form-group">
    {{ Form::label('status', 'Status') }}
        <div>{{ Form::select ('status',  array('' => 'Select one',
            'full-day' => 'Full Day', 'half-day' => 'Half Day','not-working-day'=>'Not Working Day',
            'weekend'=>'Weekend','holiday'=>'Holiday','vacation'=>'Vacation'), Input::old('status'),
             array('class' => 'form-control ','required')) }}</div>
         </div>
    </div>

    {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>