 @extends('layouts.layout')
 @section('sidebar')
     @include('layouts._sidebar_faculty')
 @stop
 @section('content')
<a class="pull-right btn btn-xs btn-info"  style="color: #ffffff" href="{{ URL::route('faculty.book') }}" title="Back to Exam List" id="addBook"><b>Back</b></a>

 <h3>Your Cart</h3>

 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
           {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                        <br>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Book Name</th>
                           <th></th>
                           <th>Price</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($model))
                          <tr>
                              <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                              <td>@if(Session::get('title'))

                                  @endif
                              </td>


                              <td></td>
                              <td></td>
                          </tr>
                     @endif
                 </tbody>
              </table>
           {{form::close() }}

           <p>&nbsp;</p>
       </div>
    </div>
 </div>

 <!-- Modal  -->
  <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


<script>
  $('#addBook').change(function(){
     $.get("{{ url('faculty/book')}}",
  });
</script>

 @stop