<fieldset style="padding: 10px; width: 90%;">

             <div class="form-group">
                   {{ Form::label('title', 'Title') }}
                   {{ Form::text('title', Input::old('title'),array('class' => 'form-control input-sm','placeholder'=>'Enter your course name')) }}
             </div>

             <div class="form-group">
                   {{ Form::label('description', 'Description') }}
                   {{ Form::textarea('description', Input::old('description'),array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}
             </div>

            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}

             <a href="{{URL::to('admission_test/amw/adm-test-subject')}}" class="btn btn-default btn-xs">Close </a>
                {{--<a class="btn btn-info close">Close </a>--}}

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

             <script>
                 $('.datepicker').each(function() {
                     var $picker = $(this);
                     $picker.on('changeDate', function(ev){
                         $picker.datepicker('hide');
                     });
                 });

             </script>
</fieldset>