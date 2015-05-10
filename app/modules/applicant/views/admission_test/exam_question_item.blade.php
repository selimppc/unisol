@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <p>
        <span class="page-header text-purple">Exam (Started) | Admission Test</span><br>
        <small> Answer the question and click next for another question. Be careful about the Time</small>
    </p>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    &nbsp;
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <tr>
                                    <th width="50%">Subject:</th>
                                    <td width="50%">{{$data->relAdmtestSubject->title}}</td>
                                </tr>
                                <tr>
                                    <th>Time (Left) :</th>
                                    <td>{{$data->duration}} </td>
                                </tr>
                                <tr>
                                    <th>Question Sequence:</th>
                                    <td>{{$q_no+1}} of {{$total_question_item}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <p style="color: orangered">Select your answer and click next</p>
                </ul>

                {{ Form::open(array('url'=> array('applicant/admission/start-admission-test'), 'method' => 'POST')) }}
                {{Form::hidden('adm_question_id', $adm_question_id )}}
                {{Form::hidden('question_number', $q_no+1 )}}
                {{Form::hidden('batch_admtest_subject_id', $batch_admtest_subject_id )}}

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive" style="padding: 0% 3% 5%;">
                            <table  class="table table-striped  table-bordered">
                               <tbody>
                                 @if(isset($question_ans_opt))
                                    @foreach($question_ans_opt as $q_title)
                                    <tr>
                                        <td>
                                            <b> Question:</b>  {{$q_title->title}}
                                            {{Form::hidden('adm_question_items_id', $q_title->id )}}
                                            {{Form::hidden('question_type', $q_title->question_type )}}
                                        </td>
                                    </tr>
                                        @if($q_title->question_type =='text')
                                            <tr>
                                                <td>
                                                {{ Form::textarea('text_answer', null, array('class'=>'form-control', 'style'=>'height: 100px;', 'placeholder'=>'write down your answer here..') ) }}
                                                </td>
                                            </tr>
                                        @elseif($q_title->question_type =='radio')
                                            <tr>
                                                <td>
                                                    <ol>
                                                    @foreach($q_title->relAdmQuestionOptAns as $opt_ans)
                                                        <li><span>
                                                            {{$opt_ans->title}} &nbsp;
                                                            {{Form::radio('radio_answer', $opt_ans->id,  null, array('class'=>'radio-inline')  )}}
                                                        </span></li>
                                                    @endforeach
                                                    </ol>
                                                </td>
                                            </tr>
                                        @elseif($q_title->question_type =='checkbox')
                                            <tr>
                                                <td>
                                                    <ol>
                                                    @foreach($q_title->relAdmQuestionOptAns as $opt_ans)
                                                        <li><span>
                                                            {{$opt_ans->title}} &nbsp;
                                                            {{Form::checkbox('checkbox_answer[]', $opt_ans->id, null, array('class'=>'checkbox-inline')  )}}
                                                        </span></li>
                                                    @endforeach
                                                    </ol>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                 @endif
                               </tbody>
                            </table>

                            @if($q_no+1 < $total_question_item )
                                {{ Form::submit('Next', ['name'=>'next', 'class'=>'btn btn-bitbucket btn-sm pull-right']) }}
                            @else
                                {{ Form::submit('Finish', ['name'=>'finish', 'class'=>'btn btn-bitbucket btn-sm pull-right']) }}
                                {{Form::hidden('finish', 9 )}}
                            @endif
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop