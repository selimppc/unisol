@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
  + HR Attendance
</button>
<h3>HR Attendance</h3>

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"></div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
           </div>
        </div>

        {{Form::open([ 'route'=>'attendance.batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> HR Employee</th>
                    <th> Date</th>
                    <th> Sign In Time </th>
                    <th> Sign Out Time</th>
                    <th> Lunch Break</th>
                    <th> Break Out Time</th>
                    <th> Break In Time</th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>{{isset($values->hr_employee_id)?$values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name.' '.$values->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
                    <td>{{date("Y-m-d", strtotime($values->sign_in_time))}}</td>
                    <td>{{$values->sign_in_time}}</td>
                    <td>{{$values->sign_out_time}}</td>
                    <td>{{$values->lunch_break_out_time}} &nbsp;<b>To</b>&nbsp;  {{$values->lunch_break_in_time}}</td>
                    <td>{{$values->break_out_time}}</td>
                    <td>{{$values->break_in_time}}</td>
                    <td>
                        <a href="{{ URL::route('attendance.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#pvd" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('attendance.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#pvd" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('attendance.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                    </td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>
        {{form::close() }}
        {{ $data->links() }}
    </div>
</div>

{{ Form::open(array('route' => 'attendance.store')) }}
     @include('hr::hr.hr_attendance._modal._modal')
{{ Form::close() }}


{{-- Modal Area --}}
<div class="modal fade" id="pvd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
@stop