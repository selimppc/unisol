<fieldset style="padding: 10px; width: 90%;">


                <div class="form-group">
                       {{ Form::label('examiner_faculty_id', 'Name of Degree: ') }}
                       {{ Form::select('examiner_faculty_id',$degree_name, Input::old('examiner_faculty_user_id') )}}
                </div>

                <div class="form-group">
                       {{ Form::label('degree_admtest_subject_id', 'Subject:') }}
                       {{ Form::select('degree_admtest_subject_id',$dgr_sbjct_id, Input::old('degree_admtest_subject_id'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                       {{ Form::label('title', 'Title:') }}
                       {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control datepicker')) }}

                </div>

                <div class="form-group">
                     {{ Form::label('total_marks', 'Total Marks') }}
                     {{ Form::text('total_marks', Input::old('total_marks'), array('class' => 'form-control')) }}
                </div>


                {{--<div class="form-group">--}}
                       {{--{{ Form::label('assign_to', 'Assign To') }}--}}
                       {{--{{ Form::select('assign_to', Input::old('assign_to') )}}--}}
                {{--</div>--}}


            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}

             <a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close </a>
                {{--<a class="btn btn-info close">Close </a>--}}

             <script>
                 $('.datepicker').each(function() {
                     var $picker = $(this);
                     $picker.on('changeDate', function(ev){
                         $picker.datepicker('hide');
                     });
                 });

             </script>
</fieldset>