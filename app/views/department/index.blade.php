@extends('layouts.master')
@section('sidebar')
    @include('test._sidebar')
@stop
@section('content')


  <script>
        $( document ).ready(function() {
             $('#confirm-delete').on('modal', function(e) {
                $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
            })
        });
  </script>

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

                <a href="#" class="btn btn-danger danger">Delete</a>
                <a href=""  class="btn btn-default" >Cancel</a>

              </div>
           </div>
         </div>
      </div>
{{--<a href="{{ action('departmentController@store') }}" class="btn btn-success">Add New Department</a>--}}
<!-- block -->
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">View all Departments</div>
</div>
<div class="block-content collapse in">
<div class="span12">
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
<td>
  <input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
</td>
<th>Department Name</th>
<th>Description</th>

</tr>
</thead>
@foreach ($departmentList as $department)
                <tr>

                   <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $department->id }}"></td>
                   <td align="left">{{ $department->title }}</td>
                   <td>{{ $department->description }}</td>


            <td>
	            <a data-href="{{ URL::to('department/delete/{id}'.$department->id) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete"  href="">Delete</a>
            </td>
                </tr>

            @endforeach
</table>
</div>
</div>
</div>
<!-- /block -->
</div>




@stop