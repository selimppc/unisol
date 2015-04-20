<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">
    <p> Total Marks: {{ $data->relCourse->evaluation_total_marks}}</p>
    <div class="form-horizontal">
        <div class="form-group">
            {{ Form::hidden('course_id', $data->course_id, ['class'=>'course_id'])}}
            {{ Form::hidden('course_title', $data->relCourse->title, ['class'=>'course_title'])}}
            {{ Form::hidden('course_evaluation_total_marks', $data->relCourse->evaluation_total_marks, ['class'=>'course_evalution_marks'])}}
        </div>
        <div class="form-group">
            <div class="col-md-4">
                {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDistItem::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addConfigListItem']) }}
            </div>
            <div class="col-md-4">
                {{ Form::submit('ADD', ['class'=>'btn btn-info addConfigList','onClick'=>'addCourseListItem()']) }}
            </div>
        </div>
    </div>
    {{ Form::open(array('url'=>'academic/amw/course/marks/save','method' => '')) }}
    <table class="table table-bordered small-header-table" id="amwCourseConfig">
        <thead>
        <th>Item</th>
        <th>Marks (%)</th>
        <th>Actual Marks</th>
        <th>Read Only</th>
        <th>Default Item?</th>
        <th>Is Attendance</th>
        <th>Action</th>
        </thead>
        <tbody class="acm_course_config_list">

        </tbody>
        <tr>
            <td colspan="7">{{ Form::submit('Submit', ['class'=>'btn btn-info'] ) }}</td>
        </tr>
    </table>
    {{Form::close()}}
</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/amw/config/')}}" class="btn btn-default">Close </a>
</div>