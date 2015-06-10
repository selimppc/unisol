@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>

        </div>

        {{Form::open([ 'route'=>'batch-cancel-dispatch' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>

                <tr>
                    <th> Transfer Number </th>
                    <th> Transfer To (Dept.) </th>
                    <th> Date </th>
                    <th> Confirm Date  </th>
                    <th> Note </th>
                    <th> Status </th>
                    <th> Action</th>

                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td>
                    <b>{{ link_to_route('show-dispatch', $values->transfer_number,['transfer_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}</b>
                    </td>
                    <td>{{isset($values->transfer_to)? $values->relDepartment->title :'' }}</td>
                    <td>{{$values->date }}</td>
                    <td>{{$values->confirm_date }}</td>
                    <td>{{$values->note }}</td>
                    <td>{{$values->status }}</td>
                    <td>
                    @if($values->status!="Delivered")
                    <a href="{{ URL::route('confirm-deliver-stock', ['transfer_head_id'=>$values->id ])  }}" class="btn btn-success btn-xs" title="Confirm Deliver" > Confirm Deliver</a>
                    @endif
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