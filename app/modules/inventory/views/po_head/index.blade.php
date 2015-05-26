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
                  + New Purchase Order
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'batch-purchase-order-destroy' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to cancel?')"])}}
                <tr>
                    <th><input type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> PO NO: </th>
                    <th> Req NO: </th>
                    <th> Pay Terms </th>
                    <th> Delivery Date  </th>
                    <th> Tax (%)</th>
                    <th> Tax Amount </th>
                    <th> Dis.t Rate (%) </th>
                    <th> Disc. Amount</th>
                    <th> Amount </th>
                    <th> Status</th>
                    <th> Action </th>
                    <th> GRN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr style="{{$values->status=='approved' ? 'background-color: burlywood' : '' }}">
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td><b>
                        {{ link_to_route($values->status!="approved" ?'purchase-order-detail' : 'purchase-order-show',$values->purchase_no,['po_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{ isset($values->inv_requisition_head_id)? $values->relInvRequisitionHead->requisition_no : ''}}</td>
                    <td>{{ $values->pay_terms }}  </td>
                    <td>{{ $values->delivery_date }}</td>
                    <td>{{ round($values->tax) }}</td>
                    <td>{{ $values->tax_amount }}</td>
                    <td>{{ round($values->discount_rate) }} </td>
                    <td>{{ round($values->discount_amount, 2) }}</td>
                    <td>{{ round($values->amount, 2) }}</td>
                    <td>{{Str::title($values->status)}}</td>

                    <td>
                        @if($values->status=='open')
                            <a href="{{ URL::route('purchase-order-show', ['po_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                            <a href="{{ URL::route('purchase-order-edit',['po_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                            <a data-href="{{ URL::route('purchase-order-destroy', ['po_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-circle-o-notch" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                        @elseif($values->status=='approved')
                            <a href="{{ URL::route('purchase-order-show', ['po_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        @endif
                    </td>
                    <td>
                        @if($values->status != 'approved')
                            <a href="{{ URL::route('create-grn', ['po_id'=>$values->id, 'user_id'=> 1 ]) }}" class="btn btn-xs btn-default"  ><i class="fa fa-adjust" style="color: darkslategray" data-toggle="tooltip" data-placement="bottom" title="Create GRN"></i> + GRN</a>
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
{{Form::open(['route'=>'purchase-order-store', 'files'=>true])}}
        @include('inventory::po_head._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="z-index:1050">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop