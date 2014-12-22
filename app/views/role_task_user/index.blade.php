@extends('layouts.master')

@section('sidebar')
    @include('role_task_user._sidebar')
@stop

@section('content')
   <h1>Welcome to Role task User </h1>


<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

{{--<script>--}}
{{--$(document).ready(function(){--}}
    {{--$(".checkbox2").change(function() {--}}
      {{--if(this.checked) {--}}
          {{--$('.myCheckbox2').prop('checked', true);--}}
          {{--$("#hide-button2").show();--}}
      {{--}--}}
      {{--if(!this.checked) {--}}
               {{--$('.myCheckbox2').prop('checked', false);--}}
                {{--$("#hide-button2").hide();--}}
           {{--}--}}
    {{--});--}}

    {{--$('#example').dataTable({--}}
          {{--paging: false--}}

   {{--});--}}
{{--});--}}
{{--</script>--}}

{{ Form::open(array('url' => 'role_task_user/batchDelete')) }}

        <table id="example" class="table table-striped  table-bordered"  >
            <thead>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal" style="margin-bottom: 20px">
                        Add New Role Target User
                </button>

                 <br>
                      {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button2', 'style'=>'display:none'))}}
                 <br>

                 <br>
                <tr>

                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox2" value=""></th>

                    <th>Role Task Name</th>
                    <th>User Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

              @foreach($roleTaskUser as $role_task_user)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox2" value="{{ $role_task_user->id }}"></td>

                   <td>{{ RoleTask::getRoleTaskName($role_task_user->role_task_id) }}</td>


                   <td>{{ User::getUserName($role_task_user->user_id) }}</td>
                   
                   <td>{{ $role_task_user->status }}</td>

                   <td>
                      <a href="{{ URL::route('role_task_user.edit', ['id'=>$role_task_user->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-toggle="tooltip" data-placement="left" title="Edit" href="#"><span class="glyphicon glyphicon-edit text-info"></span></a>

                      <a data-href="{{ URL::route('role_task_user.destroy',['id'=>$role_task_user->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" data-placement="left" title="Delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                      <a href="{{ URL::route('role_task_user.show', ['id'=>$role_task_user->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="left" title="Show/View" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>

                   </td>
                </tr>
                    @endforeach

            </tbody>
        </table>

        {{form::close() }}

        {{ $roleTaskUser->links() }}

        <br><br><br>

<!-- Modal for Create -->
             <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Create Target Role</h4>
                                 </div>
                                 <div class="modal-body">

                                         {{ Form::open(array('route' => 'role_task_user.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                                                 @include('role_task_user._form')

                                         {{ Form::close() }}




                                 </div>
                                 <div class="modal-footer">
                                 </div>
                            </div>
                        </div>
             </div>

<!-- Modal for Edit -->

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                         <h4 class="modal-title" id="myModalLabel">Edit Target Role</h4>
                                 </div>
                                 <div class="modal-body">
                                 </div>
                                 <div class="modal-footer">
                                 </div>
                            </div>
                        </div>
             </div>



            <!-- Show Modal -->
                    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Showing Target Role</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>
                          </div>
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