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
                  + New Requisition
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
                    <th> Requisition NO: </th>
                    <th> Supplier </th>
                    <th> Date </th>
                    <th> Note  </th>
                    <th> Req: Type </th>
                    <th> Status </th>
                    <th> Action</th>
                    <th> Create PO</th>

                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr style="{{$values->status=='approved' ? 'background-color: burlywood' : '' }}">
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td><b>
                        {{ link_to_route($values->status!="approved" ?'requisition-detail' : 'requisition-show',$values->requisition_no,['req_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{Str::title($values->relInvSupplier->company_name)}}</td>
                    <td>{{ $values->date }}  </td>
                    <td>{{$values->note}}</td>
                    <td>{{Str::title($values->requisition_type)}}</td>
                    <td>{{Str::title($values->status)}}</td>

                    <td>
                        @if($values->status=='open')
                            <a href="{{ URL::route('requisition-show', ['req_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                            <a href="{{ URL::route('requisition-edit',['req_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                            <a data-href="{{ URL::route('requisition-destroy', ['req_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-circle-o-notch" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                        @elseif($values->status=='approved')
                            <a href="{{ URL::route('requisition-show', ['req_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        @endif
                    </td>
                    <td>
                        @if($values->status != 'approved')
                            <a data-href="{{ URL::route('create/purchase-order', ['req_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-adjust" style="color: darkslategray" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i> PO</a>
                        @endif
                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

    {{$data->links();}}

</div>
{{Form::open(['route'=>'requisition-store', 'files'=>true])}}
        @include('inventory::requisition_head._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop