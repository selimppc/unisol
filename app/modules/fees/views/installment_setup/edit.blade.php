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
                </ul>
                <div class="col-sm-12 aca-cost-panel">
                    <div class="aca-style"><b>Academic Cost: {{$data}}</b></div>
                </div>‏

                {{--Show already inserted data in table--}}
                <table class="table table-bordered small-header-table" >
                    <thead>
                    <th>Amount</th>
                    <th>Fined Cost</th>
                    <th>Deadline</th>
                    </thead>
                    <tbody>
                    @if(isset($view_installment_setup))
                        @foreach($view_installment_setup as $value)
                            <tr>
                                <td>{{Form::text('amount', ($value->cost) ? $value->cost : Input::old('amount'), ['class'=>'form-control', 'required'=>'required']) }}</td>

                                <td>{{Form::text('fined_cost', ($value->fined_cost) ? $value->fined_cost : Input::old('fined_cost'), ['class'=>'form-control', 'required'=>'required']) }}</td>

                                <td>{{Form::text('deadline', date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '')), ['class'=>'form-control', 'required'=>'required']) }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>


                <table class="table table-bordered small-header-table" >
                    <thead>
                    <th>Amount</th>
                    <th>Fined Cost</th>
                    <th>Deadline</th>
                    </thead>

                    {{--Add again installment--}}
                    {{Form::open(array('route' => array('installment.setup.edit',)))}}
                    <div class="col-sm-2 no-of-installment">
                        {{Form::label('no_installment', 'No of Installment') }}
                        {{Form::selectRange('no_installment', 1, 48,'', ['class' => 'form-control','required'=>'required'])}}
                    </div>
                    {{ Form::text('total', $data) }}
                    <div class="col-sm-2 recreate-btn">
                        {{ Form::submit('Add New',['class'=>'btn btn-xs btn-primary']) }}
                       {{-- <a href="{{ URL::route('installment.setup.edit',['batch_id'=>$view_installment_setup->batch_id,'sch_id'=>$view_installment_setup->billing_schedule_id,'item_id'=>$view_installment_setup->billing_item_id])}}" class="btn btn-xs btn-success">Recreate</a>--}}
                    </div>
                    {{ Form::close() }}

                    {{--Save installment--}}
                    {{ Form::open(['route'=>'installment.setup.save', 'method'=>'post', 'class'=>'form-horizontal']) }}
                    <tbody>
                    {{ Form::text('batch_id', ($batch)? $batch: '') }}
                    {{ Form::text('billing_schedule_id', ($schedule)? $schedule: '') }}
                    {{ Form::text('billing_item_id', ($item)? $item: '') }}

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