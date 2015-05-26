<!-- Show cart info    -->


@if(isset($all_cart_books))


  <a class="container">{{HTML::image('/img/cartss.gif')}}<b style="margin-left: 1019px"><span class="label label-success">{{count($all_cart_books)}}</span></b></a>
@endif

  <div>
      <a href="{{ URL::route('student.view-cart') }}" class="pull-right btn button-large bg-warning"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
      <strong class="img-circle"><span class="label label-primary">{{count($all_cart_books)}}</span></strong></a>
  </div>


<style>
.container img {
    width: 4%;
    height: 30px;
    position: absolute;
    right: 40px;
    border-radius: 38%;
    /*padding-left:90px;*/
    /*margin-left: 90px;*/
}
</style>
