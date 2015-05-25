@extends('layouts.layout')
@section('sidebar')
    @include('inventory::_sidebar._inventory')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  + New Dispatch
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'batch-requisition-destroy' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to cancel?')"])}}
                <tr>
                    <th><input type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Transfer Number </th>
                    <th> Transfer To </th>
                    <th> Date </th>
                    <th> Confirm Date  </th>
                    <th> Note </th>
                    <th> Status </th>
                    <th> Action</th>
                    <th> Create PO</th>

                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td>{{$values->transfer_number }}</td>
                    <td>{{$values->transfer_to }}</td>
                    <td>{{$values->date }}</td>
                    <td>{{$values->confirm_date }}</td>
                    <td>{{$values->note }}</td>
                    <td>{{$values->status }}</td>
                    <td>{{$values->status }}</td>
                    <td>{{$values->status }}</td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

{{--    {{$data->links();}}--}}

</div>
{{Form::open(['route'=>'requisition-store', 'files'=>true])}}
        @include('inventory::stock._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop