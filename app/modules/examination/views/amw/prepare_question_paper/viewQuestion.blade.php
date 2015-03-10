<div style="padding: 10px; width: 90%;">
                 <h2>Welcome to View Question : <strong></strong> </h2>
                     {{ Form::open(array('route'=>'examination.amw.viewQuestion','method' => '')) }}
                             <div class="jumbotron text-center">
                                 <h3><strong>Name of Examination :</strong>{{ ExmQuestion::getExamName($viewPrepareQuestionPaperAmw->exm_exam_list_id) }}</h3> </br>

                                 <p>
                                     <strong> Title:</strong>{{ $viewPrepareQuestionPaperAmw->title }} </br>

                                     <strong> Deadline:</strong>{{ $viewPrepareQuestionPaperAmw->deadline  }} </br>

                                     <strong> Total Marks:</strong>{{ $viewPrepareQuestionPaperAmw->total_marks }} </br>

                                     <strong> Assign To:</strong> Coming Soon...</br>
                                 </p>
                             </div>

                              <a href="{{ URL::previous()}}" class="btn btn-default btn-xs">Close </a>
                              {{--<a class="btn btn-info close">Close </a>--}}

                     {{ Form::close() }}
</div>