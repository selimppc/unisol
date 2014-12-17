@extends('layouts.master')
@section('sidebar')
    @include('department._sidebar')
@stop
@section('content')


  <div class="span well">
  <table class="table table-striped table-bordered">
  <col width="80">
    <col width="200">
    <col width="250">
   <h4>Country Information</h4>
                  <thead>
                  <tr>
                     <td><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
                     </td>
                     <th>Department Name</th>
                      <th>Description</th>
                      <th>Action</th>

                  </tr>
                  </thead>

      <tbody>
{{ Form::open(array('url' => 'country/batchDelete')) }}
              @foreach ($departmentList as $department)
                  <tr>
                     <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $department->id }}"></td>
                     <td align="left">{{ $department->title }}</td>
                     <td>{{ $department->description }}</td>
                     <td>
                        <a class="btn btn-sm btn-warning" href="{{ URL::to('department/delete/'.$department->id) }}" >Delete </a>
                        <a class="btn btn-sm btn-info" href="{{ URL::to('edit/' . $department->id ) }}">Edit...</a>





                     </td>

                     {{--<td>--}}
                     	 {{--<a data-href="{{ URL::to('department/delete/{id}'.$department->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete"  href="">Delete</a>--}}
                     {{--</td>--}}
                  </tr>
              @endforeach
{{ Form::submit('Delete Items', array('class'=>'btn btn-primary'))}}
{{ Form::close() }}

      </tbody>
  </table>
  </div>


       <!-- Modal :: Delete Confirmation -->

          <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
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
                      {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                      <a href="" class="btn btn-danger danger" data-dismiss="modal">Delete</a>
                      <a href="{{-- URL::route('employees.index') --}}"  class="btn btn-default" >Cancel</a>

                    </div>
                 </div>
               </div>
            </div>

<script>
// select records for batch delete


         $(document).ready(function(){
              $(".checkbox").change(function() {
                  if(this.checked) {
                      $('.myCheckbox').prop('checked', true);
                  }
                  if(!this.checked) {
                               $('.myCheckbox').prop('checked', false);
                           }
              });

         });


</script>

@stop