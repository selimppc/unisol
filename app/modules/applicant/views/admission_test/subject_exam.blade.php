@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <p>
        <span class="page-header text-purple">Starting... | Admission Test</span><br>
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
                                    <td>1 of 6</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <p style="color: orangered">Start your exam by clicking on the button "Start Exam"</p>
                </ul>

                {{ Form::open(array('url'=> array('applicant/admission/start-admission-test'), 'method' => 'POST')) }}
                {{Form::hidden('adm_question_id', $adm_question_id )}}
                {{Form::hidden('question_number', 0 )}}
                {{Form::hidden('batch_admtest_subject_id', $batch_admtest_subject_id )}}

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive" style="text-align: center; padding: 0% 3% 5% 3%">
                            <button type="submit" class="btn btn-facebook btn-lg">
                              Start Exam
                            </button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

@stop