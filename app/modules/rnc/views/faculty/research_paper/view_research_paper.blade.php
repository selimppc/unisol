@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_faculty')
@stop
@section('content')
<a class="pull-right btn btn-info btn-xs"  style="color: #ffffff" href="{{ URL::route('faculty.research-paper.index') }}" id="addBook"><b>Home</b></a>

 <h3>View Cart</h3>

 <br>



 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">

        <div class="pull-right" style=" width: 180px; height: 30px; padding: 30px;
        border: 1px solid #8205ff;box-sizing: border-box;background-color: #00ccb4">
        <b style="margin-left: 10px"> Total price : {{ $sum }} </b></div>

           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Research Paper Name</th>
                           <th>Actual Price</th>
                           <th>Discount For Faculty</th>
                           <th>Offered Price</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($all_cart_r_ps))
                         @foreach($all_cart_r_ps as $acrps)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                               <td>{{ $acrps->title }}</td>
                               <td>{{ $acrps->price }}</td>
                               <td>{{ $acrps->free_type_faculty }} %</td>
                               <td>{{ $acrps->price - (($acrps->price * $acrps->free_type_student)/100) }}</td>
                               <td>
                                    <a href="{{ URL::route('faculty.research-paper.remove-from-cart',['id'=>$acrps->id]) }}" class="btn btn-xs btn-default"><b><i style="color: red" class="fa fa-trash-o"></i></b></a>
                               </td>
                           </tr>
                         @endforeach
                     @endif
                 </tbody>
              </table>
                 {{--<a href="{{ URL::route('faculty.send-info-to-transaction',$all_cart_book_ids) }}" class="btn btn-info" style="margin-left: 50%"><i class="fa fa-mail-forward"></i> CHECKOUT</a>--}}
           <p>&nbsp;</p>

           <div class="box-tools pull-right" style="margin-left: 50%">
               <a class="pull-right btn btn-large btn-info" href="{{ URL::route('faculty.research-paper.payment')}}"><b style="color: #f4f5ff;">Payment Option</b> <i class="fa  fa-arrow-right"></i></a>
           </div>
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

 @stop