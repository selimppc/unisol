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
                                            {{ Form::radio('studentOrApplicant','student', true) }}
                                            {{ Form::label('student', 'Student') }}
                                        </div>
                                        <div class="radio">
                                            {{ Form::radio('studentOrApplicant','applicant') }}
                                            {{ Form::label('applicant', 'Applicant') }}
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
                                {{ Form::submit('Filter', array('class'=>'btn btn-success btn-sm','id'=>'button'))}}
                                </div>

                            {{Form::close()}}

                        {{--*****************Filter :Ends ****************************--}}

                   {{-- Student Index--}}
                        @if($studentOrApplicant=='student')
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

                                </tbody>
                            </table>
                        </div>
                        @else

                        {{--Applicant Index--}}

                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Name of Applicant</th>
                                    <th>Schedule</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
