<p class="lead">Quick Navigation</p>
<div class="list-group">
 @if(!Auth::check())

        <a href="{{URL::to('user') }}" class="list-group-item">Signup</a>
        <a href="{{URL::to('usersign/login') }}" class="list-group-item">SignIn</a>
 @else
        <a href="{{URL::to('usersign/logout') }}" class="list-group-item">Signout</a>
        <a href="{{URL::to('user/reset_password') }}" class="list-group-item">Change Password</a>
        <a href="{{URL::to('applicant/meta_data') }}" class="list-group-item">Profile</a>
  @endif

</div>