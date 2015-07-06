@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_student')
@stop
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">
            <h3 class="text-purple ">Fees::Billing Setup</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing setup</a></li>
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
                        {{Form::open(array('route'=> ['student.billing.setup']))}}
                        <div class="col-sm-12 ">
                            <div class="form-inline radio-inline">
                                <div class="radio radio-style">
                                    {{ Form::radio('regularOrInstallment','installment',true ) }}
                                    {{ Form::label('installment','Installment') }}
                                </div>
                                <div class="radio radio-style">
                                    {{ Form::radio('regularOrInstallment','regular') }}
                                    {{ Form::label('regular', 'Regular') }}
                                    {{ Form::submit('Show', array('class'=>'btn btn-primary show_btn show_btn_padding'))}}
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}

                        @if($regularOrInstallment == 'regular')
                            <div class="box-body table-responsive ">
                                <table id="example" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.No</th>
                                        <th>Schedule</th>
                                        <th>Item</th>
                                        <th>Cost</th>
                                        <th>Deadline</th>
                                        <th>Fined Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sl=1;?>
                                    @if(isset($data))
                                        @foreach($data as $value)
                                            <tr>
                                                <td class="sl-no-size">{{$sl++}}</td>
                                                <td>{{isset($value->relBillingSchedule->title) ? $value->relBillingSchedule->title:''}}</td>

                                                <td>{{isset($value->relBillingItem->title) ? $value->relBillingItem->title: ''}}</td>

                                                <td>{{isset($value->cost) ? $value->cost : ''}}</td>

                                                <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>

                                                <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>

                                <p><b>This is one time setup.So choose the option by thinking carefully.</b></p>
                                {{Form::open(array('route'=> ['student.billing.setup.save']))}}
                                {{ Form::hidden('applicant_id', $applicant_id) }}
                                {{ Form::hidden('billing_type','regular') }}
                                {{ Form::submit('Submit', array('class'=>'btn btn-success'))}}
                                {{Form::close()}}

                                <a href="{{ URL::route('student.billing.setup')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back to All List</a>

                            </div>
                        @else
                            <div class="box-body table-responsive ">
                                <table id="example" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.No</th>
                                        <th>Schedule</th>
                                        <th>Item</th>
                                        <th>Cost</th>
                                        <th>Deadline</th>
                                        <th>Fined Cost</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sl=1;?>
                                    @if(isset($data))
                                        @foreach($data as $value)
                                            <tr>
                                                <td class="sl-no-size">{{$sl++}}</td>
                                                <td>{{isset($value->relBillingSchedule->title) ? $value->relBillingSchedule->title:''}}</td>

                                                <td>{{isset($value->relBillingItem->title) ? $value->relBillingItem->title: ''}}</td>

                                                <td>{{isset($value->cost) ? $value->cost : ''}}</td>

                                                <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>

                                                <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <p><b>This is one time setup.So choose the option by thinking carefully.</b></p>
                                {{Form::open(array('route'=> ['student.billing.setup.save']))}}
                                {{ Form::hidden('applicant_id', $applicant_id) }}
                                {{ Form::hidden('billing_type','installment') }}
                                {{ Form::submit('Submit', array('class'=>'btn btn-success'))}}
                                {{Form::close()}}
                                <a href="{{ URL::route('student.billing.setup')}}" class="btn-link pull-right"><i class="fa fa-backward text-red"></i> Back to All List</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
