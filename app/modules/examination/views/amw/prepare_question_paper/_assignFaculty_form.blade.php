<fieldset style="padding: 10px; width: 90%;">

            <?php
                $examiner_comments = ExmExaminerComments::find($exam_list_id);
            ?>


                <div class="form-group">
                      <strong>Question Title : </strong> {{ $prepare_question_paper_amw->title }}
                </div>


                <div class="form-group">
                         {{ Form::label('user_id', 'Examiner') }}
                         {{ Form::select('user_id',User::FacultyList(), Input::old('user_id'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('comment', 'Comments') }} </br>

                           To &nbsp; {{ $examiner_comments->commented_to }}
                           As &nbsp; {{ $examiner_comments->commented_by }}

                         {{ Form::textarea('comment', Input::old('comments'), array('size' => '40x4','class' => 'form-control','required'=>'required')) }}

                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
             <a href="{{URL::previous('examination/amw/index/')}}" class="btn btn-default btn-xs">Close </a>
</fieldset>
