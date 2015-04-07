@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <!-- START CUSTOM TABS -->
<h2 class="page-header">Evaluate Question Items </h2>
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
                    <div class="tab-pane active" style="font-size: " id="tab_1">

                         <p><strong> Degree: &nbsp;&nbsp; </strong>
                                 {{ $data_question->relBatchAdmtestSubject->relBatch->relDegree->relDegreeProgram->code.''
                                     .$data_question->relBatchAdmtestSubject->relBatch->relDegree->relDegreeGroup->code.' in '
                                     .$data_question->relBatchAdmtestSubject->relBatch->relDegree->relDepartment->title.' , '
                                     .$data_question->relBatchAdmtestSubject->relBatch->relSemester->title.' , '
                                     .$data_question->relBatchAdmtestSubject->relBatch->relYear->title
                                 }}</p>
                          <p><strong> Subject: &nbsp;&nbsp; </strong>{{ $data_question->relBatchAdmtestSubject->relAdmtestSubject->title }}</p>
                          <p><strong> Total Marks: &nbsp;&nbsp; </strong> {{ $data_question->total_marks }}</p>
                          <p><strong> Marks Obtained So Far: &nbsp;&nbsp; </strong> {{ $total_marks->ev_marks }}</p>

                        <div class="box-body">

                              {{Form::open(array('url'=>['admission/faculty/question-papers/store-evaluated-questions'], 'class'=>'form-horizontal','files'=>true))}}
                                     {{Form::hidden('id', $evaluation_id ) }}
                                     {{ Form::hidden('batch_applicant_id', $evaluate_qp->batch_applicant_id ) }}
                                     {{ Form::hidden('adm_question_id', $a_q_id ) }}

                                     <strong>Question No: </strong>&nbsp;&nbsp;{{ $no_q+1 }}
                                      &nbsp;&nbsp;
                                     <strong>out of: &nbsp;&nbsp;</strong> {{ $total_question }}
                                     <br><br>
                                    <strong> Question Title Here: &nbsp;&nbsp; </strong> {{ $q_item_info->title }}
                                        <br>
                                    <div class='form-group' style="margin-left: 4%;">
                                      Answer : answer goes here
                                    </div>

                                    <div class='form-group' style="margin-left: 4%;">
                                      {{ Form::label('marks', 'Marks') }}
                                      {{ Form::text('marks', $evaluation_marks ,Input::old('marks'),['required'=>'required']) }}
                                       <strong>out of : </strong> {{  $q_item_info->marks}}
                                    </div>


                                   {{ Form::submit('Evaluate',  array( 'id'=>'submit_if', 'class'=>'btn btn-primary btn-xs')) }}

                                    @if(  ($no_q + 1) < $total_question )
                                        <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions-items',['adm_question_id'=>$a_q_id, 'no_q'=>$no_q+1 ]) }}" class="btn bg-orange btn-xs " >Next</a>
                                    @else
                                        <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions',['ev_id'=>$evaluate_qp->id]) }}" class="btn bg-default btn-xs " >Finish</a>
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