<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show Course Config Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

        <table class="table table-bordered">
            <thead>
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            </thead>
            <tbody>

            @foreach($datas as $value)
                <tr>
                    <td>{{$value['relCourse']['title']}}</td>
                    <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                    <td>{{$value['relYear']['title']}}</td>
                    <td>{{$value['relSemester']['title']}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <p>Following is the MarksDistribution of this course.</p>
        {{--<p> Total Marks: {{ $datas['relCourse']['evaluation_total_marks']}}</p>--}}

        <table class="table table-bordered">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            {{--<th>Course</th>--}}
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($config_data as  $dkey => $dvalue)
                {{--<p>Total Marks:</p>--}}
                {{--<p>{{$dvalue['relCourse']['evaluation_total_marks']}}</p>--}}
                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    {{--<td>{{$dvalue['relCourse']['title']}}</td>--}}
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>If Marks Distribution is not done then go to distribution and make it done first.</p>
  </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>
