<fieldset style="padding: 10px; width: 90%;">


             <div class="form-group">
                   {{ Form::label('title', 'Title') }}
                   {{ Form::text('title', Input::old('title'),array('class' => 'form-control input-sm','placeholder'=>'Enter your course name')) }}
             </div>

             <div class="form-group">
                   {{ Form::label('description', 'Description') }}
                   {{ Form::textarea('description', Input::old('description'),array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}
             </div>

             <div class="form-group">
                   {{ Form::label('department_id', 'Department') }}
                   {{ Form::select('department_id', $department, Input::old('department_id') ,['class'=>'form-control input-sm','required'])}}
             </div>

             <div class="form-group">
                   {{ Form::label('degree_program_id', 'Degree Program') }}
                   {{ Form::select('degree_program_id',$degree_program,Input::old('degree_program_id'),['class'=>'form-control input-sm','required']) }}
             </div>

             <div class="form-group">
                   {{ Form::label('year_id', 'Year') }}
                   {{ Form::select('year_id', $year, Input::old('year_id') ,['class'=>'form-control input-sm','required'])}}
             </div>

             <div class="form-group">
                   {{ Form::label('semester_id', 'Semester') }}
                   {{ Form::select('semester_id',$semester,Input::old('semester_id'),['class'=>'form-control input-sm','required']) }}
             </div>

             <div class="form-group">
                   {{ Form::label('total_credit', 'Total Credit') }}
                   {{ Form::text('total_credit', Input::old('total_credit'),array('class' => 'form-control input-sm','placeholder'=>'Enter Total Credit')) }}
             </div>

             <div class="form-group">
                   {{ Form::label('duration', 'Duration (In Year)') }}
                   {{ Form::select ('duration',
                            array('' => 'Select one','1' => '1', '2' => '2', '3'=>'3','4' => '4', '5' => '5', '6'=>'6','7'=>'7'),
                                 Input::old('duration'),array('class' => 'form-control input-sm'))
                   }}
             </div>

             <div class="form-group">
                   {{ Form::label('start_date', 'Start Date') }}
                   {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control datepicker','placeholder'=>'Enter Start Date']) }}
             </div>

             <div class="form-group">
                   {{ Form::label('end_date', 'End Date') }}
                   {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control datepicker','placeholder'=>'Enter End Date'])  }}

             </div>

            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}

             <a href="{{URL::to('admission_test/amw/adm-test-degree')}}" class="btn btn-default btn-xs">Close </a>
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