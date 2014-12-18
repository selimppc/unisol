@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')
   <h1>Welcome to Degree Level! </h1>

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <table id="example" class="table table-striped  table-bordered"  >
            <thead>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal" style="margin-bottom: 20px">
                              Add New Degree Level
                    </button>

                <tr>

                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            {{ Form::open(array('url' => 'degree_level/batchDelete')) }}
              @foreach($degree as $level)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $level->id }}"></td>
<<<<<<< HEAD

                   {{--<td align="left" class="deptName">{{ Department::getDepartmentName($level->department_id) }}</td>--}}

=======
>>>>>>> a1110ed10439fdb196b48a9a4bf13ee078396aad
                   <td>{{ $level->title }}</td>
                   <td>{{ $level->description }}</td>

                   <td>
                      <a href="{{ URL::route('degreelevel.edit', ['id'=>$level->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" href="#">Edit</a>

                      <a data-href="{{ URL::route('degreelevel.destroy',['id'=>$level->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" href="" >Delete</a>

                      <a href="{{ URL::route('degreelevel.show', ['id'=>$level->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" href="">View</a>

                   </td>
                </tr>
                    @endforeach
                    <br>
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                    <br><br>

            {{form::close() }}

            </tbody>
        </table>
        <br><br><br>

<!-- Modal for Create -->
             <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Create Degree Level</h4>
                                 </div>
                                 <div class="modal-body">

                                         {{ Form::open(array('route' => 'degreelevel.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                                                 @include('degree_level._form')

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
                                         <h4 class="modal-title" id="myModalLabel">Edit Degree Level</h4>
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
                            <h4 class="modal-title" id="myModalLabel">Show Degree Level</h4>
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


<<<<<<< HEAD

               <script>

                        {{-- JS: batch delete --}}
                                                      $(document).ready(function(){
                                                            $(".checkBox").change(function() {
                                                                if(this.checked) {
                                                                    $('.myCheckBox').prop('checked', true);
                                                                }
                                                                if(!this.checked) {
                                                                    $('.myCheckBox').prop('checked', false);
                                                                }
                                                            });

                                                      });



=======
               <script> $(document).ready(function() {
                            $('#example').DataTable();
                        } );
>>>>>>> a1110ed10439fdb196b48a9a4bf13ee078396aad
               </script>



@stop