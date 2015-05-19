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
                                 {{ $data_exm_question->relCourseConduct->relDegree->relDegreeLevel->code.''
                                     .$data_exm_question->relCourseConduct->relDegree->relDegreeGroup->code.' In '
                                     .$data_exm_question->relCourseConduct->relDegree->relDegreeProgram->title.' , '
                                     .$data_exm_question->relExmExamList->relSemester->title.' , '
                                     .$data_exm_question->relExmExamList->relYear->title
                                 }}</p>
                          <p><strong> Subject: &nbsp;&nbsp; </strong>{{ $data_exm_question->relCourseConduct->relCourse->relSubject->title }}</p>
                          <p><strong> Total Marks: &nbsp;&nbsp; </strong> {{ $data_exm_question->total_marks }}</p>
                          <p><strong> Marks Obtained So Far: &nbsp;&nbsp; </strong> {{ $total_marks->ev_marks }}</p>

                        <div class="box-body">

                              {{ Form::open(array('url'=>'examination/faculty/exm-question-paper-to-store-evaluated-exm-questions', 'method' => 'POST' )) }}
                                     {{Form::hidden('id', $exm_q_stu_answer_text->id ) }}
                                     {{Form::hidden('exm_question_evaluation_id', $evaluation_id ) }}
                                     {{--{{ Form::hidden('student_user_id', $evaluate_exm_qp->student_user_id ) }}--}}
                                     {{--{{ Form::hidden('exm_question_id', $e_q_id ) }}--}}
                                      {{--{{ Form::hidden('exm_question_items_id', $q_item_info->id ) }}--}}

                                     <strong>Question No: </strong>&nbsp;&nbsp;{{ $no_q+1 }}
                                      &nbsp;&nbsp;
                                     <strong>Out of: &nbsp;&nbsp;</strong> {{ $total_question }}
                                     <br><br>
                                     <strong>Question Title Here: &nbsp;&nbsp; </strong> {{ $q_item_info->title }}
                                     <br><br>

                                      {{--ekhane kaj baki--}}

                                     <strong>Question Answer Here: &nbsp;&nbsp; </strong> {{ $exm_q_stu_answer_text->answer }}
                                     <br><br>

                                    {{--$evaluation_marks = oi item er marks koto exm_question_items er marks e--}}

                                    {{ Form::hidden('exm_question_evaluation_id', $evaluate_exm_qp->id ) }}


                                    <div class='form-group' style="margin-left: 4%;">
                                      {{ Form::label('marks', 'Marks') }}
                                      {{ Form::text('marks', Input::old('marks'),['required'=>'required']) }}
                                       <strong>out of : </strong> {{  $q_item_info->marks}}
                                    </div>


                                   {{ Form::submit('Evaluate',array('id'=>'submit_if','class'=>'btn btn-primary btn-xs')) }}

                                   <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions',['exm_question_id'=>$e_q_id]) }}" style="margin-right: .65%;" class="pull-left btn btn-success btn-xs">Back</a>

                                    @if( $no_q > 0 )
                                        <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions-items',['exm_question_id'=>$e_q_id, 'no_q'=>$no_q-1 ]) }}" class="btn bg-red btn-xs " >Previous</a>
                                    @endif

                                   &nbsp;

                                    @if(  ($no_q + 1) < $total_question )
                                        <a href="{{ URL::route('faculty.exm-question-paper.evaluate-exm-questions-items',['exm_question_id'=>$e_q_id, 'no_q'=>$no_q+1 ]) }}" class="btn bg-orange btn-xs " >Next</a>
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