<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Course:
    {{isset($course->relCourse->title) ? $course->relCourse->title: '' }} Marks Distribution</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <p>Following is the MarksDistribution of this course.</p>
        <p>Total Marks:
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
