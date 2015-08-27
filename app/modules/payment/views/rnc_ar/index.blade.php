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
                <a href="{{ URL::route('manage-hr-invoice') }}" type="button" class="pull-right btn btn-sm btn-info" > >> RNC Invoice</a>
           </div>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> rnc_research_paper_id </th>
                    <th> user_id </th>
                    <th> issue_date  </th>
                    <th> count </th>
                    <th> total_amount </th>
                    <th> status </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr style="{{$values->status=='invoiced' ? 'background-color: burlywood' : '' }}">
                    <td><b>
                        {{ link_to_route($values->status!="invoiced" ?'rnc-bill-details' : 'rnc-bill-details',$values->rnc_research_paper_id,['trn_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td> {{ $values->user_id }}</td>
                    <td>{{ $values->issue_date }}</td>
                    <td>{{ $values->count }}  </td>
                    <td>{{ $values->total_amount }}  </td>
                    <td>{{Str::title($values->status)}}</td>
                    <td>@if($values->status != 'invoiced')
                            <a href="{{ URL::route('rnc-ar-create-invoice', ['trn_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Create Invoice"><span class="fa fa-pencil"></span> + Invoice</a>
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