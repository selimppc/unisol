@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_cfo')
@stop

@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('help-desk.create')}}" data-toggle="modal" data-target="#help-desk"><b>+Add New</b></a>
<h3>Onsite Help Desk</h3>

<div class="row">
   <div class="box box-solid">
       <div class="box-body">
       <p>&nbsp;</p><p>&nbsp;</p>
        <table id="" class="table table-striped  table-bordered">
            <thead>
            {{--{{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}--}}
               <tr>
                  {{--<th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>--}}
                  <th> Name</th>
                  <th> Email </th>
                  <th> Token Number </th>
                  <th> Category</th>
                  <th> Department</th>
                  <th> Assigned To</th>
                  <th> Status</th>
                  <th> Action</th>
               </tr>
            </thead>
            <tbody>
                @if(isset($data))
                   @foreach($data as $values)
                      <tr>
                         {{--<td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>--}}
                         <td>
                            <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                            class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                            </a>
                         </td>
                         <td>{{$values->email}}</td>
                         <td>{{$values->token_number}}</td>
                         <td>{{$values->relCfoCategory->title}}</td>
                         <td>{{$values->relDepartment->title}}</td>
                         <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
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
</div>

{{-- Modal Area --}}
<div class="modal fade" id="help-desk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- Modal for delete -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body">
                    <strong>Are you sure to delete?</strong>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>


@stop

