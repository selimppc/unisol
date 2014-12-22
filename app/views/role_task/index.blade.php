@extends('layouts.master')
@section('sidebar')
    @include('role_task._sidebar')
@stop
@section('content')
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

  <div class="span well">
  <table class="table table-striped table-bordered" id="myTable">
    <col width="50">
      <col width="180">
      <col width="100">
      <col width="90">
      <col width="120">
      <col width="180">
     <h4>Role Task Information</h4>
                    <thead>
                    <tr>
                       <td><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
                       </td>
                         <th>Role Task</th>
                        <th>Target Role</th>
                        <th>Task List</th>

                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>


                    </tr>
                  </thead>

        <tbody>

                @foreach ($role_task_list as $roletask)
                                    <tr>
                                       <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $roletask->id }}"></td>

                                        <td>{{ $roletask->title }}</td>
                                        <td align="left" class="TargetRole">{{ TargetRole::getTargetRole($roletask->target_role_id) }}</td>
                                        <td align="left" class="TaskList">{{ TaskListRole::getTaskList($roletask->task_list_id) }}</td>
                                        <td>{{ $roletask->description }}</td>
                                        <td>{{ $roletask->status }}</td>
                                        <td>

                                          <a data-href="{{ URL::to('roletask/delete/'.$roletask->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
                                           {{--<a href="{{ URL::to('degreeprogram/show/'.$roletask->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                                           <a class="btn btn-sm btn-info" data-href="{{ URL::to('roletask/edit/' . $roletask->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                                        </td>

                                    </tr>
                                @endforeach
                                 <br>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
           Add New
     </button>

        </tbody>
    </table>
  </div>


<!-- Modal :: Delete Confirmation -->
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


<!--Model: for showing single row info -->

<!-- Modal :Add new -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New </h4>
      </div>

      <div class="modal-body">
        <br><br>


        <div style="padding: 20px;">


                {{Form::open(array('url'=>'roletask/store', 'class'=>'form-horizontal'))}}


                {{ Form::label('title','Role Task:') }}
                {{ Form::text('title',Input::old('title'), array('class' => 'form-control')) }}


                 {{ Form::label('target_role_id', 'Target Role') }}
                 {{ Form::select('target_role_id',TargetRole::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                 {{ Form::label('task_list_id','Task List:') }}
                 {{ Form::select('task_list_id',  RoleTask::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}


                 {{ Form::label('description', 'Description:') }}
                 {{ Form::text('description',Input::old('description'),array('class' => 'form-control')) }}

                 {{ Form::label('status','Status:') }}
                 {{ Form::text('status',Input::old('status'), array('class' => 'form-control')) }}



                <p>&nbsp;</p>
                {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
                {{ Form::submit('Close', array('class'=>'btn btn-primary')) }}

                {{Form::close()}}


        </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</div>


<!-- Modal : edit -->
<div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">

         <div style="padding: 20px;">
                 <h3>Edit {{$roletask->title}}</h3>

                 {{Form::open(array('url'=>'roletask/update/'.$roletask->id, 'class'=>'form-horizontal'))}}


                 {{ Form::label('title','Role Task:') }}
                 {{ Form::text('title',$roletask->title, array('class' => 'form-control')) }}

                 {{ Form::label('target_role_id', 'Target Role') }}
                 {{ Form::select('target_role_id',  TargetRole::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                  {{ Form::label('task_list_id','task_list_id:') }}
                  {{ Form::select('task_list_id',  RoleTask::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                 {{ Form::label('description', 'Description:') }}
                 {{ Form::text('description',$roletask->description, array('class' => 'form-control')) }}


                 <p>&nbsp;</p>
                 {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
                 {{ Form::submit('Close', array('class'=>'btn btn-primary')) }}

                 {{Form::close()}}


         </div>
      </div>


      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>





@stop

