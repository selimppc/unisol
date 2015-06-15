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
                  + New COA
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'batch-requisition-destroy' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to cancel?')"])}}
                <tr>
                    <th> Account Code </th>
                    <th> Description </th>
                    <th> Account Type </th>
                    <th> Account Usage  </th>
                    <th> Group One </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                    <td><b>
                        {{ link_to_route('show-chart-of-accounts',$values->account_code,['coa_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{ $values->description }}  </td>
                    <td>{{$values->account_type}}</td>
                    <td>{{$values->account_usage}}</td>
                    <td>{{$values->group_one}}</td>

                    <td>
                    <a href="{{ URL::route('show-chart-of-accounts', ['coa_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="View COA Details" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
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