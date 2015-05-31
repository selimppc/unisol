<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" style="text-align: center;color: blue;font-size: x-large">Edit Config</h4>
</div>
<div class="modal-body">

	<div style="padding: 10px; width: 90%;">

		{{ Form::model($config,array('url'=> array('rnc/amw/config/update',$config->id), 'method' => 'POST')) }}
                 @include('rnc::amw.config._form')
		{{ Form::close() }}

	</div>
</div>

<div class="modal-footer">

</div>
