<div style="padding: 10px; width: 90%;">


             <h2>Welcome to View Question : AMW </h2> </br>


             {{ Form::open(array('route'=>'prepare_question_paper.amw_ViewQuestion','method' => '')) }}


                     <div class="jumbotron text-center">
                         <h3><strong>Name of Examination :</strong>{{ $viewPrepareQuestionPaperAmw->exm_exam_lists_id }}</h3> </br>
                         {{--ExmExamList::getExamName($prepareQuestionPaper->exm_exam_list_id)--}}
                         <p>
                             <strong> Title:</strong>{{ $viewPrepareQuestionPaperAmw->title }} </br>
                             <strong> Deadline:</strong>{{ $viewPrepareQuestionPaperAmw->deadline  }} </br>
                             <strong> Total Marks:</strong>{{ $viewPrepareQuestionPaperAmw->total_marks }} </br>
                             <strong> Assign To:</strong> Coming Soon...</br>
                         </p>
                     </div>

                     <a href="{{URL::to('prepare_question_paper/amw_index')}}" class="btn btn-default">Close </a>

             {{ Form::close() }}

</div>
