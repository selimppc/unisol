<fieldset style="padding: 10px; width: 90%;">

            <?php  $exm_exam_list_id = ExmExamList::lists('title', 'id'); ?>

            <div class="form-group">
                   {{ Form::label('exm_exam_lists_id', 'Exam Name') }}
                   {{ Form::select('exm_exam_lists_id', $exm_exam_list_id )}}
            </div>

            <div class="form-group">
                   {{ Form::label('title', 'Title') }}
                   {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
            </div>

               <div class="form-group">
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control','required'=>'required')) }}
               </div>

               <div class="form-group">
                     {{ Form::label('total_marks', 'Total Marks') }}
                     {{ Form::text('total_marks', Input::old('total_marks'), array('class' => 'form-control','required'=>'required')) }}
               </div>

               <div class="form-group">
                      {{ Form::label('updated_by', 'Assign To') }}
                      {{ Form::text('updated_by', Input::old('updated_by'), array('class' => 'form-control','required'=>'required')) }}
               </div>


            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

            <a href="{{URL::to('prepare_question_paper/index')}}" class="btn btn-default">Close </a>

    </fieldset>
