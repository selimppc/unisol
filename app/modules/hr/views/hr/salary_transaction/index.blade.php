@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> All Salary Transaction Head List</h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;margin-right: 100px">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  +Add
                </button>
           </div>
        </div>

        {{ Form::open([ 'route'=>'salary-transaction-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Employee Name</th>
                    <th>Transaction Number</th>
                    <th>Date</th>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Confirmation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>
                        @if($values->status=="open")
                            <b>{{ link_to_route('salary_transaction_detail', $values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name,['s_t_id'=>$values->id], ['title'=>"Details Salary Transaction",'data-toggle'=>"modal", 'data-target'=>"#modal-pc2"] ) }}</b>
                        @else
                            <b>{{ link_to_route('salary_transaction.show_confirm', $values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name,['s_t_id'=>$values->id], ['data-toggle'=>"modal", 'data-target'=>"#modal-pc"] ) }}</b>
                        @endif
                    </td>
                    <td>{{ $values->trn_number }}</td>
                    <td>{{ $values->date }}</td>
                    <td>{{ $values->relYear->title }}</td>
                    <td>{{ ucfirst($values->period) }}</td>
                    <td>{{ round($values->total_amount,2) }}</td>
                    <td>{{ ucfirst($values->status) }}</td>
                    <td>

                        @if($values->status=="open")
                                <a href="{{ URL::route('salary_transaction.show', ['s_t_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><i style="color: #149bdf" class="fa fa-eye"></i></a>
                                <a href="{{ URL::route('salary_transaction.edit',['s_t_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i style="color: #7b24dd" class="fa fa-edit"></i></a>
                                <a data-href="{{ URL::route('salary_transaction.destroy', ['s_t_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i style="color: red" class="fa fa-trash-o" ></i></a>
                        @else
                                <a href="{{ URL::route('salary_transaction.show_confirm', ['s_t_id'=>$values->id ])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"><i style="color: #0005df" class="fa fa-eye"></i></a>
                        @endif
                    </td>
                    <td>
                        @if($values->status=="open")
                                <a data-href="{{ URL::route('confirm-salary-transaction', ['st_id'=>$values->id ]) }}" class="btn btn-xs btn-success" data-toggle="modal" data-target="#confirm-status-one" href="" title="Click to Confirm" style="color: #470580"><i style="color: #470580" class="fa fa-check-square-o"></i> Confirm</a>
                        @endif

                    </td>
                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

</div>
{{Form::open(['route'=>'store-salary-transaction', 'files'=>true])}}
        @include('hr::hr.salary_transaction._modal._modal')
{{ Form::close() }}

{{--Modal Area--}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="modal-pc2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:90%">
    <div class="modal-content">
    </div>
  </div>
</div>

{{-- Modal for Confirm salary transaction --}}
<div class="modal fade" id="confirm-status-one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure to Confirm Transaction?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-success primary">OK</a>
            </div>
        </div>
    </div>
</div>

@stop