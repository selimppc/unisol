<!-- Show cart info    -->


@if(isset($all_cart_books))


  <a class="container"  href="{{ URL::route('faculty.view-cart')}}">{{HTML::image('/img/cartss.gif')}}<b style="margin-left: 1019px"><span class="label label-success">{{count($all_cart_books)}}</span></b></a>
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
