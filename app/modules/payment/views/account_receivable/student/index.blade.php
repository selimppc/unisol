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
                <a href="{{ URL::route('manage-student-ar') }}" type="button" class="pull-right btn btn-sm btn-info" > >> Student Money Receipt</a>
           </div>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>

                <tr>
                    <th> Student  </th>
                    <th> Billing Schedule </th>
                    <th> Total Cost </th>
                    <th> Status </th>
                    <th> Action</th>
                    <th> + VAT</th>

                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr style="{{$values->status=='invoiced' ? 'background-color: burlywood' : '' }}">
                    <td><b>
                        {{ link_to_route('details-student-receivable', Str::title($values->relUser->id),['bsh_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td> {{ Str::title($values->relBillingSchedule->title) }}</td>
                    <td>{{ $values->total_cost }}</td>
                    <td>{{Str::title($values->status)}}</td>

                    <td>
                    @if($values->status != 'Confirmed')
                            <a href="{{ URL::route('create-invoice-student',['bsh_id'=>$values->id])}}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="bottom" title="Create Invoice"><i class="fa fa-plus-circle text-red"></i> Create Invoice</a>
                    @endif
                    </td>
                    <td>
                        @if($values->status != 'Invoiced')
                            <a href="{{ URL::route('create/purchase-order', ['bsh_id'=>$values->id ]) }}" class="btn btn-xs btn-default" ><i class="fa fa-adjust" style="color: darkslategray" data-toggle="tooltip" data-placement="bottom" title="Add VAT"></i> + VAT</a>
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


{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop