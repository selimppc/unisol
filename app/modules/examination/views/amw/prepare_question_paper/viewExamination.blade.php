<div style="padding: 10px; width: 90%;">
             <h2>Welcome to View Examination : <strong></strong> </h2> </br>
             {{ Form::open(array('route'=>'examination.amw.viewExamination','method' => '')) }}
                     <div class="jumbotron text-center">

                          <h3><strong> Title:</strong>{{ $view_examination_amw->title }} </h3> </br>
                             <p>
                                <strong> Exam Type:</strong>{{ $view_examination_amw->relAcmMarksDistItem['title'] }} </br>

                                 <strong> Year:</strong>{{ Year::getYearsName($view_examination_amw->year_id) }} </br>

                                 <strong> Semester:</strong>{{ Semester::getSemesterName($view_examination_amw->semester_id) }} </br>

                                 <strong> Course Name:</strong>{{ $view_examination_amw->relCourseManagement->relCourse->title }} </br>

                                 {{--<strong> Assign To:</strong> Coming Soon...</br>--}}
                             </p>
                     </div>

{{--                     <a href="{{URL::to('examination/amw/examination')}}" class="btn btn-default btn-xs">Close </a>--}}
                        <a class="btn btn-info close">Close </a>
                     
             {{ Form::close() }}
</div>
