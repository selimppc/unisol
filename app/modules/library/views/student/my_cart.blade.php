@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_student')
@stop
@section('content')
 <h3>My Cart</h3>
 <br>
 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">


           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
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
                                    <a href="{{ URL::route('student.remove-from-cart',['id'=>$acsb->id]) }}" class="btn btn-large btn-success" ><b><i class="fa fa-download"></i>Remove from Cart</b></a>
                               </td>
                           </tr>
                         @endforeach
                     @endif
                 </tbody>
              </table>

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



<script>
  $('#addBook').change(function(){
     $.get("{{ url('faculty/book')}}",
  });
</script>

 @stop