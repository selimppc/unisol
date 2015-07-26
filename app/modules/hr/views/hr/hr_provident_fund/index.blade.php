@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
  + HR Provident Fund
</button>
<h3>HR Provident Fund</h3>

<div class="row">

    <div class="box box-solid ">
       <ul class="nav nav-tabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">HR Provident Fund</a></li>
           <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                   Settings  <span class="caret"></span>
               </a>
               <ul class="dropdown-menu">
                   <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="{{Route('provident-fund-config')}}" data-toggle="modal" data-target="#pvd-config">HR Provident Fund Config</a></li>
               </ul>
           </li>
           <li class="pull-right" class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
               <ul class="dropdown-menu">
                   <li role="presentation" ><a role="menuitem" tabindex="-1" href="{{Route('provident-fund-config')}}" data-toggle="modal" data-target="#pvd-config">HR Provident Fund Config</a></li>
               </ul>
           </li>
       </ul>
        {{--<a href="{{Route('provident-fund-config')}}" class="pull-right" style="margin-right: 20px" data-toggle="modal" data-target="#pvd-config"><ins><b>HR Provident Fund Config</b></ins></a>--}}
        {{Form::open([ 'route'=>'provident-fund.batch-delete' ])}}
        <br><br>
       <div class="box-body">

        <table id="" class="table table-striped  table-bordered">
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> HR Employee</th>
                    <th> Date</th>
                    <th> Month </th>
                    <th> Employee Contribution Amount </th>
                    <th> Company Contribution Amount </th>
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
                         <a href="{{ URL::route('provident-fund.show',
                         ['id' => $values->id]) }}" class="btn-link" data-toggle="modal" data-target="#pvd">
                         <b>{{isset($values->hr_employee_id)?$values->relHrEmployee->relUser->relUserProfile->first_name.' '.$values->relHrEmployee->relUser->relUserProfile->middle_name.' '.$values->relHrEmployee->relUser->relUserProfile->last_name:''}}</b>
                         </a>
                    </td>
                    <td>{{date("Y-m-d", strtotime($values->date))}}</td>
                    <td>{{ucfirst($values->month)}}</td>
                    <td>{{$values->employee_contribution_amount}}</td>
                    <td>{{$values->company_contribution_amount}}</td>
                    <td>{{ucfirst($values->status)}}</td>
                    <td>
                        <a href="{{ URL::route('provident-fund.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#pvd" style="font-size: 12px;color: darkmagenta" title="SHOW"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('provident-fund.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#pvd" style="font-size: 12px;color: lightseagreen" title="EDIT"><i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('provident-fund.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral" title="DELETE"><span class="fa  fa-trash-o"></span></a>
                    </td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>
        {{form::close() }}
        {{--{{ $data->links() }}--}}
    </div>
</div>

{{ Form::open(array('route' => 'provident-fund.store')) }}
     @include('hr::hr.hr_provident_fund._modal._modal')
{{ Form::close() }}


{{-- Modal Area --}}
<div class="modal fade" id="pvd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">
    </div>
  </div>
</div>

<div class="modal fade" id="pvd-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width:90%">
    <div class="modal-content">

    </div>
  </div>
</div>
@stop