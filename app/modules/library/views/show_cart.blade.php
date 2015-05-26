<!-- Show cart info    -->


@if(isset($all_cart_books))

  <div>
      <a href="{{ URL::route('student.view-cart') }}" class="pull-right btn button-large bg-warning"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
      <strong class="img-circle"><span class="label label-primary">{{count($all_cart_books)}}</span></strong></a>
  </div>

@endif