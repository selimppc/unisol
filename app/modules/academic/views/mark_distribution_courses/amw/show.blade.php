<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Course Item</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">

   {{ Form::open(array('url'=>'amw/show','method' => '')) }}

   <h2><strong> Course Item:</strong>  {{ $datas->title }}</h2>


  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
  <a href="{{URL::to('amw/index')}}" class="btn btn-default">Close </a>
</div>