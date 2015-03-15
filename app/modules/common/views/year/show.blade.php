<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Year</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">

   {{ Form::open(array('url'=>'year/show','method' => '')) }}

   <h2><strong> Years:</strong>  {{ $years->title }}</h2>
   <p>
    <strong> Description:</strong> {{ $years->description }}
  </p>

  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
  <a href="{{URL::to('year/show')}}" class="btn btn-default">Close </a>
</div>