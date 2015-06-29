<div class='form-group'>
   {{--{{ Form::label('hr_loan_head_id', 'Loan Head Name') }}--}}
   {{ Form::hidden('hr_loan_head_id', $loan_head_id , Input::old('hr_loan_head_id')) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount',  Input::old('amount'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
