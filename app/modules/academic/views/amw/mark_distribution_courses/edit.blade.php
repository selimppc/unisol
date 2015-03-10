<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title">Edit Course Item</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">
		{{ Form::model($editamw,array('url'=> array('academic/amw/update',$editamw->id), 'method' => 'POST')) }}
		@include('academic::amw.mark_distribution_courses._form')
		{{ Form::close() }}
	</div>
</div>
<div class="modal-footer">
</div>

