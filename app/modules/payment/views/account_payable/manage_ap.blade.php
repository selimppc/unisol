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
                    <th> Supplier Code </th>
                    <th> Supplier Name </th>
                    <th> Account Code </th>
                    <th> Account Name  </th>
                    <th> Contact Person </th>
                    <th> Payable Amount </th>


                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr>
                    <td> {{ $values->supplier_code }}</td>
                    <td>{{ $values->company_name }}</td>
                    <td>{{ $values->relAccChartOfAccounts->account_code }}</td>
                    <td>{{ $values->relAccChartOfAccounts->description }}</td>
                    <td>{{ $values->description }}  </td>
                    <td>{{ $values->contact_person }}  </td>
                    <td>{{ $values->prime_amount }}  </td>


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