<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Year</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'year/show','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Year:</td>
                <td>
                    {{isset($years->title) ? $years->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    {{isset($years->description) ? $years->description : '' }}
                </td>
            </tr>

        </table>
  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
  <a href="{{URL::to('common/year/')}}" class="btn btn-default">Close </a>
</div>