<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
        <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Course:
            {{isset($coursetitle->relCourseConduct->relCourse->title) ? $coursetitle->relCourseConduct->relCourse->title: 'Show' }} Marks Distribution</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <p>Evaluation Total Marks:
            <b>{{ isset($coursetitle->relCourseConduct->relCourse->evaluation_total_marks) ? $coursetitle->relCourseConduct->relCourse->evaluation_total_marks : 'No Item Added!'}}</b>
        </p>
        <p>So Far Added Marks:
            <b>@foreach($totalmarks as $value)
                    {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
                @endforeach</b>
        </p>
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            <th>Policy</th>
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($dist_data as  $dkey => $dvalue)
                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourseConduct']['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{$dvalue->acm_marks_policy}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/faculty/course/config')}}" class="btn btn-default">Close</a>
</div>
