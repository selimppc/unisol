@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">
            <h3 class="text-purple ">Billing History</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing History</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">


                        {{--****************Applicant*******************--}}

                            <div class="box-body table-responsive ">
                                <table id="example1" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name of Applicant</th>
                                        <th>Schedule</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($applicant_data))
                                        @foreach($applicant_data as $value)
                                            <tr>
                                                <td>{{isset($value->first_name) ? $value->first_name:''}}
                                                    {{isset($value->last_name) ? $value->last_name:''}}</td>
                                                <td>{{isset($value->schedule_title) ? $value->schedule_title:''}}</td>
                                                <td>{{isset($value->amount) ? $value->amount : ''}}</td>
                                                <td>
                                                 {{--   <a href="{{URL::route('billing.history.show',['id'=>$value->id,'app_stu_id'=> $studentOrApplicant])}}" class="btn btn-xs btn-default" href=""><i class="fa fa-eye" style="color: green"></i></a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <br>

                                <table id="example" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Schedule</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($student_data))
                                        @foreach($student_data as $value)
                                            <tr>
                                                <td>{{isset($value->first_name) ? $value->first_name:''}} {{isset($value->last_name) ? $value->last_name:''}}</td>
                                                <td>{{isset($value->schedule_title) ? $value->schedule_title:''}}</td>
                                                <td>{{isset($value->amount) ? $value->amount : ''}}</td>
                                                <td>
                                                    <a href="{{URL::route('billing.history.show',['id'=>$value->id,'app_stu_id'=> $studentOrApplicant])}}" class="btn btn-xs btn-default" href=""><i class="fa fa-eye" style="color: green"></i></a>
                                                </td>
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
