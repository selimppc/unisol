<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    @if(isset($course))
        <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Course:
        {{isset($course->relCourse->title) ? $course->relCourse->title : ''}} Marks Distribution</h4>
    @else
        <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Course Marks Distribution</h4>
    @endif
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <p>Evaluation Total Marks:
            <b>{{ isset($course->relCourse->evaluation_total_marks) ? $course->relCourse->evaluation_total_marks : 'No Item Added!'}}</b>
        </p>
        <p>So Far Added Marks:
            <b>@foreach($totalmarks as $value)
                    {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
                @endforeach</b>
        </p>
        <table class="table table-bordered">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($datas as  $dkey => $dvalue)
                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/amw/config/')}}" class="btn btn-default">Close </a>
</div>
