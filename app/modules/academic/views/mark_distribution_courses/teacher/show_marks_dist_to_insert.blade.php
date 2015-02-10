<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">

    <p> Total Marks: {{ $datas->relCourse->evaluation_total_marks}}</p>

    <div class="form-horizontal">
        <div class="form-group">
            {{ Form::text('course_id', $datas->course_id, ['class'=>'form-control course_id'])}}
            {{ Form::hidden('course_title', $datas->relCourse->course_title, ['class'=>'form-control course_title'])}}
            {{ Form::hidden('course_evaluation_total_marks', $datas->relCourse->evaluation_total_marks, ['class'=>'course_evalution_marks'])}}

        </div>
        <?php
       // $list = AcmMarksDist::orderBy('title')->lists('title', 'id');
       $php_array = array('a','b','c','d');
        ?>
        <div class="form-group">
            <div class="col-md-4">
                {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addDistListItem']) }}
            </div>
            <div class="col-md-4">
                {{ Form::submit('ADD', ['class'=>'btn btn-info addConfigList','onClick'=>'addMarksDistItem()']) }}
            </div>
        </div>
    </div>


    {{ Form::open(array('url'=>'amw/course/marks/save','method' => '')) }}
    <table class="table table-bordered small-header-table" id="amwCourseConfig">
        <thead>
        <th>Item</th>
        <th>Marks (%)</th>
        <th>Actual Marks</th>
        <th>Read Only</th>
        <th>Default Item?</th>
        <th>Is Attendance</th>
        <th>Policy</th>
        <th>Action</th>
        </thead>

        <tbody class="acm_marks_dist_list">

        {{ Form::hidden('course_management_id', $datas->id, ['class'=>'form-control course_management_id'])}}
        {{ Form::text('course_type_id', $datas->course_type_id, ['class'=>'form-control course_type'])}}

        </tbody>

        <tr>
            <td colspan="7">{{ Form::submit('Submit', ['class'=>'btn btn-info'] ) }}</td>
        </tr>

    </table>
    {{Form::close()}}

</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/teacher/')}}" class="btn btn-default">Close </a>
</div>