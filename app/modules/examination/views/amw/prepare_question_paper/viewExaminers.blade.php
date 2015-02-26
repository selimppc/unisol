<div style="padding: 5px; width: 90%;">

             <h2>Welcome to View Examiners : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h2> </br>
             {{ Form::open(array('route'=>'examination.amw.viewExaminers','method' => '')) }}
                     <div class="jumbotron text-center">

                      <h4><strong> Department:</strong>{{ $view_examiner_amw->relExmExamList->relCourseManagement->relCourse->relSubject->relDepartment->title  }}</h4> </br>

                        <strong> Subject:</strong> {{ $view_examiner_amw->relExmExamList->relCourseManagement->relCourse->relSubject->title }} </br>
                        <strong> Name of Faculty:</strong> </br>
                        <strong> Status:</strong> </br>
                        <strong> Comments:</strong> </br> {{ $view_examiner_amw->comment }}

                        <div class="form-group">
                                 {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                        </div>

                     </div>

                     <a href="{{URL::previous()}}" class="btn btn-default">Close </a>
                     {{ Form::submit('Comments', array('class' => 'btn btn-primary')) }}
             {{ Form::close() }}
             <p> &nbsp;</p>

</div>
