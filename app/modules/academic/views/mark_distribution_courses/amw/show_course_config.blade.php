<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

     <table class="table table-bordered">
        <thead>
        <th>CourseName</th>
        <th>ItemName</th>
        <th>Marks</th>
        <th>ReadOnly</th>
        <th>DefaulItem</th>
        </thead>
        <tbody>
        @foreach($datas as $value)
            <tr>
                <td>{{ Course::getCourseName($value->course_id) }}</td>

                <td>{{ AcmMarksDist::AcmMarksDistName($value->acm_marks_dist_item_id) }}</td>
                <td>{{ $value->marks }}</td>
                <td>{{($value->readonly == 1) ? 'True' : 'False' }}</td>
                <td>{{($value->default_item == 1) ? 'True' : 'False' }}</td>
            </tr>
        @endforeach
        </tbody>
     </table>

</div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>
