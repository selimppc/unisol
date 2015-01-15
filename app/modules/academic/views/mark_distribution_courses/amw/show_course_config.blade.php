<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

     {{ Form::model(array('url'=>'amw/config/show/','method' => '')) }}

     <table class="table table-bordered">
        <tr>
            <td> CourseItemName :</td>
            <td width='300'>{{ AcmMarksDist::AcmMarksDistName($datas->acm_marks_dist_item_id) }}</td>
        </tr>
        <tr>
            <td>Marks :</td>
            <td>{{($datas->marks) }}</td>
        </tr>
        <tr>
            <td>ReadOnly :</td>
            <td>{{($datas->readonly) }}</td>
        </tr>

    </table>

    {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>