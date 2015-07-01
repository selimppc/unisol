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
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  Add HR Employee
                </button>
           </div>
        </div>

        {{ Form::open([ 'route'=>'employee.batch_delete' ])}}

        <div class="box-body">
         <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                     <th>Employee Name</th>
                     <th>Employee Id</th>
                    <th>Join Date</th>
                    <th>Designation</th>
                    <th style="text-align: center">Bank</th>
                    <th>Bank Acc. No</th>
                    <th>Employee Type</th>
                    <th>Employee Category</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                     <td>{{ $values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name }}</td>
                     <td>{{ $values->employee_id }}</td>
                    <td>{{ $values->date_of_joining }}</td>
                    <td>{{ ucfirst($values->relDesignation->title) }}</td>
                    <td>{{ ucfirst($values->relHrBank->bank_name) }}</td>
                    <td>{{ $values->bank_account_no }}</td>
                    <td>{{ ucfirst($values->employee_type) }}</td>
                    <td>{{ ucfirst($values->employee_category) }}</td>
                    <td>{{ ucfirst($values->status) }}</td>
                    <td>
                        <a href="{{ URL::route('employee.show', ['emp_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><i style="color: #149bdf" class="fa fa-eye"></i></a>
                        <a href="{{ URL::route('employee.edit',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i style="color: #7b24dd" class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('employee.destroy', ['emp_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i style="color: red" class="fa fa-trash-o" ></i></a>
                    </td>
                    <td>
                        <a href="{{ URL::route('salary',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Salary</a>
                        <a href="{{ URL::route('bonus',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Bonus</a>
                        <a href="{{ URL::route('over_time',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Over Time</a>
                        <a href="{{ URL::route('loan_head',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Loan Head</a>
                        <a href="{{ URL::route('salary_advance',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Salary Advance</a>
                        <a href="{{ URL::route('salary_transaction',['emp_id'=>$values->id])  }}" class="btn btn-default btn-xs" style="color: #802420">Salary Transaction</a>
                    </td>
                 </tr>
                @endforeach
            </tbody>
         </table>
        </div>
        {{form::close() }}
    </div>
</div>
{{Form::open(['route'=>'employee.store', 'files'=>true])}}
        @include('hr::hr.employee._modal._modal')
{{ Form::close() }}

{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">
    </div>
  </div>
</div>

@stop