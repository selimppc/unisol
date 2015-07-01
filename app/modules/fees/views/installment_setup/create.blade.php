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
            <h3 class="text-purple ">Fees::Billing Installment</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="col-sm-12 aca-cost-panel">
                    <div class="aca-style"><b>Academic Cost: {{$data}} ; Per Installment Cost: {{$total}}</b></div>
                </div>‏
                <table class="table table-bordered small-header-table" >
                    {{ Form::open(['route'=>'installment.setup.save', 'method'=>'post', 'class'=>'form-horizontal']) }}
                    <thead>
                    <th>Amount</th>
                    <th>Fined Cost</th>
                    <th>Deadline</th>
                    </thead>
                    <tbody>
                    {{ Form::hidden('batch_id', ($batch_id)? $batch_id: '','') }}
                    {{ Form::hidden('schedule_id', ($schedule_id)? $schedule_id: '','') }}
                    {{ Form::hidden('item_id', ($item_id)? $item_id: '','') }}
                    {{ Form::hidden('status', ($status)? $status: 'create','') }}

                    @for($i = 0; $i < $no_installment; $i++)
                        <tr>
                            <td>{{ Form::text('amount[]', ($total) ? $total : Input::old('amount'), ['class'=>'form-control', 'required'=>'required']) }}</td>

                            <td>{{ Form::text('fined_cost[]',$totalfc, Input::old('fined_cost'), ['class'=>'form-control', 'required'=>'required']) }}</td>

                            <td>{{ Form::text('deadline[]', $deadlines[$i] ,Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}</td>
                        </tr>
                    @endfor
                    </tbody>
                    <tr>
                        <td class="btn-style2" colspan="3">{{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
                        <a href="{{ URL::route('installment.setup')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back </a></td>
                    </tr>
                    {{ Form::close() }}
                </table>
            </div>
        </div>
    </div>
@stop