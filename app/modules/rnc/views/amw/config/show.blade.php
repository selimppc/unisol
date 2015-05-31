<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" style="text-align: center;color: blue;font-size: x-large">Show Config</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'rnc/amw/category/show','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td><b>Category Title : </b></td>
                <td>
                    {{isset($config->title) ? $config->title : '' }}
                </td>
            </tr>
            <tr>
                <td><b>Category Description: </b></td>
                <td>
                    {{isset($config->value) ? $config->value : '' }}
                </td>
            </tr>

        </table>
  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
  <a href="{{URL::to('rnc/amw/category/index')}}" class="btn btn-default">Close</a>
</div>