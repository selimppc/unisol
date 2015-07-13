@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
  + HR Leave
</button>
<h3>HR Leave</h3>

<div class="row">

    <div class="box box-solid ">
    <br>
    {{-------------------Searching Starts--------------------------------------------------------------}}
        <div>
            {{ Form::open(array('url' => 'hr/leave')) }}
            <div class="col-sm-8">
                <div class="col-sm-5" style="padding-left: 0">
                    {{ Form::label('forward_to', 'HR Employee') }}
                    {{ Form::select('forward_to', [''=>'Select HR Employee (Forward To)' ] + $employee_list, Input::old('forward_to'), array('class' => 'form-control') ) }}
                </div>
                <br><br>
                <div>
                   {{ Form::submit('Search', array('class'=>' pull-left btn btn-info btn-xs','id'=>'button'))}}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <br><br>
           {{------------Searching Ends--------------------------------------------------------------------}}
        <div class="col-sm-12">
           <div class="pull-left col-sm-4"></div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
           </div>
        </div>

        {{Form::open([ 'route'=>'leave.batch-delete' ])}}
        <div class="box-body">
            <table id="example" class="table table-striped  table-bordered">
                <thead>
                      {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'])}}
                    <tr>
                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                        <th> Leave Forward To</th>
                        <th> Leave Type </th>
                        <th> Reason </th>
                        <th> Leave Duration </th>
                        <th> Leave Date </th>
                        <th> Alt contact No </th>
                        <th> Alt Hr Employee </th>
                        <th> Status</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data))
                        @foreach($data as $values)
                            <tr>
                                <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                <td>
                                     <a href="{{ URL::route('leave.show',
                                     ['id' => $values->id]) }}" class="btn-link" data-toggle="modal" data-target="#leave">
                                     <b>{{isset($values->forward_to)? $values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name.' '.$values->relHrEmployee->relUser->relUserProfile->last_name:''}}</b>
                                     </a>
                                </td>
                                <td>{{isset($values->hr_leave_type_id)?$values->relHrLeaveType->title:''}}</td>
                                <td>{{$values->reason}}</td>
                                <td>{{Str::title($values->leave_duration)}}</td>
                                <td>{{$values->from_date}} &nbsp;<b>To</b>&nbsp; {{$values->to_date}}</td>
                                <td>{{$values->alt_contact_no}}</td>
                                <td>{{isset($values->alt_hr_employee_id)? $values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name.' '.$values->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
                                <td>{{ucfirst($values->status)}}</td>
                                <td>
                                     <a href="{{ URL::route('leave.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                     <a class="btn btn-xs btn-default" href="{{ URL::route('leave.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                     <a class="btn btn-xs btn-default" href="{{ URL::route('leave.comments',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightskyblue" title="comments"><i class="fa fa-comment"></i></a>
                                     <a data-href="{{ URL::route('leave.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
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

{{ Form::open(array('route' => 'leave.store')) }}
     @include('hr::hr.leave._modal._modal')
{{ Form::close() }}

{{-- Modal Area --}}
<div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
     </div>
  </div>
</div>

    <style>
    .modal-content {
      width:700px;
    }
    </style>

@stop