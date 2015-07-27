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
    <div class="box box-solid">
    <ul class="nav nav-tabs">
       <li class="active"><a href="#tab_1" data-toggle="tab">HR Leave</a></li>
       <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               Settings  <span class="caret"></span>
           </a>
           <ul class="dropdown-menu">
               <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="{{Route('leave-type')}}" data-toggle="modal" data-target="#leave-type">HR Leave Type</a></li>
           </ul>
       </li>
       <li class="pull-right" class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
           <ul class="dropdown-menu">
               <li role="presentation" ><a role="menuitem" tabindex="-1" href="{{Route('leave-type')}}" data-toggle="modal" data-target="#leave-type">HR Leave Type</a></li>
           </ul>
       </li>
    </ul>
    <br>
    {{-------------------Searching Starts--------------------------------------------------------------}}
        <div>
            {{ Form::open(array('url' => 'hr/leave','class'=>'form-horizontal')) }}
            <div class="col-sm-10">
                <div class="col-sm-3" style="padding-left: 0">
                    {{ Form::label('hr_employee_id', 'HR Employee') }}
                    {{ Form::select('hr_employee_id', [''=>'Select HR Employee' ] + $employee_list, Input::old('hr_employee_id'), array('class' => 'form-control') ) }}
                </div>
                <div class="col-sm-2" style="padding-left: 0">
                    {{ Form::label('from_date', 'Start Date') }}
                    {{ Form::select('from_date', [''=>'Select Date' ] + $date1, Input::old('from_date'), array('class' => 'form-control') ) }}
                </div>
                <div class="col-sm-2" style="padding-left: 0">
                    {{ Form::label('to_date', 'End Date') }}
                    {{ Form::select('to_date', [''=>'Select Date' ] + $date2, Input::old('to_date'), array('class' => 'form-control') ) }}
                </div>
                <div class="col-sm-2" style="padding-left: 0">
                    {{ Form::label('hr_leave_type_id', 'HR Leave Type') }}
                    {{ Form::select('hr_leave_type_id', [''=>'Select One' ] + $leave_type, Input::old('hr_leave_type_id'), array('class' => 'form-control') ) }}
                </div>
                <div class="col-sm-2" style="padding-left: 0">
                   {{ Form::label('status', 'Status')}}
                   {{ Form::select('status', ['' => 'Select Status','rejected' => 'Rejected','canceled' => 'Canceled',
                    'scheduled'=>'Scheduled','taken'=>'Taken','approved'=>'Approved'] , Input::old('status'), array('class' => 'form-control'))}}
                </div>
                <br>
                <div style="padding-left: 930px;margin-top: 6px">
                    {{ Form::submit('Search', array('class'=>' btn btn-info btn-sm','id'=>'button','style'=>"width: 70px"))}}
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
         {{--<a href="{{Route('leave-type')}}" class="pull-right" style="margin-right: 20px" data-toggle="modal" data-target="#leave-type"><ins><b>HR Leave Type</b> </ins></a>--}}
        {{Form::open([ 'route'=>'leave.batch-delete' ])}}
        <div class="box-body">
            <table id="" class="table table-striped  table-bordered">
                <thead>
                      {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'])}}
                    <tr>
                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                        <th> HR Employee</th>
                        <th> Leave Forward To</th>
                        <th> Leave Type </th>
                        <th> Reason </th>
                        <th> Leave Duration </th>
                        <th> Leave Date </th>
                        <th> Alt Hr Employee </th>
                        <th> Alt contact No </th>
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
                                     <b>{{isset($values->hr_employee_id)?  User::FullName($values->created_by):''}}</b>
                                     </a>
                                </td>
                                <td>{{isset($values->forward_to)?$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name:''}}</td>
                                <td>{{isset($values->hr_leave_type_id)?$values->relHrLeaveType->title:''}}</td>
                                <td>{{$values->reason}}</td>
                                <td>{{Str::title($values->leave_duration)}}</td>
                                <td>{{$values->from_date}} &nbsp;<b>To</b>&nbsp; {{$values->to_date}}</td>
                                <td>
                                   {{isset($values->alt_hr_employee_id)? $values->relHrAltEmployee->relUser->relUserProfile->first_name.' '.$values->relHrAltEmployee->relUser->relUserProfile->middle_name.' '.$values->relHrAltEmployee->relUser->relUserProfile->last_name:''}}
                                </td>
                                <td>{{$values->alt_contact_no}}</td>
                                <td>{{ucfirst($values->status)}}</td>
                                <td>
                                @if($values->status == 'approved')
                                     <a href="{{ URL::route('leave.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                     {{--<a class="btn btn-xs btn-default" href="{{ URL::route('leave.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>--}}
                                     {{--<a class="btn btn-xs btn-default" href="{{ URL::route('leave.comments',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightskyblue" title="comments"><i class="fa fa-comment"></i></a>--}}
                                     {{--<a data-href="{{ URL::route('leave.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>--}}
                                @else
                                     <a href="{{ URL::route('leave.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                     <a class="btn btn-xs btn-default" href="{{ URL::route('leave.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                     <a class="btn btn-xs btn-default" href="{{ URL::route('leave.comments',['id'=>$values->id]) }}" data-toggle="modal" data-target="#leave" style="font-size: 12px;color: lightskyblue" title="comments"><i class="fa fa-comment"></i></a>
                                     <a data-href="{{ URL::route('leave.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
       </div>
       {{form::close() }}
{{--       {{ $data->links() }}--}}
    </div>
</div>

{{ Form::open(array('route' => 'leave.store')) }}
     @include('hr::hr.leave._modal._modal')
{{ Form::close() }}

{{-- Modal Area --}}
<div class="modal fade" id="leave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
     <div class="modal-content">
     </div>
  </div>
</div>


<div class="modal fade" id="leave-type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="margin-left: 70px;width:100%">

    </div>
  </div>
</div>

    <style>
    .modal-content {
      width:700px;
    }
    </style>



@stop