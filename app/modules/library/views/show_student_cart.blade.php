<!-- Show cart info    -->

@if ( 4 ==  Auth::user()->get()->role_id)
    @if(isset($all_cart_books))

      <div>
          <a href="{{ URL::route('student.view-cart') }}" class="pull-right btn button-large bg-danger"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
          <strong class="img-circle"><span class="label label-primary">{{count($all_cart_books)}}</span></strong></a>
      </div>

    @endif



@elseif( 2 ==  Auth::user()->get()->role_id )








@endif

