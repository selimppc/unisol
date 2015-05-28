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
                    <td>{{ isset($values->inv_product_id)? $values->relInvProduct->code :'' }}</td>
                    <td>{{ isset($values->inv_product_id)? $values->relInvProduct->title :'' }}</td>
                    <td> {{ isset($values->batch_number) ? $values->batch_number : '' }}</td>
                    <td> {{ $values->expire_date }}</td>
                    <td> {{ round($values->rate, 2) }}</td>
                    <td> {{ $values->unit }}</td>
                    <td> {{ $values->TransferableQty }}</td>
                    <td> {{ $values->stockQty }}</td>
                    <td> {{ $values->availableQty }}</td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>

    </div>


</div>



@stop