<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large"> Add/Edit Marks Distribution Item for Course:
        {{$data->relCourse->title}}</h4>
</div>
<div class="modal-body">
    <p>Evaluation Total Marks:
        <b>{{ isset($data->relCourse->evaluation_total_marks) ? $data->relCourse->evaluation_total_marks : 'No Item Added!'}}</b>
    </p>
    <p>So Far Added Marks:
        <b>@foreach($totalmarks as $value)
                {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
            @endforeach</b>
    </p>
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
                {{ Form::submit('ADD', ['class'=>'btn btn-xs btn-success addConfigList','onClick'=>'addCourseListItem()']) }}
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
        {{ Form::hidden('course_conduct_id', $data->id, ['class'=>'form-control course_management_id'])}}
        {{ Form::hidden('course_type_id', $data->relCourse->course_type_id, ['class'=>'form-control course_type'])}}
        <?php $counter = 0;?>
        @foreach($course_data as $key=>$value)
            <tr>
                <td width="130">
                    {{ Form::hidden('acm_config_id[]', $value->isConfigId)}}
                    {{ Form::hidden('acm_marks_dist_item_id[]', $value->item_id, ['class'=>'acm_marks_dist_item_id'])}}
                    {{ Form::hidden('course_id[]', $value->course_id2, ['class'=>'get_course_id']) }}
                    {{ $value->acm_dist_item_title}}
                </td>
                <td><input type="text" name="marks_percent[]" value="{{ ($value->actual_marks/$value->evaluation_total_marks) * 100 }}" class="amw_marks_percent{{$key}}" onchange="calculateActualMarks(this.className, {{$value->evaluation_total_marks}},this.value)" required/> </td>
                <td>
                    <input type="text" name="actual_marks[]" value="{{$value->actual_marks}}" class="amw_actual_marks" readonly/>
                </td>
                <td>{{ Form::checkbox('isReadOnly[]', $counter, ($value->readonly)? $value->readonly : Input::old('isReadOnly'.$key)) }}</td>
                <td>{{ Form::radio('isDefault[]', $counter, ($value->default_item) ? $value->default_item : Input::old('isDefault'.$key)) }}</td>
                <td>{{ Form::radio('isAttendance[]', $counter, ($value->is_attendance) ? $value->is_attendance : Input::old('isAttendance'.$key)) }}</td>
                <td><a class="btn btn-default btn-sm" id="removeTrId{{$key}}" onClick="deleteNearestTr(this.id, {{$value->isConfigId}})"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>
                </td>
            </tr>
            <?php $counter++;?>
            <script>
                // Add item is to arrayList at edit time.
                item_id = <?php echo($value->item_id) ?>;
                editCourseListItem(item_id);
            </script>
        @endforeach
        </tbody>
        <tr>
            <td colspan="7">{{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success'] ) }}</td>
        </tr>
    </table>
    {{Form::close()}}
    <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
    </div>

</div>

