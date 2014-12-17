@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop

@section('content')
   <h1>Welcome to Degree Level! </h1>


    <!-- will be used to show any messages -->
    {{--@if (Session::has('message'))--}}
        {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
    {{--@endif--}}

        <table class="table table-striped  table-bordered" >
            <thead>
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

                   <td align="left" class="deptName">{{ Department::getDepartmentName($level->department_id) }}</td>

                   <td>{{ $level->title }}</td>
                   <td>{{ $level->description }}</td>

                   <td>
                      <a href="{{ URL::route('degreelevel.edit', ['id'=>$level->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" href="#">Edit</a>

                      <a data-href="{{ URL::route('degreelevel.destroy',['id'=>$level->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" href="" >Delete</a>

                      <a href="{{ URL::route('degreelevel.show', ['id'=>$level->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" href="">View</a>

                   </td>
                </tr>
                    @endforeach
                    {{ Form::submit('Delete All', array('class' => 'btn btn-primary')) }}

            {{form::close() }}

            </tbody>
        </table>


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



               </script>




@stop