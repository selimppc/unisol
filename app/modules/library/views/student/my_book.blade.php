@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_student')
@stop
@section('content')
 <h3>My Book</h3>
 <br>
 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
       <a href="{{ URL::route('student.find-book') }}" class="btn btn-info"  style="margin-left: 40%;color: #ffffff"  id="addBook"><b>Home</b></a>


           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Student Name</th>
                           <th>Book Name</th>
                           <th>Issue Date</th>
                           <th>transaction Type</th>
                           <th>Status</th>
                           <th>Price</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($my_cart_books))
                         @foreach($my_cart_books as $mcsb)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                               <td>{{ isset($mcsb->user_id) ? User::FullName($mcsb->user_id) : '' }}</td>
                               <td>{{ $mcsb->relLibBook->title }}</td>
                               <td>{{ $mcsb->issue_date }}</td>
                               <td>{{ $mcsb->relLibBookTransactionFinancial->trn_type }}</td>
                               <td>{{ $mcsb->relLibBookTransactionFinancial->status }}</td>
                               <td>{{ $mcsb->relLibBookTransactionFinancial->amount }}</td>
                               <td>
                                        @if($mcsb->relLibBookTransactionFinancial->status == "paid")
                                                <a href="{{ URL::route('student.book.download',['book_id'=>$mcsb->relLibBook->id]) }}" class="btn btn-large btn-success pull-right" ><i class="fa fa-download"></i>Download</a>
                                        @else
                                               <a href="{{ URL::route('student.payment') }}" class="btn btn-large btn-warning pull-right" ><i class="fa fa-mail-reply"></i>Payment Due</a>
                                        @endif
                                    {{--<a href="{{ URL::route('student.remove-from-cart',['id'=>$mcsb->id]) }}" class="btn btn-large btn-success" ><b><i class="fa fa-download"></i>Remove from Cart</b></a>--}}
                               </td>
                           </tr>
                         @endforeach
                     @endif
                 </tbody>
              </table>

              Total price : {{ $sum }}

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


 @stop