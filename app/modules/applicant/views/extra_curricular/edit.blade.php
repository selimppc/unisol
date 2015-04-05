<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Activities</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">
        {{ Form::model($extra_curricular,array('url'=> array('applicant/extra_curricular/update/'.$extra_curricular->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

        {{ Form::label('title', 'Title') }}
        {{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'')) }}
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'')) }}
        {{ Form::label('achievement', 'Achievement') }}
        {{ Form::textarea ('achievement', Input::old('achievement'),['class'=>'form-control','size' => '30x5']) }}
        <div class='form-group'>
            {{ Form::label('certificate_medal', 'Certificate Medal') }}<br>
            {{ HTML::image('/applicant_images/extra_curri_act/'.$extra_curricular->certificate_medal, $extra_curricular->certificate_medal,['class'=>'col-md-3'])}}
            {{ Form::file('certificate_medal', Input::old('certificate_medal'),array('class' => 'form-control','placeholder'=>'')) }}<br>
        </div>

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::to('apt/extra_curricular/')}}" class="btn btn-default pull-right">Close </a>
        </div>
        {{ Form::close() }}

    </div>
</div>



