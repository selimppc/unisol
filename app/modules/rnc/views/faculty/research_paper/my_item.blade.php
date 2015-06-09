@extends('layouts.layout')
@section('top_menu')
      @include('layouts._top_menu')
@stop
@section('sidebar')
     @include('layouts._sidebar_faculty')
@stop
@section('content')
 <h3>My Purchased Item</h3>
 <br>
 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
       <a href="{{ URL::route('faculty.research-paper.index') }}" class="btn btn-info"  style="margin-left: 40%;color: #ffffff"  id="addBook"><b>Home</b></a>


           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Faculty Name</th>
                           <th>Research Paper Name</th>
                           <th>Issue Date</th>
                           <th>Transaction Type</th>
                           <th>Status</th>
                            <th>Number of Download</th>
                           <th>Price</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($my_cart_books))
                         @foreach($my_cart_books as $mcrps)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                               <td>{{ isset($mcrps->user_id) ? User::FullName($mcrps->user_id) : '' }}</td>
                               <td>{{ $mcrps->relRnCResearchPaper->title }}</td>
                               <td>{{ $mcrps->issue_date }}</td>
                               <td>{{ $mcrps->relRnCFinancialTransaction->transaction_type }}</td>
                               <td>{{ $mcrps->relRnCFinancialTransaction->status }}</td>
                               <td>{{ $mcrps->count }}</td>
                               <td>{{ $mcrps->relRnCFinancialTransaction->amount }}</td>
                               <td>
                                    @if($mcrps->relRnCFinancialTransaction->status == "paid")
                                        <a href="{{ URL::route('faculty.research-paper.purchased-download',['rnc_rp_id'=>$mcrps->relRnCResearchPaper->id]) }}" class="btn btn-xs btn-default" id="myForm"><i class="fa fa-cloud-download" style="color: blue" title="Purchased"></i> Paid</a>
                                    @else
                                        <a href="{{ URL::route('faculty.research-paper.payment') }}" class="btn btn-large btn-warning pull-right" ><i class="fa fa-mail-reply"></i>Payment Due</a>
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

    <script>
        $('#myForm').submit(function() {
            location.reload(true);
        });
    </script>


 @stop