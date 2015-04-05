<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit  Miscellaneous Information</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($model,array('url'=> array('apt/misc_info/update/'.$model->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

        <div class='form-group'>
            <div>{{ Form::label('ever_admit_this_university', 'Ever admit this university ?') }}</div>
            <div><label class="small">{{ Form::radio('ever_admit_this_university','1') }} Yes</label>
                <label class="small">{{ Form::radio('ever_admit_this_university','0') }} No</label></div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('ever_dismiss', 'Ever dismiss ?') }}</div>
            <div><label class="small">{{ Form::radio('ever_dismiss','1') }} Yes</label>
                <label class="small">{{ Form::radio('ever_dismiss','0') }} No</label></div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('academic_honors_received', 'Academic honors received ?') }}</div>
            <div><label class="small">{{ Form::radio('academic_honors_received','1') }} Yes</label>
                <label class="small">{{ Form::radio('academic_honors_received','0') }} No</label></div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('ever_admit_other_university', 'Ever admit other university ?') }}</div>
            <div><label class="small">{{ Form::radio('ever_admit_other_university','1') }} Yes</label>
                <label class="small">{{ Form::radio('ever_admit_other_university','0') }} No</label></div>
        </div>

        <div class='form-group'>
            {{ Form::label('admission_test_center', 'Admission test Center ') }}
            {{ Form::select('admission_test_center', array('' => 'Select one',
            'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),Input::old('admission_test_center'),
           ['required']) }}
        </div>

        <p>&nbsp;</p>
        <div class="modal-footer">
            {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
            <a href="{{URL::to('apt/misc_info/') }} " class="btn btn-default" span class="glyphicon-refresh">Close</a>
        </div>
        <p>&nbsp;</p>
        {{Form::close()}}

    </div>
</div>



