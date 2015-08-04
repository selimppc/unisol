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
           <div class="pull-left col-sm-4"> <h3> All Salary Advance List </h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  Add HR Salary Advance
                </button>
           </div>
        </div>

        {{ Form::open([ 'route'=>'salary-advance-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Employee Name</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($model as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>{{ $values->relHrEmployee->relUser->relUserProfile->first_name.' '.
                           $values->relHrEmployee->relUser->relUserProfile->middle_name.' '.
                           $values->relHrEmployee->relUser->relUserProfile->last_name
                        }}
                    </td>
                    <td>{{ ucfirst($values->title) }}</td>
                    <td>{{ $values->amount }}</td>
                    <td>{{ $values->date }}</td>
                    <td>{{ ucfirst($values->description) }}</td>
                    <td>
                        <a href="{{ URL::route('salary-advance.show', ['s_a_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><i style="color: #149bdf" class="fa fa-eye"></i></a>
                        <a href="{{ URL::route('salary-advance.edit',['s_a_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i style="color: #7b24dd" class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('salary-advance.destroy', ['s_a_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i style="color: red" class="fa fa-trash-o" ></i></a>

                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

</div>
{{Form::open(['route'=>'store-salary-advance', 'files'=>true])}}
        @include('hr::hr.salary_advance._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop