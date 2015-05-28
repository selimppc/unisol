<!-- Show cart info    -->

@if ( 4 ==  Auth::user()->get()->role_id)
    @if(isset($all_cart_books))

      <div>
          <a href="{{ URL::route('student.view-cart') }}" class="pull-right btn button-large bg-danger" title="View Cart"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
          <strong class="img-circle"><span class="label label-primary">{{count($all_cart_books)}}</span></strong></a>
      </div>

    @endif



@elseif( 2 ==  Auth::user()->get()->role_id )

    @if(isset($all_cart_books))


      <a class="container"  href="{{ URL::route('faculty.view-cart')}}">{{HTML::image('/img/cartss.gif')}}<b style="margin-left: 1019px"><span class="label label-success">{{count($all_cart_books)}}</span></b></a>
    @endif

@endif

<style>
.container img {
    width: 4%;
    height: 30px;
    position: absolute;
    right: 40px;
    border-radius: 38%;
}
</style>

