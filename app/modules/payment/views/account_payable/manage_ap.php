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
                        {{ link_to_route($values->status!="invoiced" ?'details-of-grn' : 'details-of-grn',$values->grn_no,['req_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td> {{ $values->date }}</td>
                    <td>{{isset($values->inv_supplier_id) ? Str::title($values->relInvSupplier->company_name) : ''}}</td>
                    <td>{{ $values->voucher_no }}</td>
                    <td>{{ $values->pay_terms }}  </td>
                    <td>{{ $values->tax_rate }}  </td>
                    <td>{{ $values->tax_amount }}  </td>
                    <td>{{ $values->net_amount }}  </td>
                    <td>{{Str::title($values->status)}}</td>

                    <td>@if($values->status != 'Invoiced')
                            <a href="{{ URL::route('ap-create-invoice', ['grn_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Create Invoice"><span class="fa fa-pencil"></span> + Invoice</a>
                            @endif
                    </td>
                    <td>
                        @if($values->status != 'Invoiced')
                            <a href="{{ URL::route('create/purchase-order', ['req_id'=>$values->id, 'user_id'=>1 ]) }}" class="btn btn-xs btn-default" ><i class="fa fa-adjust" style="color: darkslategray" data-toggle="tooltip" data-placement="bottom" title="Add VAT"></i> + VAT</a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop