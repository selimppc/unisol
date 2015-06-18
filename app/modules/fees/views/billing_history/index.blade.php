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
            <h3 class="text-purple ">Fees::Billing History</h3>
            <div class="help-text-top">
                You can view all lists of Billing History and search. Also this panel will allow you to perform some actions Like <b>View</b> individual billing history under the column <b>Action</b>.
            </div><!-- /.box-body -->
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
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                        {{--****************** Filter :Starts ***********************--}}

                        {{Form::open(array('route'=> ['billing.history']))}}
                        <div class="col-sm-8 ">
                            <div class="col-sm-4">
                                {{ Form::label('department_id', 'Department') }}
                                {{ Form::select('department_id',$department,Input::old('department_id'), array('class' => 'form-control') ) }}
                            </div>
                            <div class="col-sm-4">
                                {{ Form::label('degree_id', 'Degree') }}
                                {{ Form::select('degree_id',$degree,Input::old('degree_id'), array('class' => 'form-control') ) }}
                            </div>
                            <div class="col-sm-4">
                                {{ Form::label('batch_id', 'Batch') }}
                                {{ Form::select('batch_id',$batch, Input::old('batch_id'), array('class' => 'form-control')) }}
                            </div>
                            <div class="col-sm-4">
                                <div class="form-inline radio-inline">
                                    <div class="radio radio-style">
                                        {{ Form::radio('studentOrApplicant','applicant',true) }}
                                        {{ Form::label('applicant', 'Applicant') }}
                                    </div>
                                    <div class="radio radio-style">
                                        {{ Form::radio('studentOrApplicant','student' ) }}
                                        {{ Form::label('student','Student') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 inline-textbox">
                            <div class="form-inline">
                                <div class="form-group ">
                                    <div class="col-lg-12">
                                        {{ Form::text('student_id',Input::old('student_id'), array('class'=>'textbox-style','placeholder'=>'Enter id')) }} OR
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-12">
                                        {{ Form::text('student_name',Input::old('student_name'), array('class'=>'textbox-style','placeholder'=>'Enter name')) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 btn-style">
                            {{ Form::submit('Filter', array('class'=>'btn','id'=>'button'))}}
                        </div>
                        {{Form::close()}}
                        {{-- End Filter--}}

                        {{--****************Student*******************--}}
                        @if($studentOrApplicant == 'student')
                            <div class="box-body table-responsive ">
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
                                    @if(isset($data))
                                        @foreach($data as $value)
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
                                <a href="{{ URL::route('billing.history')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back to All List</a>
                                </br>
                            </div>
                        @else
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
                                    @if(isset($data))
                                        @foreach($data as $value)
                                            <tr>
                                                <td>{{isset($value->first_name) ? $value->first_name:''}}
                                                    {{isset($value->last_name) ? $value->last_name:''}}</td>
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
                                <a href="{{ URL::route('billing.history')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back to All List</a>
                                <br>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
