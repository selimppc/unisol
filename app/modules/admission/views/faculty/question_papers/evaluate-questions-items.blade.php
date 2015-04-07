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
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Settings  <span class="caret"></span>
                                    </a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Blank </a></li>

                                        </ul>
                                </li>
                                <li class="pull-right" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Blank </a></li>

                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" style="font-size: " id="tab_1">
                                    {{--<button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addExtraCurricular" >--}}
                                        {{--Add Extra-curricular--}}
                                    {{--</button><br>--}}

                                      <strong> Degree: &nbsp;&nbsp; </strong>
                                             {{ $data_question->relBatchAdmtestSubject->relBatch->relDegree->relDegreeProgram->code.''
                                                 .$data_question->relBatchAdmtestSubject->relBatch->relDegree->relDegreeGroup->code.' in '
                                                 .$data_question->relBatchAdmtestSubject->relBatch->relDegree->relDepartment->title.' , '
                                                 .$data_question->relBatchAdmtestSubject->relBatch->relSemester->title.' , '
                                                 .$data_question->relBatchAdmtestSubject->relBatch->relYear->title
                                             }}
                                       <br> <br>
                                      <strong> Subject: &nbsp;&nbsp; </strong>{{ $data_question->relBatchAdmtestSubject->relAdmtestSubject->title }}
                                       <br> <br>

                                      <strong> Total Marks: &nbsp;&nbsp; </strong> {{ $data_question->total_marks }} <br><br>

                                      <strong> Marks Obtained So Far: &nbsp;&nbsp; </strong> {{ $total_marks->evaluated_total_marks }} <br><br>

                                    <div class="box-body table-responsive">

                                          {{Form::open(array('url'=>['admission/faculty/question-papers/store-evaluated-questions',$evaluate_qp->id], 'class'=>'form-horizontal','files'=>true))}}
                                                 {{ Form::hidden('batch_applicant_id',$evaluate_qp->batch_applicant_id ) }} </br>
                                                 {{ Form::text('adm_question_id',$a_q_id ) }} </br>
                                                 {{ Form::text('adm_question_items_id', $a_q_itm_id ) }} </br></br>

                                                 <strong>Question No: </strong>&nbsp;&nbsp;{{ $no_q+1 }}
                                                  &nbsp;&nbsp;
                                                 <strong>out of: &nbsp;&nbsp;</strong> {{ $total_question }}
                                                 <br><br>
                                                <strong> Question Title Here: &nbsp;&nbsp; </strong> {{ $q_item_info->title }}
                                                    <br><br>

                                                <div class='form-group'>
                                                  {{ Form::label('answer', 'Answer') }}
                                                  {{ Form::text('answer',Input::old('answer'),['class'=>'form-control','placeholder'=>'Students Answer will be Shown here']) }}
                                                </div>

                                                <div class='form-group'>
                                                  {{ Form::label('marks', 'Marks') }}
                                                  {{ Form::text('marks', $evaluate_qp->marks ,Input::old('marks'),['required'=>'required']) }}
                                                   <strong>out of : </strong> {{  $q_item_info->marks}}
                                                </div>

                                               {{ Form::submit('Evaluate', array('id'=>'submit_if', 'class'=>'btn btn-primary btn-xs')) }}

                                                <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions-items',['adm_question_id'=>$a_q_id, 'adm_question_item_id'=>$a_q_itm_id, 'no_q'=>$no_q+1 ]) }}" class="btn bg-orange btn-xs " >Next</a>
{{--                                                <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions-items',['adm_question_id'=>$a_q_id, 'adm_question_item_id'=>$a_q_itm_id, 'no_q'=>$no_q-1]) }}" class="btn bg-orange btn-xs " >Back</a>--}}

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