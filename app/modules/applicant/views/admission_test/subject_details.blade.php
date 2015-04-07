@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin">Admission Test </h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Admission Test </a></li>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                @foreach($batch_applicant as $value)
                                <tr>
                                    <th>Degree:</th>
                                    <td>  {{isset($value->relBatch->relDegree->title)? $value->relBatch->relDegree->title : ''}},
                                        {{isset($value->relBatch->relSemester->title) ? $value->relBatch->relSemester->title : '' }},
                                        {{isset($value->relBatch->relYear->title)?$value->relBatch->relYear->title : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Test Date:</th>
                                    <td>{{date("d-m-Y", strtotime((isset($value->relBatch->admtest_date)) ? $value->relBatch->admtest_date : '') ) }}</td>
                                </tr>
                                <tr>
                                    <th>Test Time:</th>
                                    <td>{{ date("d-m-Y", strtotime((isset($value->relBatch->admtest_start_time) ? $value->relBatch->admtest_start_time : ''))) }}</td>
                                </tr>
                                    @endforeach
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

                                            <a href="{{ URL::route('subject-exam.show', ['id'=>$value->id])  }}" class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a href="" class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop