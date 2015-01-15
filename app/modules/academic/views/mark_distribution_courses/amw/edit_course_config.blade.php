<div class="modal-header">
	<h4 class="modal-title">Edit Course Item config </h4>
</div>
<div class="modal-body">

	<div style="padding: 10px; width: 90%;">

		{{ Form::model($editconfig,array('url'=> array('amw/config/update',$editconfig->id), 'method' => 'POST')) }}

		  @include('academic::mark_distribution_courses.amw._form_course_config')

		{{ Form::close() }}

	</div>
</div>

