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
                  + New Dispatch
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'batch-cancel-dispatch' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to cancel?')"])}}
                <tr>
                    <th><input type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Transfer Number </th>
                    <th> Transfer To (Dept.) </th>
                    <th> Date </th>
                    <th> Confirm Date  </th>
                    <th> Note </th>
                    <th> Status </th>
                    <th> Action</th>
                    <th> Confirm </th>

                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>
                    <b>{{ link_to_route($values->status!="approved" ?'add-product-dispatch' : 'show-dispatch',$values->transfer_number,['req_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}</b>
                    </td>
                    <td>{{isset($values->transfer_to)? $values->relDepartment->title :'' }}</td>
                    <td>{{$values->date }}</td>
                    <td>{{$values->confirm_date }}</td>
                    <td>{{$values->note }}</td>
                    <td>{{$values->status }}</td>
                    <td>
                        @if($values->status=='open')
                        <a href="{{ URL::route('show-dispatch', ['sd_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="View Dispatch" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        <a href="{{ URL::route('edit-dispatch',['sd_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('cancel-dispatch', ['sd_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-circle-o-notch" style="color: red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                    @elseif($values->status=="Confirmed Dispatch")
                        <a href="{{ URL::route('show-dispatch', ['sd_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="View Dispatch" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                    @endif

                    </td>
                    <td>
                    <a href="{{ URL::route('sp-confirm-dispatch', ['transfer_head_id'=>$values->id ])  }}" class="btn btn-success btn-xs" title="Confirm Dispatch" > Confirm Dispatch</a>
                    </td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

{{--    {{$data->links();}}--}}

</div>
{{Form::open(['route'=>'store-stock-dispatch', 'files'=>true])}}
        @include('inventory::stock._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content " style="z-index:1050">
    </div>
  </div>
</div>



@stop