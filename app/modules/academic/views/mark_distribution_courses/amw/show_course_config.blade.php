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
                    <td>{{$value->course->title}}</td>
                    <td>{{$value->course->subject->department->title}}</td>
                    <td>{{$value->year->title}}</td>
                    <td>{{$value->semester->title}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
  </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>
