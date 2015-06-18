@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-purple ">Billing Details</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box-body table-responsive ">

                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Name:</td>
                        <td>{{isset($data[0]->first_name) ? $data[0]->first_name:''}} {{isset($data[0]->last_name) ? $data[0]->last_name:''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td>
                            {{isset($data[0]->relDepartment->title) ? $data[0]->relDepartment->title :''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Degree:</td>
                        <td>
                            {{isset($data[0]->relDegree->relDegreeProgram->title) ? $data[0]->relDegree->relDegreeProgram->title :''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Batch:</td>
                        <td>
                            {{isset($data[0]->relBatch->batch_number) ? $data[0]->relBatch->batch_number :''}}
                        </td>
                    </tr>
                    <tr>
                        <td>User Type:</td>
                        <td>
                            Student
                        </td>
                    </tr>
                </table>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div class="box-body table-responsive ">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <th>Item</th>
                    <th>Schedule</th>
                    <th>Waiver Amount</th>
                    <th>Amount</th>
                    </thead>
                    <tbody>
                    @if(isset($relation_data))
                        @foreach($relation_data as $value)
                            <tr>
                                <td>{{isset($value->relBillingDetailsApplicant->relBillingItem->title) ? $value->relBillingDetailsApplicant->relBillingItem->title:''}}</td>

                                <td>{{isset($value->relBillingSchedule->title) ? $value->relBillingSchedule->title:''}}
                                </td>
                                <td>{{isset($value->waiver_amount) ? $value->waiver_amount : ''}}
                                </td>

                                <td>
                                    {{isset($value->total_amount) ? $value->total_amount : ''}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop



