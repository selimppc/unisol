   <ul class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <b class="container">{{HTML::image('/img/cartss.gif')}}<span class="label label-success" style="margin-left: 980px">{{count($all_cart_books)}}</span></b>
        </a>
        <ul class="dropdown-menu" style="margin-left: 800px;">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <p style="text-align: center"><b><ins>My Cart</ins></b></p>
            <p style="text-align: center">
                @if(count($all_cart_books))
                   <b style="color: lightseagreen">{{count($all_cart_books)}} Book(s) Added In Your Cart.</b>
                @endif
            </p>

                <table class="table table-striped  table-bordered">
                    <thead>
                       <tr>
                          <th width="10%">Book Name</th>
                          <th width="8%">Digital Sell Price</th>
                       </tr>
                    </thead>
                    @if(!empty($all_cart_books))
                        <tbody>
                           @if(isset($all_cart_books))
                               @foreach($all_cart_books as $value)
                                   <tr>
                                        <td>{{ $value->title}}</td>
                                        <td>{{ $value->digital_sell_price}}</td>
                                   </tr>
                               @endforeach
                           @endif
                        </tbody>
                     @else
                       <p style="text-align: center;color: palevioletred">{{'No-More Items Found In Your Cart.'}}</p>
                     @endif
               </table>

               <div style="margin-left: 100px">
                  <a href="{{URL::route('faculty.checkout') }}" class="btn btn-info btn-xs">Checkout</a>
               </div>
        </ul>
   </ul>

    <style>
    .container img {
        width: 4%;
        height: 50%;
        position: absolute;
        right: 3%;
        border-radius: 38%;
    }
    </style>


