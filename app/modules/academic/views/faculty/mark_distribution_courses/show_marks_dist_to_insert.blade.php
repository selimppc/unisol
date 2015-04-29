<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large"> Add/Edit Marks Distribution Item for Course:
        {{isset($data->relCourse->title) ? $data->relCourse->title: ''}}</h4>
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
            {{ Form::hidden('course_title', $data->relCourse->title, ['class'=>' course_title'])}}
            {{ Form::hidden('course_evaluation_total_marks', $data->relCourse->evaluation_total_marks, ['class'=>'course_evalution_marks'])}}
        </div>
        <div class="form-group">
            <div class="col-md-4">
                {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDistItem::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addDistListItem']) }}
            </div>
            <div class="col-md-4">
                {{ Form::submit('ADD', ['class'=>'btn btn-xs btn-success addConfigList','onClick'=>'addMarksDistItem()']) }}
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
        {{ Form::hidden('course_conduct_id', $data->id, ['class'=>'course_conduct_id'])}}
        {{ Form::hidden('course_type_id', $data->relCourse->course_type_id, ['class'=>'course_type'])}}
        <?php $counter = 0;?>
        @foreach($result as $key=>$value)
            <tr>
                <td width="130">
                    @if(isset($value->isMarksId))
                        {{ Form::hidden('acm_marks_distribution_id[]', $value->isMarksId,['class'=>'form-control'])}}
                    @endif
                    {{ Form::hidden('acm_marks_dist_item_id[]', $value->item_id, ['class'=>'acm_marks_dist_item_id'])}}
                    {{ Form::hidden('course_id[]', $value->course_id2, ['class'=>'get_course_id']) }}
                    @if(isset($value->CBid))
                        {{ Form::hidden('created_by_faculty[]', $value->CBid, ['class'=>'form-control']) }}
                    @endif
                    @if(isset($value->created_by))
                        {{ Form::hidden('created_by_amw[]', $value->created_by, ['class'=>'form-control'])}}
                    @endif
                    {{--to show item title from db --}}
                    {{ $value->acm_dist_item_title}}
                </td>
                <td>
                    {{--To check readonly field--}}
                    @if($value->readonly == 1)
                        <input type="text" name="marks_percent[]" value="{{ ($value->actual_marks/$data->relCourse->evaluation_total_marks) * 100 }}" class="form-control totalPer amw_marks_percent{{$key}}" id="marks_percent_id{{$key}}" onchange="calculateActualMarksFaculty(this.id, {{$data->relCourse->evaluation_total_marks}},this.value)" onblur="calculateTotalMarksPercent(this)" readonly required />
                    @else
                        <input type="text" name="marks_percent[]" value="{{ ($value->actual_marks/$data->relCourse->evaluation_total_marks) * 100 }}" class="form-control totalPer amw_marks_percent{{$key}}"  id="marks_percent_id{{$key}}" onchange="calculateActualMarksFaculty(this.id, {{$data->relCourse->evaluation_total_marks}},this.value)" onblur="calculateTotalMarksPercent(this)" required />
                    @endif
                </td>
                <td>
                    <!-- <input type="text" name="actual_marks[]" value="{{$value->actual_marks}}" class="amw_actual_marks" readonly/> -->
                    {{ Form::text('actual_marks[]', $value->actual_marks, ['class'=> 'form-control amw_actual_marks','required' => 'required', 'readonly'=>'true']) }}
                </td>
                <td>
                    @if($value->readonly=='1')
                        {{ Form::checkbox('isReadOnly[]', $counter, ($value->readonly)? $value->readonly : Input::old('isReadOnly'.$key)) }}
                    @else
                        No
                    @endif
                    {{--{{ Form::text('isReadOnly[]', $value->readonly) }}--}}
                </td>
                <td>{{ Form::radio('isDefault[]', $counter, ($value->default_item) ? $value->default_item : Input::old('isDefault'.$key)) }}
                </td>
                <td>{{ Form::radio('isAttendance[]', $counter, ($value->is_attendance) ? $value->is_attendance : Input::old('isAttendance'.$key)) }}</td>
                <td>
                    @if(isset($value->isMarksId))
                        {{ Form::select('policy_id[]', array(''=>'Select Option','attendance' => 'Attendance', 'best_one' => 'Best One','avarage'=>'Average','avarage_top_n'=>'Average of Top N','sum' => 'Sum','single' => 'Single'), $value->acm_marks_policy, array('class' => 'form-control','required'=>'required'))}}
                    @else
                        {{ Form::select('policy_id[]', array(''=>'Select Option','attendance' => 'Attendance', 'best_one' => 'Best One','avarage'=>'Average','avarage_top_n'=>'Average of Top N','sum' => 'Sum','single' => 'Single'), '', array('class' => 'form-control','required'=>'required'))}}
                    @endif
                    {{--Auth::user()->id--}}
                </td>
                {{--Ajax delete if find faculty created_by and auth id=2--}}
                @if(isset($value->CBid ) && $value->CBid == Auth::user()->get()->id )
                    {{--@if($value->CBid )--}}
                    <td><a class="btn btn-default btn-sm" id="removedistTrId{{$key}}" onClick="deleteMarkDistTr(this.id, {{$value->isMarksId}})"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a></td>
                @else
                @endif
            </tr>
            <?php $counter++;?>
            <script>
                // Add item is to arrayList at edit time.
                item_id = <?php echo($value->item_id) ?>;
                editMarksListItem(item_id);

                function deleteMarkDistTr(getId, distId) {

                    var is_marksdist_id = distId;

                    if (is_marksdist_id > 0) {

                        var check = confirm("Are you sure to delete this item??");
                        if (check) {
                            $.ajax({
                                url: 'faculty/marksdist/acmmarksdistdelete/ajax',
                                type: 'POST',
                                dataType: 'json',
                                data: {acm_marks_distribution_id: is_marksdist_id}
                            })
                                    .done(function (msg) {
                                        //console.log(msg);
                                        var whichtr = $('#' + getId).closest("tr");
                                        whichtr.fadeOut(500).remove();
                                        arrayItems.pop(getId);//To stop additem if exist
                                    });
                        }
                        else {
                            return false;
                        }
                    } else {
                        //if acm_course_config id not found jst remove the tr form the popup. that not delete the data form the db.
                        var whichtr = $('#' + getId).closest("tr");
                        whichtr.fadeOut(500).remove();
                        arrayItems.pop(getId);//To stop additem if exist
                    }
                }

            </script>


        @endforeach
        </tbody>

        <tr>
            <td colspan="6"><span class="totalPerSum"></span></td>
            <td colspan="2">{{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success saveInMarksDist'] ) }}</td>
        </tr>
    </table>
    {{Form::close()}}

</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>
