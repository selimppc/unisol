@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <p>
        <span class="page-header text-purple">Admission Test</span><br>
        <small>you can view all Degree list you applied. Click on the degree name for admission details</small>
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
                                <thead>
                                <tr>
                                    <th>Degree</th>
                                    <th>Test Date</th>
                                    <th>Test Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data))
                                    @foreach ($data as $value)
                                    <tr>
                                        <td>
                                            <a href="{{URL::route('applicant.admission-test-subject',['batch_id'=>$value->batch_id])}}" class="btn-link">
                                                {{isset($value->relBatch->relDegree->title)? $value->relBatch->relDegree->title : ''}},
                                                {{isset($value->relBatch->relSemester->title) ? $value->relBatch->relSemester->title : '' }},
                                                {{isset($value->relBatch->relYear->title)?$value->relBatch->relYear->title : ''}}
                                            </a>
                                        </td>

                                        <td>{{date("d-m-Y", strtotime((isset($value->relBatch->admtest_date)) ? $value->relBatch->admtest_date : '') ) }}</td>

                                        <td>{{ date("d-m-Y", strtotime((isset($value->relBatch->admtest_start_time) ? $value->relBatch->admtest_start_time : ''))) }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop