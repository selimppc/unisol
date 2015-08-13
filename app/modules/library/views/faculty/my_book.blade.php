@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_faculty')
@stop
@section('content')
 <h3>My Book</h3>
 <br>
 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered">
                 <thead>
                      <tr>
                         <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
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
                         @foreach($my_cart_books as $value)
                            <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                               <td>{{ $value->relLibBook->title }}</td>
                               <td>{{ $value->issue_date}}</td>
                               <td>{{ $value->relLibBookTransactionFinancial->trn_type }}</td>
                               <td>{{ $value->relLibBookTransactionFinancial->status }}</td>
                               <td>{{ $value->relLibBookTransactionFinancial->amount }}</td>
                               <td>
                                    @if($value->relLibBookTransactionFinancial->status == "paid")
                                        <a href="{{ URL::route('faculty.book.download',['book_id'=>$value->relLibBook->id])}}"
                                          class="btn-link" title="download" style="color:#8b0835"><b><i class="fa fa-download"></i> <ins></ins></b>
                                        </a>
                                    @else
                                    @endif
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


 @stop

