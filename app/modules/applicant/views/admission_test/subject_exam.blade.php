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
                                @foreach($question as $value)
                                <tr>
                                    <th>Subject:</th>
                                    <td>{{isset($value->relBatchAdmtestSubject->relAdmtestSubject->title)? $value->relBatchAdmtestSubject->relAdmtestSubject->title : ''}}</td>
                                </tr>
                                 @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop