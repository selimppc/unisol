<p class="lead">Quick Navigation</p>
<div class="list-group">
 @if(!Auth::check())

        <a href="{{URL::to('user') }}" class="list-group-item">Signup</a>
        <a href="{{URL::to('usersign/login') }}" class="list-group-item">SignIn</a>
 @else
        <a href="{{URL::to('usersign/logout') }}" class="list-group-item">Signout</a>
  @endif

{{--<li>{{ HTML::link('login', 'Register') }}</li>--}}
    {{--<a href="" class="list-group-item">Degree Level</a>--}}
    {{--<a href="" class="list-group-item">Degree / Program Name</a>--}}
    {{--<a href="" class="list-group-item active">Subject Management</a>--}}
    {{--<a href="" class="list-group-item">Term / Semester</a>--}}
    {{--<a href="" class="list-group-item">Year</a>--}}
</div>