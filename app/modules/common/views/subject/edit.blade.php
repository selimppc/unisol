<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Year</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($dep_data,array('url'=> array('subject/update',$dep_data->id), 'method' => 'POST')) }}

        <div class="form-group">
            <div>{{ Form::label('department_id', 'DepartmentName') }}</div>
            <div>{{ Form::select('department_id',$department,($dep_data->department_id) ? $dep_data->department_id :Input::old('department'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('title', 'SubjectName') }}</div>
            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('description', 'Description') }}</div>
            <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>

        <div>
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        </div>

        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">

</div>
