<div style="padding: 5px; width: 90%;">

             <h2>Welcome to View Examiners : <strong></strong> </h2> </br>
             {{ Form::open(array('route'=>'examination.amw.viewExaminers','method' => '')) }}
                     <div class="jumbotron text-center">

                      <h4><strong> Department:</strong>{{ $view_examiner_amw->relExmExamList->relCourseManagement->relCourse->relSubject->relDepartment->title  }}</h4> </br>

                        <strong> Subject:</strong> {{ $view_examiner_amw->relExmExamList->relCourseManagement->relCourse->relSubject->title }} </br>

                        <strong> Name of Faculty:</strong> {{ $view_examiner_amw->relUser->relUserProfile->first_name.' '.$view_examiner_amw->relUser->relUserProfile->middle_name.' '.$view_examiner_amw->relUser->relUserProfile->last_name }} </br>

                        <strong> Status:</strong> {{ $view_examiner_amw->status }} </br>

                        <strong> Comments:</strong> </br> {{ $view_examiner_amw->comment }}

                        <div class="form-group">
                              {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                        </div>

                     </div>

                     <a href="{{URL::previous('examination/amw/index/')}}" class="btn btn-default btn-xs">Close </a>
                     {{ Form::submit('Comments', array('class' => 'btn btn-primary btn-xs')) }}
                     {{--<a class="btn btn-info close">Close </a>--}}
             {{ Form::close() }}

</div>
