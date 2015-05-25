@extends('layouts.layout')
@section('sidebar')
    @include('inventory::_sidebar._inventory')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Product Code: </th>
                    <th> Product Name </th>
                    <th> Batch Number </th>
                    <th> Expiry Date  </th>
                    <th> Warehouse </th>
                    <th> Stock Rate </th>
                    <th> Unit</th>
                    <th> Transfer Quantity</th>
                    <th> Stock Quantity</th>
                    <th> Available Quantity</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>

                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>

    </div>

{{--    {{$data->links();}}--}}

</div>



@stop