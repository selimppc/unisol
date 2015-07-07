@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<h3>HR Provident Fund Config</h3>

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"></div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
           </div>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Employee Type</th>
                    <th> Contribution Amount </th>
                    <th> Company Contribution 0</th>
                    <th> Company Contribution 25</th>
                    <th> Company Contribution 50</th>
                    <th> Company Contribution 75</th>
                    <th> Company Contribution 100</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td>{{ucfirst($values->employee_type)}}</td>
                    <td>{{$values->contribution_amount}}</td>
                    <td>{{$values->company_contribution_0}}</td>
                    <td>{{$values->company_contribution_25}}</td>
                    <td>{{$values->company_contribution_50}}</td>
                    <td>{{$values->company_contribution_75}}</td>
                    <td>{{$values->company_contribution_100}}</td>
                 </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
    </div>
</div>


@stop