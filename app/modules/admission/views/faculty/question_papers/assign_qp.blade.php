<div style="padding: 20px;">


      {{Form::open(array('url'=>'admission/faculty/question-papers/assign-to-question-paper', 'class'=>'form-horizontal','files'=>true))}}
                {{--{{Form::hidden('adm_question_id', $assign_qp->id, ['class'=>'form-control'])}}--}}


                <div class="form-group">
                      <strong>Question Title : </strong>
                      {{ isset($assign_qp) ? $assign_qp->relAdmQuestion->title : 'no question found!' }}
                </div>

                <div class="form-group">
                     <strong> Subject:</strong>
                    {{ $assign_qp->relAdmQuestion->relBatchAdmTestSubject->relAdmTestSubject->title }}
                </div>


                <div class="form-group">
                     <strong> Examiner:</strong>
                    {{ $assign_qp->relAdmQuestion->relUser->relUserProfile->first_name.' '.$assign_qp->relAdmQuestion->relUser->relUserProfile->middle_name.' '.$assign_qp->relAdmQuestion->relUser->relUserProfile->last_name }}
                </div>

                 <div class="form-group">
                            <strong> Status:</strong>
                            {{--  {{ $assign_qp->relAdmQuestion->status }}--}}
                 </div>

                <div class="form-group">
                         {{ Form::label('comment', 'Comments') }} </br>

                                 <div class="jumbotron text-left" style="padding-top: 2px; padding-left: 2px; padding-bottom: 5px; background-color: #FF8C95;">
                                         @foreach($adm_question_comments as $question_comments)

                                               &nbsp; <strong>{{ User::FullName($question_comments->commented_by) }} </strong>

                                            As &nbsp; <strong>{{  strtoupper(Role::RoleName($question_comments->commented_by)) }} </strong>

                                               </br></br>
                                               &nbsp; {{ $assign_qp->relAdmQuestion->relUser->relUserProfile->first_name.' '.$assign_qp->relAdmQuestion->relUser->relUserProfile->middle_name.' '.$assign_qp->relAdmQuestion->relUser->relUserProfile->last_name }}
                                               , &nbsp; {{ $question_comments->comment }}

                                               </br> </br>
                                         @endforeach
                                 </div>

                         {{ Form::textarea('comment', Input::old('comment'), array('size' => '40x4','class' => 'form-control','required'=>'required')) }}
                </div>
            {{ Form::submit('Comments', array('class' => 'btn btn-primary btn-xs')) }}
             <a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close </a>

      {{ Form::close() }}
</div>

