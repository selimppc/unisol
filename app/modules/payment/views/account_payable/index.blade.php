@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  + Action
                </button>
           </div>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>

                <tr>
                    <th> GRN NO: </th>
                    <th> Date </th>
                    <th> Supplier Name </th>
                    <th> PO NO  </th>
                    <th> Pay Term </th>
                    <th> Tax Rate </th>
                    <th> Tax Amount </th>
                    <th> Net Amount </th>
                    <th> Status </th>
                    <th> Action</th>
                    <th> + VAT</th>

                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr style="{{$values->status=='invoiced' ? 'background-color: burlywood' : '' }}">
                    <td><b>
                        {{ link_to_route($values->status!="invoiced" ?'requisition-detail' : 'requisition-show',$values->id,['req_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td> {{ $values->date }}</td>
                    <td>{{isset($values->inv_supplier_id) ? Str::title($values->relInvSupplier->company_name) : ''}}</td>
                    <td>{{ $values->voucher_no }}</td>
                    <td>{{ $values->pay_terms }}  </td>
                    <td>{{ $values->tax_rate }}  </td>
                    <td>{{ $values->tax_amount }}  </td>
                    <td>{{ $values->net_amount }}  </td>
                    <td>{{Str::title($values->status)}}</td>

                    <td>
                        @if($values->status=='open')
                            <a href="{{ URL::route('requisition-show', ['req_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                            <a href="{{ URL::route('requisition-edits',['req_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                            <a data-href="{{ URL::route('requisition-destroy', ['req_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-circle-o-notch" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                        @elseif($values->status=='PO Created')
                            <a href="{{ URL::route('requisition-show', ['req_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        @endif
                    </td>
                    <td>
                        @if($values->status != 'PO Created')
                            <a href="{{ URL::route('create/purchase-order', ['req_id'=>$values->id, 'user_id'=>1 ]) }}" class="btn btn-xs btn-default" ><i class="fa fa-adjust" style="color: darkslategray" data-toggle="tooltip" data-placement="bottom" title="Create PO"></i> + PO</a>
                        @endif
                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>

    </div>

{{--    {{$data->links();}}--}}

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