@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <!-- START CUSTOM TABS -->
<h2 class="page-header">Evaluate Examination Question Items </h2>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Evaluation Question Items  </a></li>

                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Blank </a></li>

                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" style="font-size: 15px" id="tab_1">

                         <p><strong> Degree: &nbsp;&nbsp; </strong>
                                 {{ $q_evaluation->relExmQuestion->relCourseConduct->relDegree->relDegreeLevel->code.''
                                     .$q_evaluation->relExmQuestion->relCourseConduct->relDegree->relDegreeGroup->code.' In '
                                     .$q_evaluation->relExmQuestion->relCourseConduct->relDegree->relDegreeProgram->title.' , '
                                     .$q_evaluation->relExmQuestion->relExmExamList->relSemester->title.' , '
                                     .$q_evaluation->relExmQuestion->relExmExamList->relYear->title
                                 }}</p>
                          <p><strong> Subject: &nbsp;&nbsp; </strong>{{ $q_evaluation->relExmQuestion->relCourseConduct->relCourse->relSubject->title }}</p>
                          <p><strong> Total Marks: &nbsp;&nbsp; </strong> {{ $q_evaluation->relExmQuestion->total_marks }}</p>
                          <p><strong> Marks Obtained So Far: &nbsp;&nbsp; </strong> {{ $count->marks }}</p>

                        <div class="box-body">

                              {{ Form::open(array('url'=>'examination/faculty/exm-question-paper-to-store-evaluated-exm-questions', 'method' => 'POST' )) }}
                                     {{ Form::hidden('id', $q_evaluation->id ) }}
                                     {{ Form::hidden('evaluator_user_id', Auth::user()->get()->id ) }}
                                     {{ Form::hidden('student_user_id', $q_evaluation->student_user_id ) }}
                                     {{ Form::hidden('exm_question_item_id', $q_evaluation->exm_question_items_id ) }}
                                     {{ Form::hidden('exm_question_id', $q_evaluation->exm_question_id ) }}

                                     <strong>Question No: </strong>&nbsp;&nbsp;{{ $no_q+1 }}
                                      &nbsp;&nbsp;
                                     <strong>Out of: &nbsp;&nbsp;</strong> {{ $count->total }}
                                     <br><br>
                                     <strong>Question Title Here: &nbsp;&nbsp; </strong> {{ $q_evaluation->relExmQuestionItems->title }}
                                     <br><br>

                                     <strong>Question Answer Here: &nbsp;&nbsp; </strong> {{ isset($q_evaluation->relExmQuestionAnsText->answer) ? $q_evaluation->relExmQuestionAnsText->answer : 'not found' }}
                                     <br><br>

                                    <div class='form-group' style="margin-left: 4%;">
                                      {{ Form::label('marks', 'Marks') }}
                                      {{ Form::text('marks',$q_evaluation->marks, Input::old('marks'),['required'=>'required']) }}
                                       <strong>out of : </strong> {{  $q_evaluation->relExmQuestionItems->marks}}
                                    </div>

                                   {{ Form::submit('Evaluate',array('id'=>'submit_if','class'=>'btn btn-primary btn-xs')) }}

                                   <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions',['exm_question_id'=>$e_q_id]) }}" style="margin-right: .65%;" class="pull-left btn btn-success btn-xs">Back</a>

                                    @if( $no_q > 0 )
                                        <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions-items',['exm_question_id'=>$e_q_id, 'evaluation_id'=>$q_evaluation->id, 'no_q'=>$no_q-1 ]) }}" class="btn bg-red btn-xs " >Previous</a>
                                    @endif

                                   &nbsp;

                                    @if(  ($no_q + 1) < $count->total )
                                        <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions-items',['exm_question_id'=>$e_q_id, 'evaluation_id'=>$q_evaluation->id, 'no_q'=>$no_q+1 ]) }}" class="btn bg-orange btn-xs " >Next</a>
                                    @else
                                            <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions',['exm_question_id'=>$e_q_id]) }}" class="btn bg-purple btn-xs">Finish</a>
                                    @endif

                              {{ Form::close()  }}
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div> <!-- /.row -->
    <!-- END CUSTOM TABS -->

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

@stop