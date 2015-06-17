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
                  + New Journal Voucher
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'batch-requisition-destroy' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to cancel?')"])}}
                <tr>
                    <th> voucher_number </th>
                    <th> date </th>
                    <th> reference </th>
                    <th> year_id  </th>
                    <th> period </th>
                    <th> note</th>
                    <th> status</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                    <td><b>
                        {{ link_to_route('show-chart-of-accounts',$values->voucher_number,['coa_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{ $values->date }}  </td>
                    <td>{{$values->reference}}</td>
                    <td>{{$values->year_id}}</td>
                    <td>{{$values->period}}</td>
                    <td>{{$values->note}}</td>
                    <td>{{$values->status}}</td>
                    <td>
                        @if($values->status=='open')
                        <a href="{{ URL::route('show-stock-adjustment', ['adj_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="View Dispatch" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        <a href="{{ URL::route('edit-stock-adjustment',['adj_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('cancel-stock-adjustment', ['adj_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-circle-o-notch" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                    @elseif($values->status=="Confirmed Adjustment")
                        <a href="{{ URL::route('show-stock-adjustment', ['sd_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="View Dispatch" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                    @endif

                    </td>
                    <td>
                    @if($values->status!="Confirmed Adjustment")
                    <a href="{{ URL::route('sp-confirm-stock-adjustment', ['adj_head_id'=>$values->id ])  }}" class="btn btn-success btn-xs" title="Approve Stock Adjustment" > Approve ADJ</a>
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
{{Form::open(['route'=>'store-of-accounts', 'files'=>true])}}
        @include('accounts::chart_of_accounts._modal._modal')
{{ Form::close() }}

{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">
    </div>
  </div>
</div>

@stop