 @extends('layouts.layout')
  @section('top_menu')
      @include('layouts._top_menu')
  @stop
  @section('sidebar')
      @include('layouts._sidebar_faculty')
  @stop
  @section('content')
<a class="pull-right btn btn-xs btn-info"  style="color: #ffffff" href="{{ URL::route('faculty.book') }}" title="Back to Exam List" id="addBook"><b>Add to Cart More</b></a>

 <h3>Checkout</h3>

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
                           <th>Digital Sell Price</th>
                           <th>Action</th>

                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($all_cart_books))
                        @foreach($all_cart_books as $acb)
                          <tr>
                              <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                              <td>{{$acb->title}}</td>
                              <td>{{$acb->digital_sell_price}}</td>
                              <td>
                                  <a href="{{ URL::route('faculty.remove-from-cart',['id'=>$acb->id]) }}" class="btn btn-xs btn-default" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                              </td>
                          </tr>
                          @endforeach
                              <div>
                                  <td colspan="3" style="text-align: center"><b>Total Price : {{isset($sum) ? $sum : '0'}}</b>
                                       <td>
                                       </td>
                                  </td>
                              </div>
                     @endif
                 </tbody>
              </table>
              <br>
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


 <div class="box-tools pull-right">
    <a class="pull-right btn btn-xs btn-success"  href="{{ URL::route('faculty.book-transaction')}}"><b style="color: #ffffff;">Submit</b> <i class="fa fa-arrow-circle-right"></i></a>
 </div>

 @stop