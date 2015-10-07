@if ( $errors->any() )
    <div class="alert alert-danger alert-dismissable">
        <ul>
            @foreach($errors->all() as $message )
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif




<div class="modal-body">
    <div style="padding: 20px;">
    {{Form::hidden('user_id',$user_id)}}
        <div class='form-group'>
        <div>{{ Form::label('ever_admit_this_university', 'Ever admit this university ?') }}</div>
        <div><label class="small">{{ Form::radio('ever_admit_this_university','1') }} Yes</label>&nbsp;&nbsp;&nbsp;
        <label class="small">{{ Form::radio('ever_admit_this_university','0') }} No</label></div>
        </div>

        <div class='form-group'>
        <div>{{ Form::label('ever_dismiss', 'Ever dismiss ?') }}</div>
        <div><label class="small">{{ Form::radio('ever_dismiss','1') }} Yes</label>&nbsp;&nbsp;&nbsp;
        <label class="small">{{ Form::radio('ever_dismiss','0') }} No</label></div>
        </div>

        <div class='form-group'>
        <div>{{ Form::label('academic_honors_received', 'Academic honors received ?') }}</div>
        <div><label class="small">{{ Form::radio('academic_honors_received','1') }} Yes</label>&nbsp;&nbsp;&nbsp;
        <label class="small">{{ Form::radio('academic_honors_received','0') }} No</label></div>
        </div>

        <div class='form-group'>
        <div>{{ Form::label('ever_admit_other_university', 'Ever admit other university ?') }}</div>
        <div><label class="small">{{ Form::radio('ever_admit_other_university','1') }} Yes</label>&nbsp;&nbsp;&nbsp;
        <label class="small">{{ Form::radio('ever_admit_other_university','0') }} No</label></div>
        </div>

        <div class='form-group'>
        {{ Form::label('admission_test_center', 'Admission test Center ') }}
        {{ Form::select('admission_test_center',['' => 'Select one',
        'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'],Input::old('admission_test_center'),
        ['class'=>'form-control','required']) }}
        </div>

        <p>&nbsp;</p>
    <div class='form-group'>
    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    </div>
    </div>
</div>



