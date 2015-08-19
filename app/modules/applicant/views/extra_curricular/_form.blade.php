<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Activities </h4>
</div>
{{ Form::label('title', 'Title') }}
{{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'')) }}
{{ Form::label('description', 'Description') }}
{{ Form::text('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'')) }}
{{ Form::label('achievement', 'Achivement') }}
{{ Form::textarea ('achievement', Input::old('achievement'),['class'=>'form-control','size' => '30x5']) }}
{{ Form::label('certificate_medal', 'Certificate Medal') }}
{{ Form::file('certificate_medal', Input::old('certificate_medal'),array('class' => 'form-control','placeholder'=>'')) }}

<div class="modal-footer">
    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
    <a href="{{URL::to('applicant/extra_curricular/')}}" class="btn btn-default pull-right">Close </a>
</div>
<br>
<br>

{{ Form::close() }}




