<fieldset style="padding: 10px; width: 90%;">

            <?php $examiner_comments = ExmExaminerComments::where('exm_exam_list_id','=', $exam_list_id)->get(); ?>

                <div class="form-group">
                      <strong>Question Title : </strong> {{ isset($prepare_question_paper_amw) ? $prepare_question_paper_amw->title : 'no question found!' }}
                </div>

                <div class="form-group">
                         {{ Form::label('user_id', 'Examiner') }}
                         {{ Form::select('user_id',User::FacultyList(), Input::old('user_id'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('comment', 'Comments') }} </br>

                                 <div class="jumbotron text-left" style="padding-top: 2px; padding-left: 2px; padding-bottom: 5px; background-color: #FF8C95;">
                                         @foreach($examiner_comments as $examiner_comments)

                                               &nbsp; <strong>{{ User::FullName($examiner_comments->commented_by) }} </strong>

                                            As &nbsp; <strong>{{  strtoupper(Role::RoleName($examiner_comments->commented_by)) }} </strong>

                                               </br></br>
                                               &nbsp; &nbsp; {{ $examiner_comments->comment }}

                                               </br> </br>
                                         @endforeach
                                 </div>

                         {{ Form::textarea('comment', Input::old('comments'), array('size' => '40x4','class' => 'form-control','required'=>'required')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
             <a href="{{URL::previous('examination/amw/index/')}}" class="btn btn-default btn-xs">Close </a>
</fieldset>
