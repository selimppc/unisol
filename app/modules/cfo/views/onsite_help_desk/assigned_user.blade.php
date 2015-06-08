@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_cfo')
@stop
@section('content')

<h3>{{isset($assigned_user)?$assigned_user->relUserProfile->first_name.' '.$assigned_user->relUserProfile->middle_name.' '.$assigned_user->relUserProfile->last_name:''}}'s Desk</h3>

   <div class="box box-solid">
   <br>
      <b style="margin-left: 30px;color: #005580;font-size: medium">Assigned By : <ins>{{isset($assigned_by) ? $assigned_by->relUser->relUserProfile->first_name.' '.$assigned_by->relUser->relUserProfile->middle_name.' '.$assigned_by->relUser->relUserProfile->last_name :''}}</ins></b>
       <div class="box-body">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                       <th> Name</th>
                       <th> Email </th>
                       <th> Token Number </th>
                       <th> Category</th>
                       <th> Department</th>
                       <th> Status</th>
                       <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                     @if(isset($self_desk))
                         @foreach($self_desk as $values)
                             <tr>
                                 <td>
                                    <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                    class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                    </a>
                                 </td>
                                 <td>{{$values->email}}</td>
                                 <td>{{$values->token_number}}</td>
                                 <td>{{$values->relCfoCategory->title}}</td>
                                 <td>{{$values->relDepartment->title}}</td>
                                 <td>{{strtoupper($values->status)}}</td>
                                 <td>
                                    <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                    <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                    <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                 </td>
                             </tr>
                         @endforeach
                     @endif
                </tbody>
            </table>
       </div>

   </div>

@stop



