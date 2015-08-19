<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Department</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'department/show/','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Department Name:</td>
                <td>
                    {{isset($department->title) ? $department->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Department Head:</td>
                <td>
                    {{--{{ User::FullName(isset($department->dept_head_user_id)) ? $department->dept_head_user_id : '' }}--}}
                    {{ User::FullName($department->dept_head_user_id)  }}
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    {{isset($department->description ) ? $department->description  : '' }}
                </td>
            </tr>
        </table>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/department/')}}" class="btn btn-default">Close </a>
</div>
