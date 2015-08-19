@extends('layouts.master')

@section('sidebar')
    @include('target_list_role._sidebar')
@stop

@section('content')
   <h1>Welcome to Task List </h1>

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

{{ Form::open(array('url' => 'target_list_role/batchDelete')) }}

        <table id="example" class="table table-striped  table-bordered"  >
            <thead>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal" style="margin-bottom: 20px">
                        Add New Target Role
                </button>

                 <br>
                      {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                 <br>

                 <br>
                <tr>

                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>

                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

              @foreach($taskListRole as $task_list_role)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $task_list_role->id }}"></td>

                   <td>{{ $task_list_role->title }}</td>
                   <td>{{ $task_list_role->description }}</td>

                   <td>
                      <a href="{{ URL::route('target_list_role.edit', ['id'=>$task_list_role->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-toggle="tooltip" data-placement="left" title="Edit" href="#"><span class="glyphicon glyphicon-edit text-info"></span></a>

                      <a data-href="{{ URL::route('target_list_role.destroy',['id'=>$task_list_role->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" data-placement="left" title="Delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                      <a href="{{ URL::route('target_list_role.show', ['id'=>$task_list_role->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="left" title="Show/View" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>

                   </td>
                </tr>
                    @endforeach

            </tbody>
        </table>

        {{form::close() }}

        {{ $taskListRole->links() }}

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

                                         {{ Form::open(array('route' => 'target_list_role.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                                                 @include('target_list_role._form')

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