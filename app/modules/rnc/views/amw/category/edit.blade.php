<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" style="text-align: center;font-size: x-large">Edit Category</h4>
</div>
<div class="modal-body">

	<div style="padding: 10px; width: 90%;">

		{{ Form::model($model,array('url'=> array('rnc/amw/category/update',$model->id), 'method' => 'POST')) }}
                 @include('rnc::amw.category._form')
		{{ Form::close() }}

	</div>
</div>

<div class="modal-footer">

</div>
