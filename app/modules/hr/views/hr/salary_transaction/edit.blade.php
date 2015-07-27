<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Update Salary Transaction </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        {{Form::model($model, ['route'=> ['salary_transaction.edit', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
                {{ Form::hidden('id', $model->id) }}

                <div class='form-group'>
                   {{ Form::label('hr_employee_id', 'Employee Name') }}
                   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('trn_number', 'Transaction Number') }}
                   {{ Form::hidden('trn_number', Input::old('trn_number'),['class'=>'form-control','readonly']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('date', 'Date') }}
                   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('year_id', 'Year') }}
                   {{ Form::select('year_id',$year_list ,null,['class'=>'form-control', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('period', 'Month') }}
                   {{ Form::select('period', [''=>'Select Month','january'=>'January','february'=>'February','march'=>'March','april'=>'April','may'=>'May','june'=>'June','july'=>'July','august'=>'August','september'=>'September','october'=>'October','november'=>'November','december'=>'December'],Input::old('period'),['class'=>'form-control', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('status', 'Status') }}
                   {{ Form::select('status',array(''=>'Select Status','open'=>'open','ask-for-interview'=>'ask for interview','approved'=>'approved','denied'=>'denied','request-for-update'=>'request for update'), Input::old('status'),['class'=>'form-control', 'required']) }}
                </div>

                {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
                <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

        {{ Form::close() }}
    </div>
</div>
