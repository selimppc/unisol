<div style="padding: 10px; width: 90%;">
              <h3>Welcome to View Question Items: Amw </h3> </br>
              {{ Form::open(array('route'=>'prepare_question_paper.amw_ViewQuestionItems','method' => '')) }}
                     <div class="jumbotron text-left">
                             <strong> Title:</strong> &nbsp &nbsp {{ $amw_ViewQuestionItems->title }}
                             </br>
                             <strong> Marks:</strong> &nbsp &nbsp {{ $amw_ViewQuestionItems->marks }}
                             </br></br>
                             <div class="container">
                               <div class="row">
                                    @if($amw_ViewQuestionItems->question_type == 'radio')
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6"><strong>Option </strong></div>
                                                <div class="col-sm-6"><strong>Answer </strong></div>
                                            </div>
                                            </br>

                                            @foreach($options as $op)

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">

                                                            {{$op->title}}
                                                    </div>
                                                    <div class="col-sm-6">
                                                         @if($op->answer == 1)
                                                            {{Form::checkbox('checkbox', '',array('checked'))}}<br>
                                                         @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif($amw_ViewQuestionItems->question_type == 'checkbox')
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6"><strong>Option </strong></div>
                                                    <div class="col-sm-6"><strong>Answer </strong></div>
                                                </div>
                                                  </br>
                                                @foreach($options as $op)
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-6">

                                                                {{$op->title}}
                                                        </div>
                                                        <div class="col-sm-6">
                                                              @if($op->answer == 1)
                                                                {{Form::checkbox('checkbox', '',array('checked'))}}<br>
                                                              @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                    @else
                                           <div class="text-center">
                                                {{ Form::textarea('desc', 'Write Your Answer', ['size' => '40x6']) }}
                                            </div>
                                    @endif
                               </div>
                             </div>
                     </div>
                     <a href="{{URL::to('prepare_question_paper/amw_QuestionList')}}" class="btn btn-default">Close </a>
              {{ Form::close() }}
</div>