<fieldset style="padding: 10px; width: 90%;">


                <div class="form-group">
                       <strong> Department: </strong>  {{ $examiners_list->relExmExamList->relCourseManagement->relCourse->relSubject->relDepartment->title  }}
                </div>

                <div class="form-group">
                       <strong> Subject: </strong> {{ $examiners_list->relExmExamList->relCourseManagement->relCourse->relSubject->title }}
                </div>

                <div class="form-group">
                        {{ Form::label('user_id', 'Name of Faculty') }}
                        {{ Form::select('user_id', User::FacultyList(), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                         {{ Form::label('comment', 'Comment') }}
                         {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}

                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::previous('examination/amw/examiners/')}}" class="btn btn-default">Close </a>
</fieldset>
