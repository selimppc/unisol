<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">

    <p> Total Marks: {{ $datas->relCourse->evaluation_total_marks}}</p>

    <div class="form-horizontal">
        <div class="form-group">
            {{ Form::hidden('course_id', $datas->course_id, ['class'=>'form-control course_id'])}}
            {{ Form::hidden('course_title', $datas->relCourse->course_title, ['class'=>'form-control course_title'])}}
            {{ Form::hidden('course_evaluation_total_marks', $datas->relCourse->evaluation_total_marks, ['class'=>'course_evalution_marks'])}}

        </div>

        <div class="form-group">
            <div class="col-md-4">
                {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addDistListItem']) }}
            </div>
            <div class="col-md-4">
                {{ Form::submit('ADD', ['class'=>'btn btn-info addConfigList','onClick'=>'addMarksDistItem()']) }}
            </div>
        </div>
    </div>


    {{ Form::open(array('url'=>'academic/faculty/marks/distribution/save','method' => '')) }}
    <table class="table table-bordered small-header-table" id="facultyMarksDist" >
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
        {{ Form::hidden('course_type_id', $datas->course_type_id, ['class'=>'form-control course_type'])}}
        <?php $counter = 0;?>
        @foreach($course_result as $key=>$value)

            <tr>
                <td width="130">
                    <?php if(isset($value->isMarksId)){?>
                    {{ Form::hidden('acm_marks_distribution_id[]', $value->isMarksId)}}
                    <?php }?>
                    {{ Form::hidden('acm_marks_dist_item_id[]', $value->item_id, ['class'=>'acm_marks_dist_item_id'])}}
                    {{ Form::hidden('course_id[]', $value->course_id2, ['class'=>'get_course_id']) }}
                    {{ $value->acm_dist_item_title}}
                </td>
                <td>

                    {{--To check readonly field--}}
                    @if($value->readonly == 1)
                        <input type="text" name="marks_percent[]" value="{{ ($value->actual_marks/$datas->relCourse->evaluation_total_marks) * 100 }}" class="amw_marks_percent{{$key}}" onchange="calculateActualMarks(this.className, {{$datas->relCourse->evaluation_total_marks}},this.value)" readonly required />
                    @else
                        <input type="text" name="marks_percent[]" value="{{ ($value->actual_marks/$datas->relCourse->evaluation_total_marks) * 100 }}" class="amw_marks_percent{{$key}}" onchange="calculateActualMarks(this.className, {{$datas->relCourse->evaluation_total_marks}},this.value)" required />
                    @endif

                </td>
                <td>
                      <input type="text" name="actual_marks[]" value="{{$value->actual_marks}}" class="amw_actual_marks" readonly/>
                </td>

                <td>
                    @if($value->readonly=='1')
                        Yes
                        {{ Form::checkbox('isReadOnly[]', $counter, ($value->readonly)? $value->readonly : Input::old('isReadOnly'.$key)) }}
                    @else
                        No
                    @endif
                        {{--{{ Form::text('isReadOnly[]', $value->readonly) }}--}}

                </td>
                <td>{{ Form::radio('isDefault[]', $counter, ($value->default_item) ? $value->default_item : Input::old('isDefault'.$key)) }}
                </td>

                {{--{{ Form::radio('isDefault[]', '1', $value->default_item==1, ['class'=>'radio'] ) }}--}}

                <td>{{ Form::radio('isAttendance[]', $counter, ($value->is_attendance) ? $value->is_attendance : Input::old('isAttendance'.$key)) }}</td>
                <td>
                   @if(isset($value->isMarksId))
                        {{ Form::select('policy_id[]', array(''=>'Select Option','1' => 'Attendance', '2' => 'Best One','3'=>'Average','4'=>'Average of Top N','5' => 'Sum','6' => 'Single'), $value->acm_marks_policy_id, array('data-parsley-trigger'=>'change','required'=>'required'))}}
                   @else
                        {{ Form::select('policy_id[]', array(''=>'Select Option','1' => 'Attendance', '2' => 'Best One','3'=>'Average','4'=>'Average of Top N','5' => 'Sum','6' => 'Single'), array('data-parsley-trigger'=>'change','required'=>'required'))}}
                   @endif

                </td>

                <td>

                </td>
            </tr>
            <?php $counter++;?>

            <script>
                // Add item is to arrayList at edit time.
                item_id = <?php echo($value->item_id) ?>;
                editMarksListItem(item_id);
            </script>


        @endforeach

        </tbody>

        <tr>
            <td colspan="8">{{ Form::submit('Submit', ['class'=>'btn btn-info'] ) }}</td>
        </tr>

    </table>
    {{Form::close()}}

</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/faculty/')}}" class="btn btn-default">Close </a>
</div>