
 <div style="padding: 20px;">
        <h4> </h4>

        {{Form::open(array('url'=>'', 'class'=>'form-horizontal','files'=>true))}}

        <div class='form-group'>
         <div>{{ Form::label('essay', 'Essay') }}</div>
         <div>{{ Form::file('essay', Input::old('essay'),['class'=>'form-control ']) }}</div>
         </div>

        <p>&nbsp;</p>
        {{ Form::submit('change ', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
        {{Form::close()}}
  </div>