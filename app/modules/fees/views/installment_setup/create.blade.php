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
                <div class="box-body table-responsive ">
                        <table class="table table-bordered small-header-table" >
                            <thead>
                            <th>Amount</th>
                            <th>Fined Cost</th>
                            <th>Deadline</th>
                            </thead>
                            <tbody>
                            <td><input type="text" name="amount" class="amount"/></td>
                            <td><input type="text" name="fined_cost" class="fined_cost"/></td>
                            <td>{{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}</td>
                            </tbody>
                        </table>
                        <div class="btn-style2">
                            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
                        </div>

                </div>
            </div>
        </div>
    </div>


@stop