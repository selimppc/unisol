<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Department</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{Form::open(array('url'=>'department/update/'.$department->id, 'class'=>'form-horizontal'))}}
        <div>{{ Form::label('dept_name','Department Name:') }}</div>
        <div> {{ Form::text('dept_name',$department->title, array('class' => 'form-control')) }}</div>
        <div>{{ Form::label('dept_head_user_id', 'Department Head') }}</div>
        <div>{{ Form::select('dept_head_user_id', $facultyList,($department->dept_head_user_id) ? $department->dept_head_user_id : Input::old('dept_head_user_id'),['class'=>'form-control','required']) }}</div>
        <div>{{ Form::label('description', 'Description:') }}</div>
        <div>{{ Form::textarea('description',$department->description, array('class' => 'form-control')) }}</div>
        <p>&nbsp;</p>
        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
        {{Form::close()}}
    </div>
</div>
<div class="modal-footer">
</div>



