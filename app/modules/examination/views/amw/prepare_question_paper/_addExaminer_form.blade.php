<fieldset style="padding: 10px; width: 90%;">


                <div class="form-group">
                      <strong> Department: </strong>{{ isset($examiners_list) ?  $examiners_list->relExmExamList->relCourseManagement->relCourse->relSubject->relDepartment->title : 'no department found!'  }}
                </div>

                <div class="form-group">
                      <strong> Subject: </strong>{{ isset($examiners_list) ?  $examiners_list->relExmExamList->relCourseManagement->relCourse->relSubject->title : 'no subject found!' }}
                </div>

                <div class="form-group">
                        {{ Form::label('user_id', 'Name of Faculty') }}
                        {{ Form::select('user_id', User::FacultyList(), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                         {{ Form::label('comment', 'Comment') }}
                         {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
            <a href="{{URL::previous('examination/amw/examiners/')}}" class="btn btn-default btn-xs">Close </a>
</fieldset>
