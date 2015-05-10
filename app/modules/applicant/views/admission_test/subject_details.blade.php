@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <p>
        <span class="page-header text-purple">Exam Subjects for Admission Test</span><br>
        <small>you can seat for exam with the following subjects </small>
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
                                    <th>Degree:</th>
                                    <td> {{isset($batch_applicant->relBatch->relDegree->relDegreeLevel->code)? $batch_applicant->relBatch->relDegree->relDegreeLevel->code : ''}}
                                         {{isset($batch_applicant->relBatch->relDegree->relDegreeGroup->code)? $batch_applicant->relBatch->relDegree->relDegreeGroup->code : ''}} In
                                         {{isset($batch_applicant->relBatch->relDegree->relDegreeProgram->code)? $batch_applicant->relBatch->relDegree->relDegreeProgram->code : ''}},
                                         {{isset($batch_applicant->relBatch->relSemester->title) ? $batch_applicant->relBatch->relSemester->title : '' }}-
                                         {{isset($batch_applicant->relBatch->relYear->title)? $batch_applicant->relBatch->relYear->title : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Test Date:</th>
                                    <td>{{date("d-m-Y", strtotime((isset($batch_applicant->relBatch->admtest_date)) ? $batch_applicant->relBatch->admtest_date : '') ) }}</td>
                                </tr>
                                <tr>
                                    <th>Test Time:</th>
                                    <td>{{ date("d-m-Y", strtotime((isset($batch_applicant->relBatch->admtest_start_time) ? $batch_applicant->relBatch->admtest_start_time : ''))) }}</td>
                                </tr>
                            </table>
                            <h4 class=" text-purple">Admission Test Subject</h4>
                            <div>&nbsp;</div>
                            <table class="table table-striped  table-bordered">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($test_subject as $value)
                                    <tr>
                                        <td>{{$value->relAdmtestSubject->title}}</td>
                                        <td>{{$value->marks}}</td>
                                        <td>{{$value->duration}}</td>
                                        <td>
                                            <a href="{{ URL::route('applicant.admission-exam-subject', ['batch_id'=>$value->batch_id, 'admtest_subject_id'=>$value->admtest_subject_id])  }}" class="btn btn-xs btn-tumblr"><i class="fa fa-pencil-square-o"></i> Start Exam</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('applicant.admission-test')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop