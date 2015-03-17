<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Department</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'department/show/','method' => '')) }}
            <div class="jumbotron text-center">
                <h2><strong> Department Name:</strong>  {{ $department->title }}</h2>
                <h2><strong> Department Head:</strong>  {{ User::FullName($department->dept_head_user_id)  }}</h2>
                <h2>
                    <strong> Description:</strong> {{ $department->description }}
                </h2>
            </div>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/department/index')}}" class="btn btn-default">Close </a>
</div>
