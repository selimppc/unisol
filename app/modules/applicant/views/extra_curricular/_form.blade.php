
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">
        <h4> </h4>

  {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/extra_curricular_store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

  {{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}


  {{ Form::label('title', 'title:') }}
  {{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'')) }}



  {{ Form::label('description', 'description') }}
  {{ Form::text('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'')) }}

  {{ Form::label('achivement', 'achivement') }}

  {{ Form::textarea ('achivement', Input::old('achivement'),['class'=>'form-control','size' => '30x5']) }}

  {{ Form::label('certificate_medal', 'certificate_medal') }}
  {{ Form::file('certificate_medal', array('placeholder'=>'........','class'=>'form-control')) }}

            <br>

           <br>

          {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

  <br>
  <br>

  {{ Form::close() }}
</div>
</div>
<div class="modal-footer">

</div>


