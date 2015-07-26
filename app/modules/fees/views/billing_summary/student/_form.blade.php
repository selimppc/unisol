<div class='form-group'>
    <div>{{ Form::label('student_user_id', 'Student Name') }}</div>
    <div> {{ Form::select('student_user_id',$student, Input::old('student_user_id'), ['class'=>'form-control','required'=>'required'] ) }}
    </div>
</div>

<div class='form-group'>
    {{ Form::label('billing_schedule_id', 'Schedule') }}
    {{ Form::select('billing_schedule_id', $schedule,Input::old('billing_schedule_id'), ['class' => 'form-control','required'=>'required']) }}
</div>

<div class='form-group'>
    <div>{{ Form::label('payment_option_id', 'Payment Option') }}</div>
    <div> {{ Form::select('payment_option_id',$payment_option, Input::old('payment_option_id'), ['class'=>'form-control','required'=>'required'] ) }}
    </div>
</div>

{{--<div class='form-group'>
    {{ Form::label('total_cost', 'Total Cost') }}
    {{ Form::text('total_cost', Input::old('total_cost'), ['class' => 'form-control','placeholder'=>'0.00']) }}
</div>--}}

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
    <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>
