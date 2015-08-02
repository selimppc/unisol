@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<div class="row">
    <div class="box box-solid ">
        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
            <a href="{{ URL::route('hr-payroll') }}" type="button" class="pull-right btn btn-xs btn-default" > << Back to Salary TRN</a>
        </div>

       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>

                <tr>
                    <th> HR Employee ID </th>
                    <th> Employee Name </th>
                    <th> Account Code </th>
                    <th> Description </th>
                    <th> Pay Amount </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr>
                    <td><b>
                    {{ link_to_route('hr-payment-voucher', $values->relHrEmployee->employee_id, ['associated_id'=>$values->associated_id, 'coa_id'=>$values->acc_chart_of_accounts_id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"]) }}
                    </b></td>
                    <td>{{ $values->name }}</td>
                    <td>{{ $values->relAccChartOfAccounts->account_code }}</td>
                    <td>{{ $values->description }}  </td>
                    <td>{{ round($values->prime_amount,2) }}  </td>
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