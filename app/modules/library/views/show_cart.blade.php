<!-- Show cart info    -->


@if(isset($all_cart_books))

  <div>
      <a class="pull-right"  style="color: red" ><i class="fa fa-shopping-cart"></i>
      <strong class="img-circle"><span class="label label-success">{{count($all_cart_books)}}</span></strong></a>
  </div>

@endif