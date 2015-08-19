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
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <div class="col-sm-12">
                            <div class="col-sm-6">
                                <h4 class="text-purple">View Installment Set Up Information for :: {{isset($view_details->relBatch->batch_number) ? $view_details->relBatch->batch_number :''}} </h4>
                            </div>

                            <div class="col-sm-6">
                                {{Form::open(array('route' => array('installment.setup.create',)))}}
                                <label>Do you want to change # of installment? Then recreate this.</label>
                                {{Form::selectRange('no_installment', 1, 48,'', ['class' => 'l','required'=>'required'])}}
                                {{ Form::hidden('batch_id', ($batch_id)? $batch_id: '','') }}

                                {{ Form::hidden('schedule_id', ($schedule_id)? $schedule_id: '','') }}
                                {{ Form::hidden('item_id', ($item_id)? $item_id: '','') }}

                                {{ Form::hidden('status', 'recreate','') }}

                                {{ Form::submit('Recreate', array('class'=>' btn btn-success')) }}
                                {{Form::close()}}
                            </div>

                            </div>
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td>Degree Name:</td>
                                    <td>
                                        {{isset($view_details->relBatch->relDegree->relDegreeProgram->title) ? $view_details->relBatch->relDegree->relDegreeProgram->title :''}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Batch:</td>
                                    <td>
                                        {{isset($view_details->relBatch->batch_number) ? $view_details->relBatch->batch_number :''}}
                                    </td>
                                </tr>
                            </table>
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <th>SL.No</th>
                                <th>Amount</th>
                                <th>Fined Cost</th>
                                <th>Deadlines</th>
                                </thead>
                                <tbody>
                                <?php $sl=1;?>
                                @if(isset($view_installment_setup))
                                    @foreach($view_installment_setup as $value)
                                        <tr>
                                            <td class="sl-no-size">{{$sl++}}</td>
                                            <td>{{isset($value->cost) ? $value->cost : ''}}</td>
                                            <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>
                                            <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <p><b>Total Amount: {{$total_cost}}</b></p>
                            <p><b>Total Fined Cost: {{$total_fined_cost}}</b></p>
                            <a href="{{ URL::route('installment.setup')}}" class="btn-link style-back-btn"><i class="fa fa-backward text-red"></i> Back to All List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop