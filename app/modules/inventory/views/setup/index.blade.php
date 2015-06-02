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
                  + New Trn No
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'supplier-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th> Code</th>
                    <th> Title </th>
                    <th> Last Number </th>
                    <th> Increment  </th>
                    <th> Action  </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr>
                    <td>{{$values->code}}</td>
                    <td>{{$values->title}}</td>
                    <td>{{$values->last_number}}</td>
                    <td>{{$values->increment}}</td>

                    <td>
                        <a href="{{ URL::route('show-no-setup', ['setup_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Show" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

</div>
<!-- Add Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Transaction NUmber Setup</h4>
      </div>
      <div class="modal-body">
        {{Form::open(['route'=>'trn-no-setup', 'files'=>true])}}
            @include('inventory::setup._form')
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop