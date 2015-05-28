   <ul class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{--<i class=""></i>--}}
            <b class="container">{{HTML::image('/img/cartss.gif')}}<span class="label label-success" style="margin-left: 1012px"> {{count($all_cart_books)}}</span></b>
        </a>
        <ul class="dropdown-menu" style="margin-left: 850px;">

           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <p style="text-align: center"><b>My Cart</b></p>
                <table class="table table-striped  table-bordered">
                    <thead>
                       <tr>
                          <th width="8%">Book Name</th>
                          <th width="8%">Price</th>
                       </tr>
                    </thead>
                    <tbody>
                       @if(isset($all_cart_books))
                           @foreach($all_cart_books as $value)
                               <tr>
                                    <td>{{ $value->title}}</td>
                                    <td>{{ $value->digital_sell_price}}</td>

                               </tr>
                           @endforeach
                       @else
                      {{'No More Items Found In Your Cart'}}
                       @endif
                    </tbody>
               </table>
               <div style="margin-left: 100px">
                  <a href="{{URL::route('faculty.checkout') }}" class="btn btn-info btn-xs">Checkout</a>
               </div>
        </ul>
   </ul>


    <style>
    .container img {
        width: 4%;
        height: 30px;
        position: absolute;
        right: 60px;
        border-radius: 38%;
    }
    </style>