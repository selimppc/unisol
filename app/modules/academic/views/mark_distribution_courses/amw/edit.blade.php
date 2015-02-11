<div class="modal-header">
	<h4 class="modal-title">Edit Course Item</h4>
</div>
<div class="modal-body">

	<div style="padding: 10px; width: 90%;">

		{{ Form::model($editamw,array('url'=> array('academic/amw/update',$editamw->id), 'method' => 'POST')) }}

		  @include('academic::mark_distribution_courses.amw._form')

		{{ Form::close() }}

	</div>
</div>

