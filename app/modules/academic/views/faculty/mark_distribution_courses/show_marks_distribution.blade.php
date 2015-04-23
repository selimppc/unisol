<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title">Show Marks distribution of Courses Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <table class="table table-bordered">
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
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourseManagement']['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{$dvalue->acm_marks_policy}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>If Marks Distribution is not done then go to distribution and make it done first.<a href="{{URL::to('academic/faculty/')}}" class="btn btn-link">MarksDistribution</a></p>
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/faculty/course/config')}}" class="btn btn-default">Close </a>
</div>