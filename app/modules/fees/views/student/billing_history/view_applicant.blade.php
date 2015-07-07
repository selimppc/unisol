@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_student')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-purple ">User Information</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="box-body table-responsive ">

                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Name:</td>
                        <td>{{isset($data->first_name) ? $data->first_name:''}} {{isset($data->last_name) ? $data->last_name:''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td>
                            {{isset($data->relDepartment->title) ? $data->relDepartment->title :''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Degree:</td>
                        <td>
                            {{isset($data->relDegree->relDegreeProgram->title) ? $data->relDegree->relDegreeProgram->title :''}}
                        </td>
                    </tr>
                    <tr>
                        <td>Batch:</td>
                        <td>
                            {{isset($data->relBatch->batch_number) ? $data->relBatch->batch_number :''}}
                        </td>
                    </tr>
                     <tr>
                         <td>User Type:</td>
                         <td>
                             Applicant
                         </td>
                     </tr>
                </table>
            </div>
            <div>&nbsp;</div>

                <h3 class="text-purple ">Billing Details</h3>
                <div class="box-body table-responsive ">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <th>SL.No</th>
                        <th>Item</th>
                        <th>Schedule</th>
                        <th>Waiver Amount</th>
                        <th>Amount</th>
                        </thead>
                        <tbody>
                        <?php $i=0;$sl=1; ?>
                        @if(isset($applicant_data))
                            @foreach($applicant_data[$i]->relBillingDetailsApplicant as $value)
                                <tr>
                                    <td class="sl-no-size">{{$sl++}}</td>

                                    <td>{{$value['relBillingItem']['title']}}</td>

                                    <td>{{$applicant_data[$i]->relBillingSchedule->title}}</td>

                                    <td>{{$value['waiver_amount']}}</td>

                                    <td>{{$value['total_amount']-$value['waiver_amount']}}</td>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <a href="{{ URL::route('student.billing.history')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back to All List</a>
                </div>
        </div>

    </div>
@stop



