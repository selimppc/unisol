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
                You can view all lists of Billing History and search. Also this panel will allow you to perform some actions Like <b>View</b> individual billing history under <b>Action</b>.
            </div><!-- /.box-body -->
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing Setup</a></li>
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
                        <div>
                          {{--  {{Form::open(array('route'=> ['billing.setup']))}}--}}
                            <div class="col-sm-8">
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
                                <div class="col-sm-2">
                                    </br>
                                    {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs','id'=>'button'))}}
                                </div>
                            </div>
                            {{--{{Form::close()}}--}}
                        </div>
                        {{--*****************Filter :Ends ****************************--}}

                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Schedule</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Deadline</th>
                                    <th>Fined Cost</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data))
                                    @foreach($data as $value)
                                        <tr>
                                            <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                            </td>
                                            <td>{{isset($value->scheduleTitle) ? $value->scheduleTitle:''}}</td>

                                            <td>{{isset($value->billingTitle) ? $value->billingTitle: ''}}</td>

                                            <td>{{isset($value->cost) ? $value->cost : ''}}</td>

                                            <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>

                                            <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>

                                            <td>
                                                <a href="{{ URL::route('billing.setup.view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green"></i></a>

                                                <a href="{{ URL::route('billing.setup.edit',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                                <a data-href="{{URL::route('billing.setup.delete', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
