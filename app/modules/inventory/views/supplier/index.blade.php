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
                  + New Product
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'product-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Code</th>
                    <th> Title</th>
                    <th> Image </th>
                    <th> Product Class</th>
                    <th> Product Category  </th>
                    <th> Cost Price </th>
                    <th> Pur. Unit </th>
                    <th> Pur. Unit QTY </th>
                    <th> Stock Unit</th>
                    <th> Stock Unit QTY</th>
                    <th> Stock Type</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>{{$values->code}}</td>
                    <td>{{$values->title}}</td>
                    <td>{{$values->image}}</td>
                    <td>{{$values->product_class}}</td>
                    <td>{{Str::title($values->relInvProductCategory->title)}}</td>
                    <td>{{$values->cost_price}}</td>
                    <td>{{$values->purchase_unit}}</td>
                    <td>{{$values->purchase_unit_quantity}}</td>
                    <td>{{$values->stock_unit}}</td>
                    <td>{{$values->stock_unit_quantity}}</td>
                    <td>{{$values->stock_type}}</td>
                    <td>
                        <a href="{{ URL::route('product/show', ['p_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        <a href="{{ URL::route('product/edit',['p_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('product/destroy', ['p_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" ></i></a>

                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

</div>
{{Form::open(['route'=>'product/store', 'files'=>true])}}
        @include('inventory::product._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop