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
                    <td><b>
                    {{ link_to_route('ap-payment-voucher', $values->relInvSupplier->code, ['supplier_id'=>$values->inv_supplier_id, 'coa_id'=>$values->acc_chart_of_accounts_id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{ $values->company_name }}</td>
                    <td>{{ $values->relAccChartOfAccounts->account_code }}</td>
                    <td>{{ $values->relAccChartOfAccounts->description }}</td>
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