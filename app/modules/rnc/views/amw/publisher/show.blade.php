<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" style="text-align: center;color: blue;font-size: x-large">Show Publisher</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'rnc/amw/publisher/show','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td><b>Publisher Title : </b></td>
                <td>
                    {{isset($publisher->title) ? $publisher->title : '' }}
                </td>
            </tr>
			<tr>
                <td><b>Publisher Code : </b></td>
                <td>
                    {{isset($publisher->code) ? $publisher->code : '' }}
                </td>
            </tr>
            <tr>
                <td><b>Description: </b></td>
                <td>
                    {{isset($publisher->description) ? $publisher->description : '' }}
                </td>
            </tr>

        </table>
  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
  <a href="{{URL::to('rnc/amw/publisher/index')}}" class="btn btn-default">Close</a>
</div>