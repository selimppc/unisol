@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_student')
@stop
@section('content')
<a class="pull-right btn btn-info btn-xs"  style="color: #ffffff" href="{{ URL::route('student.find-book') }}" title="Back to Exam List" id="addBook"><b>Back</b></a>

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
                           <th>Price</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($all_cart_books))
                         @foreach($all_cart_books as $acsb)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                               <td>{{ $acsb->title }}</td>
                               <td>{{ $acsb->digital_sell_price }}</td>
                               <td>
                                    <a href="#" class="btn-link" title="Checkout" style="color:#02158b"><b><i class="fa fa-arrow-circle-o-right"></i></b></a>
                                    <a href="{{ URL::route('student.remove-from-cart',['id'=>$acsb->id]) }}" class="btn btn-large btn-success pull-right" ><b><i class="fa fa-download"></i>Remove from Cart</b></a>
                               </td>
                           </tr>
                         @endforeach
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